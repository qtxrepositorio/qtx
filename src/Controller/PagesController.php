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
          AND DAY([RA_NASC]) >= (DAY(GETDATE())-3)
          AND DAY([RA_NASC]) <= (DAY(GETDATE())+3) 
          AND [RA_SITFOLH] != 'D'
          order by DAY([RA_NASC])");

        $this->loadModel('Notices'); 
        $this->loadModel('RolesUsers'); 

        $authenticatedUserId = $this->Auth->user('id');

        $noticesUsers = $this->Notices->find()
            ->limit(4)
            ->select(['notices.id','notices.subject','notices.text','notices.created','users.name'])
            ->innerJoin('notices_users', 'notices.id = notices_users.notice_id')
            ->innerJoin('users', 'users.id = notices.user_id')
            ->where(['notices_users.user_id'=> $authenticatedUserId])
            ->order(['notices.id'=>'DESC']);

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
        WHERE [notices_roles].[role_id] IN (SELECT [role_id] FROM [integratedSystemQualitex].[dbo].[roles_users] WHERE [user_id] = ".$authenticatedUserId.")
          ORDER BY [id] DESC");

        $this->set(compact('page', 'subpage','birthdaysOfTheMonth','noticesUsers','noticesRoles'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }    
}
