<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public $paginate = [
        'limit' => 5];
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Notices', 'Roles']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O usuário foi salvo!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O usuário não pôde ser salvo. Por favor, tente novamente.'));
            }
        }
        $notices = $this->Users->Notices->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'notices', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Notices', 'Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O usuário foi salvo!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O usuário não pôde ser salvo. Por favor, tente novamente.'));
            }
        }
        $notices = $this->Users->Notices->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'notices', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('O usuário foi apagado!'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.

        $this->Auth->allow(['logout','login','add','edit']);  
    }

    public function isAuthorized($user)
    {
        $this->loadModel('Roles'); 
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
                    else
                    {  
                        $release = false;
                    }
                }
            }
            if($release == false)
            {
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

    public function login()
    {
        if ($this->request->is('post'))
        {
            $user = $this->Auth->identify();
            if ($user)
            {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Senha ou usuário inválido, tente novamente...'));
        }
    }

    public function logout()
    {
        $this->Flash->success(__('Agora você está desconectado.'));
        return $this->redirect($this->Auth->logout());
    }
}
