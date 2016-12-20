<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;

/**
 * NoticesUsers Controller
 *
 * @property \App\Model\Table\NoticesUsersTable $NoticesUsers
 */
class NoticesUsersController extends AppController
{
    
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        
        $this->loadModel('Notices'); 

        $authenticatedUserId = $this->Auth->user('id');

        $noticesUsers = $this->paginate($this->Notices->find()
            ->select(['notices.id', 'notices.subject', 'notices.text', 'notices.created', 'users.name'])
            ->innerJoin('notices_users', 'notices.id = notices_users.notice_id')
            ->innerJoin('users', 'users.id = notices.user_id')
            ->where(['notices_users.user_id' => $authenticatedUserId])
            ->order(['notices.id' => 'DESC'])
        );

        $this->set(compact('noticesUsers'));
        $this->set('_serialize', ['noticesUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Notices User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $noticesUser = $this->NoticesUsers->get($id, [
            'contain' => ['Notices', 'Users']
        ]);

        $this->set('noticesUser', $noticesUser);
        $this->set('_serialize', ['noticesUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $noticesUser = $this->NoticesUsers->newEntity();
        if ($this->request->is('post')) {
            $noticesUser = $this->NoticesUsers->patchEntity($noticesUser, $this->request->data);
            if ($this->NoticesUsers->save($noticesUser)) {
                $this->Flash->success(__('The notices user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notices user could not be saved. Please, try again.'));
            }
        }
        $notices = $this->NoticesUsers->Notices->find('list', ['limit' => 200]);
        $users = $this->NoticesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('noticesUser', 'notices', 'users'));
        $this->set('_serialize', ['noticesUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notices User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $noticesUser = $this->NoticesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $noticesUser = $this->NoticesUsers->patchEntity($noticesUser, $this->request->data);
            if ($this->NoticesUsers->save($noticesUser)) {
                $this->Flash->success(__('The notices user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notices user could not be saved. Please, try again.'));
            }
        }
        $notices = $this->NoticesUsers->Notices->find('list', ['limit' => 200]);
        $users = $this->NoticesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('noticesUser', 'notices', 'users'));
        $this->set('_serialize', ['noticesUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notices User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $noticesUser = $this->NoticesUsers->get($id);
        if ($this->NoticesUsers->delete($noticesUser)) {
            $this->Flash->success(__('The notices user has been deleted.'));
        } else {
            $this->Flash->error(__('The notices user could not be deleted. Please, try again.'));
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
        $this->loadModel('RolesUsers'); 
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
