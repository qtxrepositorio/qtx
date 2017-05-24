<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;
use Cake\Mailer\MailerAwareTrait;

/**
 * Calls Controller
 *
 * @property \App\Model\Table\CallsTable $Calls
 */
class CallsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {

        $authenticatedUserId = $this->Auth->user('id');

        $calls = $this->Calls->find()
                ->select(['CALLS.id', 'CALLS.SUBJECT', 'CALLS_URGENCY.title', 'CALLS_STATUS.title', 'CALLS.created', 'CALLS_SUBCATEGORIES.name'])
                ->innerJoin('CALLS_URGENCY', 'CALLS_URGENCY.id = CALLS.urgency_id')
                ->innerJoin('CALLS_STATUS', 'CALLS_STATUS.id = CALLS.status_id')
                ->innerJoin('CALLS_CATEGORIES', 'CALLS_CATEGORIES.id = CALLS.category_id')
                ->innerJoin('CALLS_SUBCATEGORIES', 'CALLS_SUBCATEGORIES.id = CALLS.subcategory_id')
                ->where(['created_by' => $authenticatedUserId])
                ->orWhere(['attributed_to' => $authenticatedUserId])
                ->order(['Calls.id' => 'DESC']);


        $this->set(compact('calls'));
        $this->set('_serialize', ['calls']);
    }

    /**
     * View method
     *
     * @param string|null $id Call id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {

        $this->loadModel('Users');
        $this->loadModel('RolesUsers');
        $this->loadModel('Roles');
        $this->loadModel('CallsResponses');
        $this->loadModel('CallsCategories');
        $this->loadModel('CallsSubcategories');
        $this->loadModel('CallsFiles');
        $this->loadModel('CallsSolutions');
        $this->loadModel('SolutionsFiles');

        $authenticatedUser = $this->Auth->user();

        $call = $this->Calls->get($id, [
            'contain' => ['CallsResponses']
        ]);

        $query = $this->RolesUsers->find()
                ->where([
            'user_id' => $authenticatedUser['id']
        ]);
        $currentUserGroups = $query->all();
        $release = null;
        foreach ($currentUserGroups as $key) {
            $query = $this->Roles->find()
                    ->where([
                'id' => $key['role_id']
            ]);
            $correspondingFunction = $query->all();
            foreach ($correspondingFunction as $key) {
                if ($key['id'] == 25 or $key['id'] == 26 or $key['id'] == 01) {
                    $release = true;
                }
            }
        }

        if (($call['created_by'] == $authenticatedUser['id']) or ( $call['attributed_to'] == $authenticatedUser['id']) or ( $release == true)) {

            $connection = ConnectionManager::get('default');

            $area = $connection->execute("
                SELECT * FROM CALLS_AREAS WHERE ID = " . $call['area_id']);
            foreach ($area as $key => $value) {
                $call['area'] = $value['name'];
            }

            $category = $connection->execute("
                SELECT * FROM CALLS_CATEGORIES WHERE ID = " . $call['category_id']);
            foreach ($category as $key => $value) {
                $call['category'] = $value['name'];
            }

            $subcategory = $connection->execute("
                SELECT * FROM CALLS_SUBCATEGORIES WHERE ID = " . $call['subcategory_id']);
            foreach ($subcategory as $key => $value) {
                $call['subcategory'] = $value['name'];
                $call['sla'] = substr($value['sla'], 0, 5);
                ;
            }

            $status = $connection->execute("
                SELECT * FROM CALLS_STATUS WHERE ID = " . $call['status_id']);
            foreach ($status as $key => $value) {
                $call['status'] = $value['title'];
            }

            $urgency = $connection->execute("
                SELECT title FROM CALLS_URGENCY WHERE ID = " . $call['urgency_id']);
            foreach ($urgency as $key) {
                $call['urgency'] = $key['title'];
            }

            $call['authenticatedUser'] = $authenticatedUser;

            foreach ($call['calls_responses'] as $key => $value) {

                $query = $this->Users->find()
                        ->where([
                    'id' => $value['created_by']
                ]);

                $created_by = $query->all();

                foreach ($created_by as $key => $x) {
                    $value['created_by'] = $x['name'];
                }
            }

            $query = $this->Users->find()
                    ->where([
                'id' => $call['created_by']
            ]);
            $created_by = $query->all();
            foreach ($created_by as $key) {
                $created_by_name = $key['name'];
            }
            $call['created_by'] = $created_by_name;

            $query = $this->Users->find()
                    ->where([
                'id' => $call['attributed_to']
            ]);
            $attributed_to = $query->all();
            foreach ($attributed_to as $key) {
                $attributed_to = $key['name'];
            }
            $call['attributed_to'] = $attributed_to;

            $callFiles = $this->CallsFiles->find()
                    ->where([
                'call_id' => $call['id']
            ]);

            $call['files'] = $callFiles;
        } else {

            $this->Flash->error(__('Você só tem acesso a chamados atribuídos ou criados para/por você, a menos que faça parte dos grupos de gerenciamento de chamados!'));
            return $this->redirect(['action' => 'index']);
        }

        $callsStatus = $this->Calls->CallsStatus->find('list', ['limit' => 200]);
        $call['callsStatus'] = $callsStatus;

        $callsSolutions = $this->Calls->CallsSolutions->find('list')
            ->where(['subcategorie_id' => $call['subcategory_id']]);
        $call['callsSolutions'] = $callsSolutions;

        if ($call['solution_id']) {
            # code...
            $callSolutionView = $this->Calls->CallsSolutions->find()
                ->where(['id' => $call['solution_id']]);
            $call['callSolutionView'] = $callSolutionView;
        }

        $callSolutionFiles = $this->SolutionsFiles->find()
                ->where(['solution_id' => $call['solution_id']]);
        $call['callSolutionFiles'] = $callSolutionFiles;

        $callsSubcategories = $this->Calls->CallsSubcategories->find('list')
            ->where(['category_id' => $call['category_id']]);
        $call['callsSubcategories'] = $callsSubcategories;

        $this->visualized($call['id']);

        $this->set('call', $call);
        $this->set('_serialize', ['call']);
    }

/**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    use MailerAwareTrait;

    public function add() {
        $authenticatedUser = $this->Auth->user();

        $call = $this->Calls->newEntity();
        if ($this->request->is('post')) {
            $call = $this->Calls->patchEntity($call, $this->request->data);
            if ($this->Calls->save($call)) {

                $this->Flash->success(__('O chamado foi salvo com sucesso!'));

                $this->loadModel('Users');
                $query = $this->Users->find()
                        ->where(['id' => $call['created_by']])
                        ->orWhere(['id' => $call['attributed_to']]);
                $emails = $query->all();

                foreach ($emails as $key => $value) {
                    if ($value['id'] == $call['created_by']) {
                        $call['created_by'] = $value['name'];
                    } elseif ($value['id'] == $call['attributed_to']) {
                        $call['attributed_to'] = $value['name'];
                    }
                }

                foreach ($emails as $key => $value) {
                    if ($value['email'] != '') {
                        $this->getMailer('Call')->send('newCall', [$call, $value['email']]);
                    }
                }

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O chamado não pode ser salvo, tente novamente!'));
            }
        }

        $callsAreas = $this->Calls->CallsAreas->find('list', ['limit' => 200]);
        $callsCategories = $this->Calls->CallsCategories->find('list', ['limit' => 200]);
        $callsSubcategories = $this->Calls->CallsSubcategories->find('list', ['limit' => 200]);
        $callsStatus = $this->Calls->CallsStatus->find('list', ['limit' => 200]);
        $callsUrgency = $this->Calls->CallsUrgency->find('list', ['limit' => 200]);
        $callsSolutions = $this->Calls->CallsSolutions->find('list', ['limit' => 200]);
        $callsUsers = $this->Calls->Users->find('list', ['limit' => 200])
                ->select(['users.id', 'users.name'])
                ->innerJoin('roles_users', 'users.id = roles_users.user_id')
                ->where(['roles_users.role_id' => 26])
                ->order(['users.name' => 'ASC']);

        $callsCategoriesForJs = $this->Calls->CallsCategories->find();
        $callsSubcategoriesForJs = $this->Calls->CallsSubcategories->find();

        $this->set(compact('call', 'callsAreas', 'callsCategories', 'callsSubcategories', 'callsStatus', 'callsUrgency', 'callsSolutions', 'callsUsers', 'authenticatedUser', 'callsCategoriesForJs', 'callsSubcategoriesForJs'));
        $this->set('_serialize', ['call', 'authenticatedUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Call id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {

        $this->loadModel('RolesUsers');
        $this->loadModel('Roles');

        $call = $this->Calls->get($id, [
            'contain' => []
        ]);

        $authenticatedUser = $this->Auth->user();

        $query = $this->RolesUsers->find()
                ->where([
            'user_id' => $authenticatedUser['id']
        ]);
        $currentUserGroups = $query->all();
        $release = null;
        foreach ($currentUserGroups as $key) {
            $query = $this->Roles->find()
                    ->where([
                'id' => $key['role_id']
            ]);
            $correspondingFunction = $query->all();
            foreach ($correspondingFunction as $key) {
                if ($key['id'] == 25 or $key['id'] == 26 or $key['id'] == 01) {
                    $release = true;
                }
            }
        }

        if (($call['created_by'] == $authenticatedUser['id']) or ( $call['attributed_to'] == $authenticatedUser['id']) or ( $release == true)) {

            $statusBeforeEdit = $this->findStatus($id);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $call = $this->Calls->patchEntity($call, $this->request->data);
                if ($this->Calls->save($call)) {
                    $this->Flash->success(__('O chamado foi atualizado com sucesso!'));
                    if ($call['status_id'] != $statusBeforeEdit) {

                        $status_id = $call['status_id']; 
                        $this->saveNewStatus($id, $status_id, $authenticatedUser['id']);

                        $this->loadModel('Users');
                        $query = $this->Users->find()
                                ->where(['id' => $call['created_by']])
                                ->orWhere(['id' => $call['attributed_to']]);
                        $emails = $query->all();

                        foreach ($emails as $key => $value) {
                            if ($value['id'] == $call['created_by']) {
                                $call['created_by'] = $value['name'];
                            } elseif ($value['id'] == $call['attributed_to']) {
                                $call['attributed_to'] = $value['name'];
                            }
                        }

                        $connection = ConnectionManager::get('default');

                        $area = $connection->execute("
                            SELECT * FROM CALLS_AREAS WHERE ID = " . $call['area_id']);
                        foreach ($area as $key => $value) {
                            $call['area'] = $value['name'];
                        }

                        $category = $connection->execute("
                            SELECT * FROM CALLS_CATEGORIES WHERE ID = " . $call['category_id']);
                        foreach ($category as $key => $value) {
                            $call['category'] = $value['name'];
                        }

                        $subcategory = $connection->execute("
                            SELECT * FROM CALLS_SUBCATEGORIES WHERE ID = " . $call['subcategory_id']);
                        foreach ($subcategory as $key => $value) {
                            $call['subcategory'] = $value['name'];
                            $call['sla'] = substr($value['sla'], 0, 5);
                            ;
                        }

                        $status = $connection->execute("
                            SELECT * FROM CALLS_STATUS WHERE ID = " . $call['status_id']);
                        foreach ($status as $key => $value) {
                            $call['status'] = $value['title'];
                        }

                        $urgency = $connection->execute("
                            SELECT * FROM CALLS_URGENCY WHERE ID = " . $call['urgency_id']);
                        foreach ($urgency as $key => $value) {
                            $call['urgency'] = $value['title'];
                        }

                        foreach ($emails as $key => $value) {
                            if ($value['email'] != '') {

                                $this->getMailer('Call')->send('editCall', [$call, $value['email']]);
                            }
                        }
                    }
                    return $this->redirect(['controller' => 'Calls', 'action' => 'view', $call['id']]);
                    //return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('O chamado não pode ser atualizado, tente novamente!'));
                }
            }
        } else {

            $this->Flash->error(__('Você só tem acesso a chamados atribuídos ou criados para/por você, a menos que faça parte dos grupos de gerenciamento de chamados!'));
            return $this->redirect(['action' => 'index']);
        }

        $callsAreas = $this->Calls->CallsAreas->find('list', ['limit' => 200]);
        $callsCategories = $this->Calls->CallsCategories->find('list', ['limit' => 200]);
        $callsSubcategories = $this->Calls->CallsSubcategories->find('list', ['limit' => 200]);
        $callsStatus = $this->Calls->CallsStatus->find('list', ['limit' => 200]);
        $callsUrgency = $this->Calls->CallsUrgency->find('list', ['limit' => 200]);
        $callsSolutions = $this->Calls->CallsSolutions->find('list', ['limit' => 200]);
        $callsUsers = $this->Calls->Users->find('list', ['limit' => 200])
                ->select(['users.id', 'users.name'])
                ->innerJoin('roles_users', 'users.id = roles_users.user_id')
                ->where(['roles_users.role_id' => 26])
                ->order(['users.name' => 'ASC']);

        $callsCategoriesForJs = $this->Calls->CallsCategories->find();
        $callsSubcategoriesForJs = $this->Calls->CallsSubcategories->find();

        $this->set(compact('call', 'callsAreas', 'callsCategories', 'callsSubcategories', 'callsStatus', 'callsUrgency', 'callsSolutions', 'callsUsers', 'authenticatedUser', 'callsCategoriesForJs', 'callsSubcategoriesForJs'));
        $this->set('_serialize', ['call', 'authenticatedUser']);
    }

    public function editIntoCall($id = null) {

        $id = $this->request->data['id'];
        $call = $this->Calls->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $call = $this->Calls->patchEntity($call, $this->request->data);
            $call['solution_id'] = $this->request->data['solution_id'];
            $this->Calls->save($call);

            $this->Flash->success(__('O chamado foi atualizado com sucesso!'));

        }

        return $this->redirect(['controller' => 'Calls', 'action' => 'view', $id]);
    }

    public function editStatus($id = null) {

        $authenticatedUser = $this->Auth->user();

        $this->loadModel('RolesUsers');
        $this->loadModel('Roles');

        $call = $this->Calls->get($id, [
            'contain' => []
        ]);

        $statusBeforeEdit = $this->findStatus($id);

        if ($statusBeforeEdit != $this->request->data['status_id']) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $call = $this->Calls->patchEntity($call, $this->request->data);
                if ($this->Calls->save($call)) {

                    $this->Flash->success(__('O chamado foi atualizado com sucesso!'));

                    $this->saveNewStatus($id, $call['status_id'], $authenticatedUser['id']);

                    $this->loadModel('Users');
                    $query = $this->Users->find()
                            ->where(['id' => $call['created_by']])
                            ->orWhere(['id' => $call['attributed_to']]);
                    $emails = $query->all();

                    foreach ($emails as $key => $value) {
                        if ($value['id'] == $call['created_by']) {
                            $call['created_by'] = $value['name'];
                        } elseif ($value['id'] == $call['attributed_to']) {
                            $call['attributed_to'] = $value['name'];
                        }
                    }

                    $connection = ConnectionManager::get('default');

                    $area = $connection->execute("
                            SELECT * FROM CALLS_AREAS WHERE ID = " . $call['area_id']);
                    foreach ($area as $key => $value) {
                        $call['area'] = $value['name'];
                    }

                    $category = $connection->execute("
                            SELECT * FROM CALLS_CATEGORIES WHERE ID = " . $call['category_id']);
                    foreach ($category as $key => $value) {
                        $call['category'] = $value['name'];
                    }

                    $subcategory = $connection->execute("
                            SELECT * FROM CALLS_SUBCATEGORIES WHERE ID = " . $call['subcategory_id']);
                    foreach ($subcategory as $key => $value) {
                        $call['subcategory'] = $value['name'];
                        $call['sla'] = substr($value['sla'], 0, 5);
                        ;
                    }

                    $status = $connection->execute("
                            SELECT * FROM CALLS_STATUS WHERE ID = " . $call['status_id']);
                    foreach ($status as $key => $value) {
                        $call['status'] = $value['title'];
                    }

                    $urgency = $connection->execute("
                            SELECT * FROM CALLS_URGENCY WHERE ID = " . $call['urgency_id']);
                    foreach ($urgency as $key => $value) {
                        $call['urgency'] = $value['title'];
                    }

                    foreach ($emails as $key => $value) {
                        if ($value['email'] != '') {

                            $this->getMailer('Call')->send('editCall', [$call, $value['email']]);
                        }
                    }
                }
            }
            return $this->redirect(['controller' => 'Calls', 'action' => 'view', $call['id']]);
        } else {
            $this->Flash->error(__('O status do chamado não foi modificao, por isso não foi salvo!'));
            return $this->redirect(['controller' => 'Calls', 'action' => 'view', $id]);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Call id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {

        $this->request->allowMethod(['post', 'delete']);
        $call = $this->Calls->get($id);

        if ($call['status_id'] == 1) {

            $authenticatedUser = $this->Auth->user();

            $this->loadModel('CallsResponses');
            $this->CallsResponses->deleteResponeses($call['id']);

            $this->loadModel('CallsFiles');
            $this->CallsFiles->deleteFiles($call['id']);

            if ($this->Calls->delete($call)) {
                $this->Flash->success(__('O chamado foi apagado com sucesso!'));

                $this->loadModel('Users');
                $query = $this->Users->find()
                        ->where(['id' => $call['created_by']])
                        ->orWhere(['id' => $call['attributed_to']]);
                $emails = $query->all();

                foreach ($emails as $key => $value) {
                    if ($value['id'] == $call['created_by']) {
                        $call['created_by'] = $value['name'];
                    } elseif ($value['id'] == $call['attributed_to']) {
                        $call['attributed_to'] = $value['name'];
                    }
                }

                $connection = ConnectionManager::get('default');

                $area = $connection->execute("
                            SELECT * FROM CALLS_AREAS WHERE ID = " . $call['area_id']);
                foreach ($area as $key => $value) {
                    $call['area'] = $value['name'];
                }

                $category = $connection->execute("
                            SELECT * FROM CALLS_CATEGORIES WHERE ID = " . $call['category_id']);
                foreach ($category as $key => $value) {
                    $call['category'] = $value['name'];
                }

                $subcategory = $connection->execute("
                            SELECT * FROM CALLS_SUBCATEGORIES WHERE ID = " . $call['subcategory_id']);
                foreach ($subcategory as $key => $value) {
                    $call['subcategory'] = $value['name'];
                    $call['sla'] = substr($value['sla'], 0, 5);
                    ;
                }

                $status = $connection->execute("
                            SELECT * FROM CALLS_STATUS WHERE ID = " . $call['status_id']);
                foreach ($status as $key => $value) {
                    $call['status'] = $value['title'];
                }

                $urgency = $connection->execute("
                            SELECT * FROM CALLS_URGENCY WHERE ID = " . $call['urgency_id']);
                foreach ($urgency as $key => $value) {
                    $call['urgency'] = $value['title'];
                }

                foreach ($emails as $key => $value) {
                    if ($value['email'] != '') {
                        $this->getMailer('Call')->send('deleteCall', [$call, $value['email'], $authenticatedUser['name']]);
                    }
                }
            } else {
                $this->Flash->error(__('O chamado não pode ser apagado, tente novamente!'));
            }

            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('Chamados que já tiveram o status alterado não podem ser apagados!'));
            return $this->redirect(['action' => 'view', $id]);
        }
    }

    public function visualized($id = null) {

        $call = $this->Calls->get($id, [
            'contain' => []
        ]);

        $authenticatedUser = $this->Auth->user();

        if ($call['attributed_to'] == $authenticatedUser['id']) {
            $call['visualized'] = 1;
            $this->Calls->save($call);
        }

        $connection = ConnectionManager::get('default');
        $callsCountCategory = $connection
                ->execute("
                UPDATE[calls_responses]
                    SET
                        visualized = 1
                    WHERE call_id = $id
                        AND created_by != " . $authenticatedUser['id']
        );
    }

    public function findStatus($id = null) {

        $calls = $this->Calls->find()
                ->where(['id' => $id]);

        $status = '';

        foreach ($calls as $key => $value) {
            $status = $value['status_id'];
        }

        return $status;
    }

    public function saveNewStatus($call_id = null, $status_id = null, $created_by = null) {

        $this->loadModel('CallsResponses');

        $callsResponse = $this->CallsResponses->newEntity();

        $connection = ConnectionManager::get('default');
        $status = $connection->execute("
            SELECT title FROM CALLS_STATUS WHERE ID = " . $status_id);
        foreach ($status as $key => $value) {
            $status = $value['title'];
        }

        if ($status != 2) {
            $callsResponse['text'] = 'O status do chamado foi alteradao para: ' . $status . '.';
        } else {
            $callsResponse['text'] = 'O chamado foi solucionado!';
        }

        $callsResponse['created_by'] = $created_by;
        $callsResponse['call_id'] = $call_id;
        $callsResponse['visualized'] = 0;

        //$callsResponse = $this->CallsResponses->patchEntity($callsResponse);
        if ($this->CallsResponses->save($callsResponse)) {
            return ;//$this->redirect(['controller' => 'Calls', 'action' => 'view', $call_id]);
        }
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        // $this->Auth->allow(['index', 'add', 'edit', 'delete', 'view']);
    }

    public function isAuthorized($user) {

        $this->loadModel('Users');
        $this->loadModel('Roles');
        $this->loadModel('RolesUsers');
        $authenticatedUserId = $this->Auth->user('id');
        $query = $this->Users->find()
                ->where([
            'id' => $authenticatedUserId
        ]);
        $statusArray = $query->all();
        $status = null;
        foreach ($statusArray as $key) {
            $status = $key['status'];
        }
        if ($status == true) {
            $query = $this->RolesUsers->find()
                    ->where([
                'user_id' => $authenticatedUserId
            ]);
            $currentUserGroups = $query->all();
            $release = null;
            foreach ($currentUserGroups as $key) {
                $query = $this->Roles->find()
                        ->where([
                    'id' => $key['role_id']
                ]);
                $correspondingFunction = $query->all();
                foreach ($correspondingFunction as $key) {
                    if ($key['id'] == 25 or $key['id'] == 26 or $key['id'] == 01) {
                        $release = true;
                    }
                }
            }
            if ($release == false) {
                if(in_array($this->request->params['action'], array('view','add','edit','index','delete'))){
                    return true;  
                }else{
                    return false;      
                }
            } else {
                return true;                    
            }
        }
        else {
            $this->redirect($this->Auth->logout());
        }
        return parent::isAuthorized($user);
    }

    /*
    public function isAuthorized($user) {

        $connection = ConnectionManager::get('default');

        $teste = $this->action;

        $this->Flash->error(__(strval($this->request->params['action']))); 

    }
    */

}
