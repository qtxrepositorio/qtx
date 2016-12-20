<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;

/**
 * RolesUsers Controller
 *
 * @property \App\Model\Table\RolesUsersTable $RolesUsers
 */
class RolesUsersController extends AppController
{


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Users']
        ];
        $rolesUsers = $this->paginate($this->RolesUsers);

        $this->set(compact('rolesUsers'));
        $this->set('_serialize', ['rolesUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Roles User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rolesUser = $this->RolesUsers->get($id, [
            'contain' => ['Roles', 'Users']
        ]);

        $this->set('rolesUser', $rolesUser);
        $this->set('_serialize', ['rolesUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rolesUser = $this->RolesUsers->newEntity();
        if ($this->request->is('post')) {
            $rolesUser = $this->RolesUsers->patchEntity($rolesUser, $this->request->data);
            if ($this->RolesUsers->save($rolesUser)) {
                $this->Flash->success(__('The roles user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The roles user could not be saved. Please, try again.'));
            }
        }
        $roles = $this->RolesUsers->Roles->find('list', ['limit' => 200]);
        $users = $this->RolesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('rolesUser', 'roles', 'users'));
        $this->set('_serialize', ['rolesUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Roles User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rolesUser = $this->RolesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rolesUser = $this->RolesUsers->patchEntity($rolesUser, $this->request->data);
            if ($this->RolesUsers->save($rolesUser)) {
                $this->Flash->success(__('The roles user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The roles user could not be saved. Please, try again.'));
            }
        }
        $roles = $this->RolesUsers->Roles->find('list', ['limit' => 200]);
        $users = $this->RolesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('rolesUser', 'roles', 'users'));
        $this->set('_serialize', ['rolesUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Roles User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rolesUser = $this->RolesUsers->get($id);
        if ($this->RolesUsers->delete($rolesUser)) {
            $this->Flash->success(__('The roles user has been deleted.'));
        } else {
            $this->Flash->error(__('The roles user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.

        //$this->Auth->allow(['logout','login']);  
    }

    public function isAuthorized($user)
    {
        $this->loadModel('Users'); 
        $this->loadModel('Roles'); 
        $authenticatedUserId = $this->Auth->user('id');
        $query = $this->Users->find()
            ->where([
                'id'=> $authenticatedUserId            
            ]);
        $statusArray = $query->all();
        $status = null;
        foreach ($statusArray as $key) {
            $status = $key['status'];
        }
        if($status == true){
            $query = $this->RolesUsers->find()
                ->where([
                    'user_id'=> $authenticatedUserId            
                ]);    
            $currentUserGroups = $query->all();    
            $release = null;    
            foreach ($currentUserGroups as $key) {
                $query = $this->Roles->find()
                ->where([
                    'id'=> $key['role_id']           
                ]);    
                $correspondingFunction = $query->all();  
                foreach ($correspondingFunction as $key) {
                    if($key['id'] == 1){
                        $release = true;        
                    }
                }
            }
            if($release == false){
                $this->redirect($this->Auth->redirectUrl());               
            }
            else{
                //$this->Flash->error(__('VC É ADM')); 
                if(in_array($this->action, array('index','add','edit','delete','view')))
                    return true;            
            }
        }else{
            $this->redirect($this->Auth->logout());        
        }
        return parent::isAuthorized($user);
    }
}
