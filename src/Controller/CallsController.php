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
        $calls = $this->paginate($this->Calls);

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
        $call = $this->Calls->get($id, [
            'contain' => ['CallsResponses']
        ]);

        $this->set('call', $call);
        $this->set('_serialize', ['call']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $call = $this->Calls->newEntity();
        if ($this->request->is('post')) {
            $call = $this->Calls->patchEntity($call, $this->request->data);
            if ($this->Calls->save($call)) {
                $this->Flash->success(__('The call has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The call could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('call'));
        $this->set('_serialize', ['call']);
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $call = $this->Calls->patchEntity($call, $this->request->data);
            if ($this->Calls->save($call)) {
                $this->Flash->success(__('The call has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The call could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('call'));
        $this->set('_serialize', ['call']);
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
            $this->Flash->success(__('The call has been deleted.'));
        } else {
            $this->Flash->error(__('The call could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
