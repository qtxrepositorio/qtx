<?php

namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;
use Cake\Datasource\ConnectionManager;

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
    public function index() {
        $authenticatedUserId = $this->Auth->user('id');
        $notices = $this->paginate($this->Notices->find()
                        ->where(['user_id' => $authenticatedUserId])
                        ->order(['id' => 'DESC'])
        );
        $noticesUsers = $this->Notices->find()
                ->limit(4)
                ->select(['notices.id', 'notices.subject', 'notices.text', 'notices.created', 'users.name'])
                ->innerJoin('notices_users', 'notices.id = notices_users.notice_id')
                ->innerJoin('users', 'users.id = notices.user_id')
                ->where(['notices_users.user_id' => $authenticatedUserId])
                ->order(['notices.id' => 'DESC']);
        $connection = ConnectionManager::get('default');
        $noticesRoles = $connection->execute("
        SELECT DISTINCT TOP 4
             [notices].[id]
            ,[notices].[subject]
            ,[notices].[text]
            ,[notices].[created]
            ,[notices].[modified]
            ,[users].[name]
        FROM [integratedSystemQualitex].[dbo].[notices]
        INNER JOIN [integratedSystemQualitex].[dbo].[notices_roles] ON [notices].[id] = [notices_roles].[notice_id]
        INNER JOIN [integratedSystemQualitex].[dbo].[users] ON [users].[id] = [notices].[user_id]
        WHERE [notices_roles].[role_id] IN (SELECT [role_id] FROM [integratedSystemQualitex].[dbo].[roles_users] WHERE [user_id] = " . $authenticatedUserId . ")
          ORDER BY [id] DESC");
        $this->set(compact('notices', 'noticesUsers', 'noticesRoles'));
        $this->set('_serialize', ['notices', 'noticesUsers', 'noticesRoles']);
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
        $authenticatedUserId = $this->Auth->user('id');
        $notice = $this->Notices->get($id, [
            'contain' => ['Users', 'Roles']
        ]);
        $creatorName = $this->Notices->find()
            ->select('users.name')
            ->innerJoin('users', 'users.id = notices.user_id')
            ->where(['notices.id' => $id]);
        $this->set(compact('notice', 'authenticatedUserId', 'creatorName'));
        $this->set('_serialize', ['notice', 'authenticatedUserId', 'creatorName']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $authenticatedUser = $this->Auth->user();
        $notice = $this->Notices->newEntity();
        if ($this->request->is('post'))
        {
            $notice = $this->Notices->patchEntity($notice, $this->request->data);
            if ($this->Notices->save($notice)) 
            {
                $this->Flash->success(__('A notícia foi salva!'));
                return $this->redirect(['action' => 'index']);
            } 
            else 
            {
                $this->Flash->error(__('A notícia não pôde ser salva. Por Favor, tente novamente.'));
            }
        }
        $users = $this->Notices->Users->find('list', ['limit' => 200]);
        $roles = $this->Notices->Roles->find('list', ['limit' => 200]);
        $this->set(compact('notice', 'users', 'roles', 'authenticatedUser'));
        $this->set('_serialize', ['notice', 'authenticatedUser']);
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
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $notice = $this->Notices->patchEntity($notice, $this->request->data);
            if ($this->Notices->save($notice)) 
            {
                $this->Flash->success(__('A notícia foi salva!'));
                return $this->redirect(['action' => 'index']);
            } 
            else 
            {
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
        if ($this->Notices->delete($notice)) 
        {
            $this->Flash->success(__('A notícia foi apagada!'));
        }
        else 
        {
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
        return parent::isAuthorized($user);
    }

}
