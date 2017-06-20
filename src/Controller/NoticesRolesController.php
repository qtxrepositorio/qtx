<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;

/**
 * NoticesRoles Controller
 *
 * @property \App\Model\Table\NoticesRolesTable $NoticesRoles
 */
class NoticesRolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->loadModel('Notices');
        $this->loadModel('RolesUsers');

        $authenticatedUserId = $this->Auth->user('id');

        $rolesUsers = $this->RolesUsers->find()
            ->select('user_id')
            ->where(['user_id' => $authenticatedUserId]);

        $noticesRoles = $this->Notices->find('all',['notices_roles.role_id' => $rolesUsers])
            ->select(['notices.id', 'notices.subject', 'notices.text', 'notices.created', 'users.name'])
            ->distinct(['notices.id'])
            ->innerJoin('notices_roles', 'notices.id = notices_roles.notice_id')
            ->innerJoin('users', 'users.id = notices.user_id')
            ->order(['notices.id' => 'DESC']);

        $this->set(compact('noticesRoles'));
        $this->set('_serialize', ['noticesRoles']);
    }

    /**
     * View method
     *
     * @param string|null $id Notices Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $noticesRole = $this->NoticesRoles->get($id, [
            'contain' => ['Notices', 'Roles']
        ]);

        $this->set('noticesRole', $noticesRole);
        $this->set('_serialize', ['noticesRole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $noticesRole = $this->NoticesRoles->newEntity();
        if ($this->request->is('post')) {
            $noticesRole = $this->NoticesRoles->patchEntity($noticesRole, $this->request->data);
            if ($this->NoticesRoles->save($noticesRole)) {
                $this->Flash->success(__('The notices role has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notices role could not be saved. Please, try again.'));
            }
        }
        $notices = $this->NoticesRoles->Notices->find('list', ['limit' => 200]);
        $roles = $this->NoticesRoles->Roles->find('list', ['limit' => 200]);
        $this->set(compact('noticesRole', 'notices', 'roles'));
        $this->set('_serialize', ['noticesRole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notices Role id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $noticesRole = $this->NoticesRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $noticesRole = $this->NoticesRoles->patchEntity($noticesRole, $this->request->data);
            if ($this->NoticesRoles->save($noticesRole)) {
                $this->Flash->success(__('The notices role has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notices role could not be saved. Please, try again.'));
            }
        }
        $notices = $this->NoticesRoles->Notices->find('list', ['limit' => 200]);
        $roles = $this->NoticesRoles->Roles->find('list', ['limit' => 200]);
        $this->set(compact('noticesRole', 'notices', 'roles'));
        $this->set('_serialize', ['noticesRole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notices Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $noticesRole = $this->NoticesRoles->get($id);
        if ($this->NoticesRoles->delete($noticesRole)) {
            $this->Flash->success(__('The notices role has been deleted.'));
        } else {
            $this->Flash->error(__('The notices role could not be deleted. Please, try again.'));
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
