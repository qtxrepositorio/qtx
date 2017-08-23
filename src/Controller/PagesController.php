<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;


class PagesController extends AppController
{
    public function display()
    {

        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }

        $connection = ConnectionManager::get('baseProtheus');
        $birthdaysOfTheMonth = $connection->execute("SELECT
          [RA_NOME]
          ,CONVERT(varchar(10),(DAY([RA_NASC])))+'/'+CONVERT(varchar(10),(MONTH([RA_NASC])))+'/'+CONVERT(varchar(10),YEAR([RA_NASC]))
            as DataDeNascimento
          ,[CTT_DESC01]
          FROM [SRA010]
          INNER JOIN [CTT010] ON [CTT_CUSTO] = [RA_CC]
          WHERE MONTH([RA_NASC]) = MONTH(GETDATE())
          AND DAY([RA_NASC]) >= (DAY(GETDATE())-5)
          AND DAY([RA_NASC]) <= (DAY(GETDATE())+5)
          AND [RA_SITFOLH] != 'D'
          AND [RA_DEMISSA] = ''
          AND [SRA010].[D_E_L_E_T_] = ''
          order by DAY([RA_NASC])");

        $this->loadModel('Notices');
        $this->loadModel('RolesUsers');
        $this->loadModel('Calls');
        $this->loadModel('CallsResponses');

        $authenticatedUserId = $this->Auth->user('id');

        $calls = $this->Calls->find()
            ->limit(5)
            ->select(['calls.id', 'calls.subject', 'calls.created_by', 'CALLS_STATUS.title'])
            ->innerJoin('CALLS_STATUS', 'CALLS_STATUS.id = calls.status_id')
            ->where(['created_by' => $authenticatedUserId])
            ->orWhere(['attributed_to' => $authenticatedUserId])
            ->order(['calls.id' => 'DESC']);

        foreach ($calls as $call) {
            $quant = $noticesRoles = $connection->execute("SELECT count([id]) as count
                FROM [integratedSystemQualitex].[dbo].[calls_responses]
                WHERE call_id = " . $call['calls']['id'] ." AND visualized = 0 AND created_by != $authenticatedUserId
            ");
            foreach ($quant as $value) {
                $call['calls']['quantNotifications'] = $value['count'];
            }
        }

        $noticesUsers = $this->Notices->find()
            ->limit(4)
            ->select(['notices.id','notices.subject','notices.text','notices.created','users.name'])
            ->innerJoin('notices_users', 'notices.id = notices_users.notice_id')
            ->innerJoin('users', 'users.id = notices.user_id')
            ->where(['notices_users.user_id'=> $authenticatedUserId])
            ->order(['notices.id'=>'DESC']);

        if ($authenticatedUserId) {
            $connection = ConnectionManager::get('default');
            $noticesRoles = $connection->execute('
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
            WHERE [notices_roles].[role_id] IN (SELECT [role_id] FROM [integratedSystemQualitex].[dbo].[roles_users] WHERE [user_id] = '.$authenticatedUserId.')
            ORDER BY [id] DESC');
            }

        $this->set(compact('page', 'subpage','birthdaysOfTheMonth','noticesUsers','noticesRoles','calls','authenticatedUserId'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
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

        if ($status == false) {
            $this->Flash->error(__('Usuário desativado, favor procurar o setor TI.'));
			$this->redirect($this->Auth->logout());
        }else{
            return true;
        }
        return parent::isAuthorized($user);

    }

}
