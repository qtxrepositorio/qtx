<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;

/**
 * CallsSolutions Controller
 *
 * @property \App\Model\Table\CallsSolutionsTable $CallsSolutions
 */
class CallsSolutionsController extends AppController {

    use MailerAwareTrait;

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['CallsSubcategories']
        ];
        $callsSolutions = $this->paginate($this->CallsSolutions);

        $this->set(compact('callsSolutions'));
        $this->set('_serialize', ['callsSolutions']);
    }

    /**
     * View method
     *
     * @param string|null $id Calls Solution id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {

        $this->loadModel('SolutionsFiles');

        $callsSolution = $this->CallsSolutions->get($id, [
            'contain' => ['CallsSubcategories']
        ]);

        $callsSolution['archives'] = $this->SolutionsFiles->find()
                ->where(['solution_id' => $callsSolution['id']]);

        //debug($callsSolution);

        $this->set('callsSolution', $callsSolution);
        $this->set('_serialize', ['callsSolution']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $callsSolution = $this->CallsSolutions->newEntity();
        if ($this->request->is('post')) {
            $callsSolution = $this->CallsSolutions->patchEntity($callsSolution, $this->request->data);
            if ($this->CallsSolutions->save($callsSolution)) {
                foreach ($this->request->data['archives'] as $key => $archive) {
                    $this->addSolutionsFiles($callsSolution['id'], $archive);
                }
                $this->Flash->success(__('A solução foi salva!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('A solução não pode ser salva!'));
            }
        }
        $this->loadModel('Calls');
        $callsAreas = $this->Calls->CallsAreas->find('list', ['limit' => 200]);
        $callsCategories = $this->Calls->CallsCategories->find('list', ['limit' => 200]);
        $callsSubcategories = $this->Calls->CallsSubcategories->find('list', ['limit' => 200]);
        $callsCategoriesForJs = $this->Calls->CallsCategories->find();
        $callsSubcategoriesForJs = $this->Calls->CallsSubcategories->find();
        $this->set(compact('callsSolution', 'callsSubcategories','callsAreas','callsCategories','callsSubcategories','callsCategoriesForJs','callsSubcategoriesForJs'));
        $this->set('_serialize', ['callsSolution']);
    }

    public function addIntoCall() {
        $call_id = $this->request->data['call_id'];
        $changeStatus = $this->request->data['changeStatus'];
        $authenticatedUser = $this->Auth->user();

        if ($changeStatus == 0) {
            $this->loadModel('Calls');
            $call = $this->Calls->get($call_id, [
                'contain' => []
            ]);
            $call['status_id'] = 2;
            $call = $this->Calls->patchEntity($call, $this->request->data);
            $this->Calls->save($call);
            $this->saveNewStatus($call_id, $call['status_id'], $authenticatedUser['id']);
            $this->chargeAndSendEmail($call);
        }

        $callsSolution = $this->CallsSolutions->newEntity();
        if ($this->request->is('post')) {
            $callsSolution = $this->CallsSolutions->patchEntity($callsSolution, $this->request->data);
            $callsSolution['subcategorie_id'] = $this->request->data['subcategorie_id'];
            if ($this->CallsSolutions->save($callsSolution)) {
                $this->Flash->success(__('A solução foi salva e aplicada com sucesso!'));
                $connection = ConnectionManager::get('default');
                $callsCountCategory = $connection
                        ->execute("UPDATE CALLS SET SOLUTION_ID =" . $callsSolution['id'] . " WHERE ID = " . $call_id);

                foreach ($this->request->data['archives'] as $key => $archive) {
                    debug($archive);
                    $this->addSolutionsFiles($callsSolution['id'], $archive);
                }
            } else {
                $this->Flash->error(__('A solução não foi salva e aplicada.'));
            }
            return $this->redirect(['controller'=>'calls','action' => 'view', $call_id]);
        }

        $callsSubcategories = $this->CallsSolutions->CallsSubcategories->find('list', ['limit' => 200]);
        $this->set(compact('callsSolution', 'callsSubcategories'));
        $this->set('_serialize', ['callsSolution']);
    }

    public function addSolutionsFiles($solution_id = null, $archive = null) {

        $this->loadModel('SolutionsFiles');

        $existFind = $this->SolutionsFiles->find()
                ->where(['solution_id' => $solution_id])
                ->andWhere(['archive' => $archive['name']]);

        $exist = false;
        foreach ($existFind as $key => $value) {
            $exist = true;
        }

        $solutionsFile = $this->SolutionsFiles->newEntity();
        $solutionsFile['text'] = 'n/a';
        $solutionsFile['solution_id'] = $solution_id;
        $solutionsFile['archive'] = $archive['name'];

        if (!$exist) {

            if ($this->SolutionsFiles->save($solutionsFile)) {

                if (file_exists(getcwd() . '/files/solutions_files/' . strval($solutionsFile['solution_id']) . '/')) {

                    $filepath = getcwd() . '/files/solutions_files' . '/' . strval($solutionsFile['solution_id']) . '/' . $archive['name'];

                    $filename = $archive['name'];

                    move_uploaded_file($archive['tmp_name'], $filepath);
                } else {

                    mkdir(getcwd() . '/files/solutions_files/' . strval($solutionsFile['solution_id']) . '/', 0777, true);

                    $filepath = getcwd()
                            . '/files/solutions_files/'
                            . strval($solutionsFile['solution_id'])
                            . '/' . $archive['name'];

                    $filename = $archive['name'];

                    move_uploaded_file($archive['tmp_name'], $filepath);
                }

                //$this->Flash->success(__('O anexo foi salvo com sucesso!'));
            } else {

                //$this->Flash->error(__('O anexo não pode ser salvo!'));
            }
        } else {
            $this->Flash->error(__('O anexo não pode ser salvo pois o arquivo já foi anexado anteriormente, mude o nome do arquivo e tente novamente!'));
        }
    }

    public function chargeAndSendEmail($call = null) {

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

                $this->getMailer('CallSolution')->send('editCall', [$call, $value['email']]);
            }
        }
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
            $callsResponse['text'] = 'O status do chamado foi alterado para: ' . $status . '.';
        } else {
            $callsResponse['text'] = 'O chamado foi solucionado!';
        }

        $callsResponse['created_by'] = $created_by;
        $callsResponse['call_id'] = $call_id;
        $callsResponse['visualized'] = 0;

        //$callsResponse = $this->CallsResponses->patchEntity($callsResponse);
        if ($this->CallsResponses->save($callsResponse)) {
            return; //$this->redirect(['controller' => 'Calls', 'action' => 'view', $call_id]);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Calls Solution id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $callsSolution = $this->CallsSolutions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $callsSolution = $this->CallsSolutions->patchEntity($callsSolution, $this->request->data);
            if ($this->CallsSolutions->save($callsSolution)) {
                $this->Flash->success(__('A solução foi salva e aplicada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('A solução não foi salva e aplicada.'));
            }
        }
        $callsSubcategories = $this->CallsSolutions->CallsSubcategories->find('list', ['limit' => 200]);
        $this->set(compact('callsSolution', 'callsSubcategories'));
        $this->set('_serialize', ['callsSolution']);
    }

    public function editIntoCall($id = null) {

        $this->loadModel('Calls');
        $call = $this->Calls->get($id, [
            'contain' => []
        ]);

        $callsSolution = $this->CallsSolutions->get($call->solution_id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $callsSolution = $this->CallsSolutions->patchEntity($callsSolution, $this->request->data);
            if ($this->CallsSolutions->save($callsSolution)) {
                $this->Flash->success(__('A solução foi salva e aplicada com sucesso!'));

                return $this->redirect(['controller' => 'calls', 'action' => 'view', $call->id]);
            } else {
                $this->Flash->error(__('A solução não foi salva.'));
            }
        }
        $callsSubcategories = $this->CallsSolutions->CallsSubcategories->find('list', ['limit' => 200]);
        $this->set(compact('callsSolution', 'callsSubcategories','call'));
        $this->set('_serialize', ['callsSolution']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calls Solution id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $callsSolution = $this->CallsSolutions->get($id);
        if ($this->CallsSolutions->delete($callsSolution)) {
            $this->Flash->success(__('A solução foi apagada!'));
        } else {
            $this->Flash->error(__('A solução não pode ser apagada!'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        //$this->Auth->allow(['index', 'add', 'edit', 'delete', 'view']);
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
                $this->Flash->error(__('Para realizar modificações nas soluções, você precisa fazer parte dos grupos relacionados ao modulo de chamados.'));
                return false;
            } else {
                return true;
            }
        } else {
            $this->redirect($this->Auth->logout());
        }
        return parent::isAuthorized($user);
    }

}
