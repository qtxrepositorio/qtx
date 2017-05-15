<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CallsUrgency Controller
 *
 * @property \App\Model\Table\CallsUrgencyTable $CallsUrgency
 */
class CallsUrgencyController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $callsUrgency = $this->paginate($this->CallsUrgency);

        $this->set(compact('callsUrgency'));
        $this->set('_serialize', ['callsUrgency']);
    }

    /**
     * View method
     *
     * @param string|null $id Calls Urgency id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $callsUrgency = $this->CallsUrgency->get($id, [
            'contain' => []
        ]);

        $this->set('callsUrgency', $callsUrgency);
        $this->set('_serialize', ['callsUrgency']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $callsUrgency = $this->CallsUrgency->newEntity();
        if ($this->request->is('post')) {
            $callsUrgency = $this->CallsUrgency->patchEntity($callsUrgency, $this->request->data);
            if ($this->CallsUrgency->save($callsUrgency)) {
                $this->Flash->success(__('The calls urgency has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calls urgency could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('callsUrgency'));
        $this->set('_serialize', ['callsUrgency']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calls Urgency id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $callsUrgency = $this->CallsUrgency->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $callsUrgency = $this->CallsUrgency->patchEntity($callsUrgency, $this->request->data);
            if ($this->CallsUrgency->save($callsUrgency)) {
                $this->Flash->success(__('The calls urgency has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calls urgency could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('callsUrgency'));
        $this->set('_serialize', ['callsUrgency']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calls Urgency id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $callsUrgency = $this->CallsUrgency->get($id);
        if ($this->CallsUrgency->delete($callsUrgency)) {
            $this->Flash->success(__('The calls urgency has been deleted.'));
        } else {
            $this->Flash->error(__('The calls urgency could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
