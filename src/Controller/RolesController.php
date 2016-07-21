<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 */
class RolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $roles = $this->paginate($this->Roles);

        $this->set(compact('roles'));
        $this->set('_serialize', ['roles']);
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('role', $role);
        $this->set('_serialize', ['role']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->data);
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The role could not be saved. Please, try again.'));
            }
        }
        $users = $this->Roles->Users->find('list', ['limit' => 200]);
        $this->set(compact('role', 'users'));
        $this->set('_serialize', ['role']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->data);
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The role could not be saved. Please, try again.'));
            }
        }
        $users = $this->Roles->Users->find('list', ['limit' => 200]);
        $this->set(compact('role', 'users'));
        $this->set('_serialize', ['role']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
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

    public function isAuthorized($user){

        $this->loadModel('Users'); 
        $this->loadModel('RolesUsers'); 
        $authenticatedUserId = $this->Auth->user('id'); 
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
                if(strcmp($key['description'],'Administradores')){
                    $release = false;        
                }
                else{  
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
        return parent::isAuthorized($user);
    }
}
