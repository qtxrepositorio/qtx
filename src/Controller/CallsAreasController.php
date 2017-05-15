<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CallsAreas Controller
 *
 * @property \App\Model\Table\CallsAreasTable $CallsAreas
 */
class CallsAreasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $callsAreas = $this->paginate($this->CallsAreas);

        $this->set(compact('callsAreas'));
        $this->set('_serialize', ['callsAreas']);
    }

    /**
     * View method
     *
     * @param string|null $id Calls Area id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $callsArea = $this->CallsAreas->get($id, [
            'contain' => []
        ]);

        $this->set('callsArea', $callsArea);
        $this->set('_serialize', ['callsArea']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $callsArea = $this->CallsAreas->newEntity();
        if ($this->request->is('post')) {
            $callsArea = $this->CallsAreas->patchEntity($callsArea, $this->request->data);
            if ($this->CallsAreas->save($callsArea)) {
                $this->Flash->success(__('The calls area has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calls area could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('callsArea'));
        $this->set('_serialize', ['callsArea']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calls Area id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $callsArea = $this->CallsAreas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $callsArea = $this->CallsAreas->patchEntity($callsArea, $this->request->data);
            if ($this->CallsAreas->save($callsArea)) {
                $this->Flash->success(__('The calls area has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calls area could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('callsArea'));
        $this->set('_serialize', ['callsArea']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calls Area id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $callsArea = $this->CallsAreas->get($id);
        if ($this->CallsAreas->delete($callsArea)) {
            $this->Flash->success(__('The calls area has been deleted.'));
        } else {
            $this->Flash->error(__('The calls area could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
