<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;


class CallsController extends AppController {

    public function index() {

        $authenticatedUserId = $this->Auth->user('id');

        $calls = $this->Calls->find()
                ->where(['created_by' => $authenticatedUserId])
                ->orWhere(['attributed_to' => $authenticatedUserId])
                ->order(['Calls.id' => 'DESC']);

        $this->set(compact('calls'));
        $this->set('_serialize', ['calls']);
    }

    public function view($id = null) {

        $this->loadModel('Users');
        $this->loadModel('CallsResponses');

        $authenticatedUser = $this->Auth->user();

        $call = $this->Calls->get($id, [
            'contain' => ['Users', 'CallsResponses']
        ]);

        $call['authenticatedUser'] = $authenticatedUser;

        foreach ($call['calls_responses'] as $key => $value) {

            $query = $this->Users->find()
                    ->where([
                'id' => $value['created_by']
            ]);

            $created_by = $query->all();

            foreach ($created_by as $key => $x) {
                $value['created_by'] = $x['name'];
            }
        }

        $query = $this->Users->find()
                ->where([
            'id' => $call['created_by']
        ]);

        $created_by = $query->all();

        foreach ($created_by as $key) {
            $created_by_name = $key['name'];
        }

        $call['created_by'] = $created_by_name;

        $this->visualized($call['id']);

        $this->set('call', $call);
        $this->set('_serialize', ['call']);
    }

    public function add() {
        $authenticatedUser = $this->Auth->user();
        $call = $this->Calls->newEntity();
        if ($this->request->is('post')) {
            $call = $this->Calls->patchEntity($call, $this->request->data);
            if ($this->Calls->save($call)) {
                $this->Flash->success(__('O chamado foi salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O chamado não pode ser salvo, tente novamente!'));
            }
        }
        $users = $this->Calls->Users->find('list', ['limit' => 200]);
        $this->set(compact('call', 'users', 'authenticatedUser'));
        $this->set('_serialize', ['call', 'authenticatedUser']);
    }

    public function edit($id = null) {

        $call = $this->Calls->get($id, [
            'contain' => []
        ]);

        $authenticatedUser = $this->Auth->user();

        $statusBeforeEdit = $this->findStatus($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $call = $this->Calls->patchEntity($call, $this->request->data);
            if ($this->Calls->save($call)) {
                $this->Flash->success(__('O chamado foi atualizado com sucesso!'));
                if ($call['status'] != $statusBeforeEdit) {
                  $this->saveNewStatus($id, $call['status'], $authenticatedUser['id']);
                }
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O chamado não pode ser atualizado, tente novamente!'));
            }
        }
        $users = $this->Calls->Users->find('list', ['limit' => 200]);
        $this->set(compact('call', 'users', 'authenticatedUser'));
        $this->set('_serialize', ['call', 'authenticatedUser']);
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $call = $this->Calls->get($id);
        if ($this->Calls->delete($call)) {
            $this->Flash->success(__('O chamado foi apagado com sucesso!'));
        } else {
            $this->Flash->error(__('O chamado não pode ser apagado, tente novamente!'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function visualized($id = null) {

        $call = $this->Calls->get($id, [
            'contain' => []
        ]);

        $authenticatedUser = $this->Auth->user();

        if ($call['attributed_to'] == $authenticatedUser['id']) {
            $call['visualized'] = 1;
            $this->Calls->save($call);
        }

        $connection = ConnectionManager::get('default');
        $callsCountCategory = $connection
            ->execute("
                UPDATE[calls_responses]
                    SET
                        visualized = 1
                    WHERE call_id = $id
                        AND created_by != ". $authenticatedUser['id']
            );

    }

    public function dash() {

        $authenticatedUserId = $this->Auth->user('id');

        $connection = ConnectionManager::get('baseProtheus');
        $callsCountCategory = $connection
                ->execute("SELECT count([id]) as count, category
              FROM [integratedSystemQualitex].[dbo].[calls]
              WHERE calls.created  > DATEADD(DAY, -30 , GETDATE())
              AND calls.attributed_to = $authenticatedUserId
              group by category
            ");

        $callsCountStatus = $connection
                ->execute("SELECT count([id]) as count, status
              FROM [integratedSystemQualitex].[dbo].[calls]
              WHERE calls.created  > DATEADD(DAY, -30 , GETDATE())
              AND calls.attributed_to = $authenticatedUserId
              group by status
            ");

        $calls = $this->Calls->find()
                ->order(['Calls.id' => 'DESC']);

        $this->set(compact('calls', 'callsCountCategory', 'callsCountStatus'));
        $this->set('_serialize', ['calls', 'callsCountCategory', 'callsCountStatus']);
    }

    public function findStatus($id = null) {

        $calls = $this->Calls->find()
                ->where(['id' => $id]);

        $status = '';

        foreach ($calls as $key => $value) {
            $status = $value['status'];
        }

        return $status;
    }

    public function saveNewStatus($call_id = null, $status = null, $created_by = null){

      $this->loadModel('CallsResponses');

      $callsResponse = $this->CallsResponses->newEntity();

      if ($status != 'Solucionado') {
        $callsResponse['text'] = 'O status do chamado foi alteradao para: '. $status .'.';      
      }else{
        $callsResponse['text'] = 'O chamado foi solucionado!';      
      }

      $callsResponse['created_by'] = $created_by;
      $callsResponse['call_id'] = $call_id;
      $callsResponse['visualized'] = 0;

      //$callsResponse = $this->CallsResponses->patchEntity($callsResponse);

      if($this->CallsResponses->save($callsResponse)){
        return $this->redirect(['controller' => 'Calls','action' => 'view', $call_id]);    
      }

    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.

        $this->Auth->allow(['index','add','edit','delete','view']);  
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
                    if($key['id'] == 25 or $key['id'] == 26 or $key['id'] == 01) 
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
                if(in_array($this->action, array('dash')))
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
