<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TreatmentsDocument Controller
 *
 * @property \App\Model\Table\TreatmentsDocumentTable $TreatmentsDocument
 */
class TreatmentsDocumentController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $treatmentsDocument = $this->paginate($this->TreatmentsDocument);

        $this->set(compact('treatmentsDocument'));
        $this->set('_serialize', ['treatmentsDocument']);
    }

    /**
     * View method
     *
     * @param string|null $id Treatments Document id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treatmentsDocument = $this->TreatmentsDocument->get($id, [
            'contain' => []
        ]);

        $this->set('treatmentsDocument', $treatmentsDocument);
        $this->set('_serialize', ['treatmentsDocument']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $treatmentsDocument = $this->TreatmentsDocument->newEntity();
        if ($this->request->is('post')) {
            $treatmentsDocument = $this->TreatmentsDocument->patchEntity($treatmentsDocument, $this->request->data);
            if ($this->TreatmentsDocument->save($treatmentsDocument)) {
                $this->Flash->success(__('The treatments document has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treatments document could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('treatmentsDocument'));
        $this->set('_serialize', ['treatmentsDocument']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Treatments Document id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treatmentsDocument = $this->TreatmentsDocument->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treatmentsDocument = $this->TreatmentsDocument->patchEntity($treatmentsDocument, $this->request->data);
            if ($this->TreatmentsDocument->save($treatmentsDocument)) {
                $this->Flash->success(__('The treatments document has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treatments document could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('treatmentsDocument'));
        $this->set('_serialize', ['treatmentsDocument']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Treatments Document id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treatmentsDocument = $this->TreatmentsDocument->get($id);
        if ($this->TreatmentsDocument->delete($treatmentsDocument)) {
            $this->Flash->success(__('The treatments document has been deleted.'));
        } else {
            $this->Flash->error(__('The treatments document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
