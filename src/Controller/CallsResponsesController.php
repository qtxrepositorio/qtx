<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CallsResponses Controller
 *
 * @property \App\Model\Table\CallsResponsesTable $CallsResponses
 */
class CallsResponsesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Calls']
        ];
        $callsResponses = $this->paginate($this->CallsResponses);

        $this->set(compact('callsResponses'));
        $this->set('_serialize', ['callsResponses']);
    }

    /**
     * View method
     *
     * @param string|null $id Calls Response id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $callsResponse = $this->CallsResponses->get($id, [
            'contain' => ['Calls']
        ]);

        $this->set('callsResponse', $callsResponse);
        $this->set('_serialize', ['callsResponse']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $callsResponse = $this->CallsResponses->newEntity();
        if ($this->request->is('post')) {
            $callsResponse = $this->CallsResponses->patchEntity($callsResponse, $this->request->data);
            if ($this->CallsResponses->save($callsResponse)) {
                $this->Flash->success(__('The calls response has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calls response could not be saved. Please, try again.'));
            }
        }
        $calls = $this->CallsResponses->Calls->find('list', ['limit' => 200]);
        $this->set(compact('callsResponse', 'calls'));
        $this->set('_serialize', ['callsResponse']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calls Response id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $callsResponse = $this->CallsResponses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $callsResponse = $this->CallsResponses->patchEntity($callsResponse, $this->request->data);
            if ($this->CallsResponses->save($callsResponse)) {
                $this->Flash->success(__('The calls response has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calls response could not be saved. Please, try again.'));
            }
        }
        $calls = $this->CallsResponses->Calls->find('list', ['limit' => 200]);
        $this->set(compact('callsResponse', 'calls'));
        $this->set('_serialize', ['callsResponse']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calls Response id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $callsResponse = $this->CallsResponses->get($id);
        if ($this->CallsResponses->delete($callsResponse)) {
            $this->Flash->success(__('The calls response has been deleted.'));
        } else {
            $this->Flash->error(__('The calls response could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addChat(){

        $callsResponse = $this->CallsResponses->newEntity();
        $callsResponse = $this->CallsResponses->patchEntity($callsResponse, $this->request->data);

        if($this->CallsResponses->save($callsResponse)){
            return $this->redirect(['controller' => 'Calls','action' => 'view', $this->request->data['call_id']]);    
        }

    }


}
