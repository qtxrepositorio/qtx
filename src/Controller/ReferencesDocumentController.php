<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ReferencesDocument Controller
 *
 * @property \App\Model\Table\ReferencesDocumentTable $ReferencesDocument
 */
class ReferencesDocumentController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $referencesDocument = $this->paginate($this->ReferencesDocument);

        $this->set(compact('referencesDocument'));
        $this->set('_serialize', ['referencesDocument']);
    }

    /**
     * View method
     *
     * @param string|null $id References Document id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $referencesDocument = $this->ReferencesDocument->get($id, [
            'contain' => []
        ]);

        $this->set('referencesDocument', $referencesDocument);
        $this->set('_serialize', ['referencesDocument']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $referencesDocument = $this->ReferencesDocument->newEntity();
        if ($this->request->is('post')) {
            $referencesDocument = $this->ReferencesDocument->patchEntity($referencesDocument, $this->request->data);
            if ($this->ReferencesDocument->save($referencesDocument)) {
                $this->Flash->success(__('The references document has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The references document could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('referencesDocument'));
        $this->set('_serialize', ['referencesDocument']);
    }

    /**
     * Edit method
     *
     * @param string|null $id References Document id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $referencesDocument = $this->ReferencesDocument->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $referencesDocument = $this->ReferencesDocument->patchEntity($referencesDocument, $this->request->data);
            if ($this->ReferencesDocument->save($referencesDocument)) {
                $this->Flash->success(__('The references document has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The references document could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('referencesDocument'));
        $this->set('_serialize', ['referencesDocument']);
    }

    /**
     * Delete method
     *
     * @param string|null $id References Document id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $referencesDocument = $this->ReferencesDocument->get($id);
        if ($this->ReferencesDocument->delete($referencesDocument)) {
            $this->Flash->success(__('The references document has been deleted.'));
        } else {
            $this->Flash->error(__('The references document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
