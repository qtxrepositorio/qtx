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
class CallsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CallsAreas', 'CallsCategories', 'CallsSubcategories', 'CallsStatus', 'CallsUrgency', 'CallsSolutions']
        ];
        $calls = $this->paginate($this->Calls);

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
    public function view($id = null)
    {
        $call = $this->Calls->get($id, [
            'contain' => ['CallsAreas', 'CallsCategories', 'CallsSubcategories', 'CallsStatus', 'CallsUrgency', 'CallsSolutions', 'CallsFiles', 'CallsResponses', 'Users']
        ]);

        $this->set('call', $call);
        $this->set('_serialize', ['call']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    use MailerAwareTrait;
    public function add()
    {
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
                    }elseif($value['id'] == $call['attributed_to']){
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
        
        $this->set(compact('call', 'callsAreas', 'callsCategories', 'callsSubcategories', 'callsStatus', 'callsUrgency', 'callsSolutions', 'callsUsers','authenticatedUser','callsCategoriesForJs','callsSubcategoriesForJs'));
        $this->set('_serialize', ['call','authenticatedUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Call id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $call = $this->Calls->get($id, [
            'contain' => []
        ]);

        $authenticatedUser = $this->Auth->user();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $call = $this->Calls->patchEntity($call, $this->request->data);
            if ($this->Calls->save($call)) {
                $this->Flash->success(__('The call has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The call could not be saved. Please, try again.'));
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
        $this->set(compact('call', 'callsAreas', 'callsCategories', 'callsSubcategories', 'callsStatus', 'callsUrgency', 'callsSolutions','authenticatedUser','callsUsers'));
        $this->set('_serialize', ['call','authenticatedUser','callsUsers']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Call id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $call = $this->Calls->get($id);
        if ($this->Calls->delete($call)) {
            $this->Flash->success(__('The call has been deleted.'));
        } else {
            $this->Flash->error(__('The call could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
