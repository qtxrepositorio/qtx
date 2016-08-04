<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;

/**
 * Notices Controller
 *
 * @property \App\Model\Table\NoticesTable $Notices
 */
class NoticesController extends AppController
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

        $authenticatedUserId = $this->Auth->user('id');
        $notices = $this->paginate($this->Notices->find()
            ->where(['user_id'=> $authenticatedUserId])
            ->order(['id'=>'DESC'])
        );

        $noticesUsers = $this->Notices->find()
            ->limit(5)
            ->innerJoin('notices_users', 'notices.id = notices_users.notice_id')
            ->where(['notices_users.user_id'=> $authenticatedUserId])
            ->order(['id'=>'DESC']);

        $this->loadModel('RolesUsers'); 
        $rolesUsers = $this->RolesUsers->find()
            ->select('role_id')
            ->where(['user_id' => $authenticatedUserId]);    

        foreach ($rolesUsers as $key) {
            $noticesRoles = $this->Notices->find()
                ->limit(5)
                ->innerJoin('notices_roles', 'notices.id = notices_roles.notice_id')
                ->where(['notices_roles.role_id'=> $key['role_id']])
                ->order(['id'=>'DESC']);  
                $noticesRolesArray[] = $noticesRoles;         
        }

        $this->set(compact('notices','noticesUsers','noticesRolesArray'));
        $this->set('_serialize', ['notices','noticesUsers','noticesRolesArray']);
    }

    /**
     * View method
     *
     * @param string|null $id Notice id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notice = $this->Notices->get($id, [
            'contain' => ['Users', 'Roles']
        ]);

        $this->set('notice', $notice);
        $this->set('_serialize', ['notice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notice = $this->Notices->newEntity();
        if ($this->request->is('post')) {
            $notice = $this->Notices->patchEntity($notice, $this->request->data);
            if ($this->Notices->save($notice)) {
                $this->Flash->success(__('A notícia foi salva!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('A notícia não pôde ser salva. Por Favor, tente novamente.'));
            }
        }
        $users = $this->Notices->Users->find('list', ['limit' => 200]);
        $roles = $this->Notices->Roles->find('list', ['limit' => 200]);
        $this->set(compact('notice', 'users', 'roles'));
        $this->set('_serialize', ['notice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notice id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notice = $this->Notices->get($id, [
            'contain' => ['Users', 'Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notice = $this->Notices->patchEntity($notice, $this->request->data);
            if ($this->Notices->save($notice)) {
                $this->Flash->success(__('A notícia foi salva!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('A notícia não pôde ser salva. Por Favor, tente novamente.'));
            }
        }
        $users = $this->Notices->Users->find('list', ['limit' => 200]);
        $roles = $this->Notices->Roles->find('list', ['limit' => 200]);
        $this->set(compact('notice', 'users', 'roles'));
        $this->set('_serialize', ['notice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notice id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notice = $this->Notices->get($id);
        if ($this->Notices->delete($notice)) {
            $this->Flash->success(__('A notícia foi apagada!'));
        } else {
            $this->Flash->error(__('A notícia não pôde ser apagada. Por Favor, tente novamente.'));
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
