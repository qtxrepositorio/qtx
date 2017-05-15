<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CallsStatus Controller
 *
 * @property \App\Model\Table\CallsStatusTable $CallsStatus
 */
class CallsStatusController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $callsStatus = $this->paginate($this->CallsStatus);

        $this->set(compact('callsStatus'));
        $this->set('_serialize', ['callsStatus']);
    }

    /**
     * View method
     *
     * @param string|null $id Calls Status id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $callsStatus = $this->CallsStatus->get($id, [
            'contain' => []
        ]);

        $this->set('callsStatus', $callsStatus);
        $this->set('_serialize', ['callsStatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $callsStatus = $this->CallsStatus->newEntity();
        if ($this->request->is('post')) {
            $callsStatus = $this->CallsStatus->patchEntity($callsStatus, $this->request->data);
            if ($this->CallsStatus->save($callsStatus)) {
                $this->Flash->success(__('The calls status has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calls status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('callsStatus'));
        $this->set('_serialize', ['callsStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calls Status id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $callsStatus = $this->CallsStatus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $callsStatus = $this->CallsStatus->patchEntity($callsStatus, $this->request->data);
            if ($this->CallsStatus->save($callsStatus)) {
                $this->Flash->success(__('The calls status has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calls status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('callsStatus'));
        $this->set('_serialize', ['callsStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calls Status id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $callsStatus = $this->CallsStatus->get($id);
        if ($this->CallsStatus->delete($callsStatus)) {
            $this->Flash->success(__('The calls status has been deleted.'));
        } else {
            $this->Flash->error(__('The calls status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
