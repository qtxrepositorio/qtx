<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LocalsDocument Controller
 *
 * @property \App\Model\Table\LocalsDocumentTable $LocalsDocument
 */
class LocalsDocumentController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $localsDocument = $this->paginate($this->LocalsDocument);

        $this->set(compact('localsDocument'));
        $this->set('_serialize', ['localsDocument']);
    }

    /**
     * View method
     *
     * @param string|null $id Locals Document id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $localsDocument = $this->LocalsDocument->get($id, [
            'contain' => []
        ]);

        $this->set('localsDocument', $localsDocument);
        $this->set('_serialize', ['localsDocument']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $localsDocument = $this->LocalsDocument->newEntity();
        if ($this->request->is('post')) {
            $localsDocument = $this->LocalsDocument->patchEntity($localsDocument, $this->request->data);
            if ($this->LocalsDocument->save($localsDocument)) {
                $this->Flash->success(__('The locals document has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The locals document could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('localsDocument'));
        $this->set('_serialize', ['localsDocument']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Locals Document id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $localsDocument = $this->LocalsDocument->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $localsDocument = $this->LocalsDocument->patchEntity($localsDocument, $this->request->data);
            if ($this->LocalsDocument->save($localsDocument)) {
                $this->Flash->success(__('The locals document has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The locals document could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('localsDocument'));
        $this->set('_serialize', ['localsDocument']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Locals Document id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $localsDocument = $this->LocalsDocument->get($id);
        if ($this->LocalsDocument->delete($localsDocument)) {
            $this->Flash->success(__('The locals document has been deleted.'));
        } else {
            $this->Flash->error(__('The locals document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
