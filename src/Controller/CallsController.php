<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Calls Controller
 *
 * @property \App\Model\Table\CallsTable $Calls
 */
class CallsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];

        $authenticatedUserId = $this->Auth->user('id');

        $calls = $this->Calls->find()
                    ->where(['created_by' => $authenticatedUserId])
                    ->orWhere(['attributed_to' => $authenticatedUserId])
                    ->order(['Calls.id' => 'DESC']);

        $this->set(compact('calls'));
        $this->set('_serialize', ['calls']);
    }

    /**
     * View method
     *
     * @param string|null $id Call id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $this->loadModel('Users'); 
        $this->loadModel('CallsResponses'); 

        $authenticatedUser = $this->Auth->user();
        
        $call = $this->Calls->get($id, [
            'contain' => ['Users', 'CallsResponses']
        ]);

        $call['authenticatedUser'] = $authenticatedUser;

        //debug($call);

        foreach ($call['calls_responses'] as $key => $value) {

            $query = $this->Users->find()
            ->where([
                'id'=> $value['created_by']           
            ]);

            $created_by = $query->all();

            foreach ($created_by as $key => $x) {
                $value['created_by'] = $x['name'];
            }

        }

        $query = $this->Users->find()
            ->where([
                'id'=> $call['created_by']            
            ]);

        $created_by = $query->all();

        foreach ($created_by as $key) 
        {
            $created_by_name = $key['name'];
        }

        $call['created_by'] = $created_by_name;

        $this->visualized($call['id']);

        $this->set('call', $call);
        $this->set('_serialize', ['call']);

        //$this->set(compact('responses'));
        //$this->set('_serialize', ['responses']);

    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
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

    /**
     * Edit method
     *
     * @param string|null $id Call id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $call = $this->Calls->get($id, [
            'contain' => []
        ]);

        $authenticatedUser = $this->Auth->user();

        if ($this->request->is(['patch', 'post', 'put'])) {
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

    /**
     * Delete method
     *
     * @param string|null $id Call id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $call = $this->Calls->get($id);
        if ($this->Calls->delete($call)) {
            $this->Flash->success(__('O chamado foi apagado com sucesso!'));
        } else {
            $this->Flash->error(__('O chamado não pode ser apagado, tente novamente!'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function visualized($id = null)
    {
        $call = $this->Calls->get($id, [
            'contain' => []
        ]);

        $authenticatedUser = $this->Auth->user();

        if ($call['attributed_to'] == $authenticatedUser['id']) {
            $call['visualized'] = 1;
            $this->Calls->save($call);
        }
    }

    public function dash(){

        $authenticatedUserId = $this->Auth->user('id');

        $calls = $this->Calls->find()
            ->order(['Calls.id' => 'DESC']);

        $this->set(compact('calls'));
        $this->set('_serialize', ['calls']);        
        
    }
    
}
