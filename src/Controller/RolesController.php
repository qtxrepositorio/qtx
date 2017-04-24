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
        $roles = $this->Roles->find();
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
            'contain' => ['Notices', 'Users']
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
                $this->Flash->success(__('O grupo foi salvo!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O grupo não pode ser salvo. Por favor, tente novamente.'));
            }
        }
        $notices = $this->Roles->Notices->find('list', ['limit' => 200]);
        $users = $this->Roles->Users->find('list', ['limit' => 200]);
        $this->set(compact('role', 'notices', 'users'));
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
            'contain' => ['Notices', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->data);
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('O grupo foi salvo!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O grupo não pode ser salvo. Por favor, tente novamente.'));
            }
        }
        $notices = $this->Roles->Notices->find('list', ['limit' => 200]);
        $users = $this->Roles->Users->find('list', ['limit' => 200]);
        $this->set(compact('role', 'notices', 'users'));
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
            $this->Flash->success(__('O grupo foi apagado!'));
        } else {
            $this->Flash->error(__('O grupo não pode ser apagado. Por favor, tente novamente.'));
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
        $this->loadModel('RolesUsers'); 
        $authenticatedUserId = $this->Auth->user('id');
        $query = $this->Users->find()
            ->where([
                'id'=> $authenticatedUserId            
            ]);
        $statusArray = $query->all();
        $status = null;
        foreach ($statusArray as $key)
        {
            $status = $key['status'];
        }
        if($status == true)
        {
            $query = $this->RolesUsers->find()
                ->where([
                    'user_id'=> $authenticatedUserId            
                ]);    
            $currentUserGroups = $query->all();    
            $release = null;    
            foreach ($currentUserGroups as $key)
            {
                $query = $this->Roles->find()
                ->where([
                    'id'=> $key['role_id']           
                ]);    
                $correspondingFunction = $query->all();  
                foreach ($correspondingFunction as $key)
                {
                    if($key['id'] == 1)
                    {
                        $release = true;        
                    }
                }
            }
            if($release == false)
            {
                $this->Flash->error(__('Você não tem autorização para acessar esta área do sistema. Caso necessário, favor entrar em contato com o setor TI.'));
                $this->redirect($this->Auth->redirectUrl());              
            }
            else
            {
                //$this->Flash->error(__('VC É ADM')); 
                if(in_array($this->action, array('index','add','edit','delete','view')))
                return true;            
            }
        }
        else
        {
            $this->redirect($this->Auth->logout());        
        }
        return parent::isAuthorized($user);
    }   
}
