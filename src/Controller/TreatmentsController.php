<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Treatments Controller
 *
 * @property \App\Model\Table\TreatmentsTable $Treatments
 */
class TreatmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $treatments = $this->paginate($this->Treatments);

        $this->set(compact('treatments'));
        $this->set('_serialize', ['treatments']);
    }

    /**
     * View method
     *
     * @param string|null $id Treatment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treatment = $this->Treatments->get($id, [
            'contain' => ['ExternalDocuments']
        ]);

        $this->set('treatment', $treatment);
        $this->set('_serialize', ['treatment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $treatment = $this->Treatments->newEntity();
        if ($this->request->is('post')) {
            $treatment = $this->Treatments->patchEntity($treatment, $this->request->data);
            if ($this->Treatments->save($treatment)) {
                $this->Flash->success(__('The treatment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treatment could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('treatment'));
        $this->set('_serialize', ['treatment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Treatment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treatment = $this->Treatments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treatment = $this->Treatments->patchEntity($treatment, $this->request->data);
            if ($this->Treatments->save($treatment)) {
                $this->Flash->success(__('The treatment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treatment could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('treatment'));
        $this->set('_serialize', ['treatment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Treatment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treatment = $this->Treatments->get($id);
        if ($this->Treatments->delete($treatment)) {
            $this->Flash->success(__('The treatment has been deleted.'));
        } else {
            $this->Flash->error(__('The treatment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
