<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExternalDocuments Controller
 *
 * @property \App\Model\Table\ExternalDocumentsTable $ExternalDocuments
 */
class ExternalDocumentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients', 'Treatments', 'Users']
        ];
        $externalDocuments = $this->paginate($this->ExternalDocuments);

        $this->set(compact('externalDocuments'));
        $this->set('_serialize', ['externalDocuments']);
    }

    /**
     * View method
     *
     * @param string|null $id External Document id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $externalDocument = $this->ExternalDocuments->get($id, [
            'contain' => ['Clients', 'Treatments', 'Users']
        ]);

        $this->set('externalDocument', $externalDocument);
        $this->set('_serialize', ['externalDocument']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $externalDocument = $this->ExternalDocuments->newEntity();
        if ($this->request->is('post')) {
            $externalDocument = $this->ExternalDocuments->patchEntity($externalDocument, $this->request->data);
            if ($this->ExternalDocuments->save($externalDocument)) {
                $this->Flash->success(__('The external document has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The external document could not be saved. Please, try again.'));
            }
        }
        $clients = $this->ExternalDocuments->Clients->find('list', ['limit' => 200]);
        $treatments = $this->ExternalDocuments->Treatments->find('list', ['limit' => 200]);
        $users = $this->ExternalDocuments->Users->find('list', ['limit' => 200]);
        $this->set(compact('externalDocument', 'clients', 'treatments', 'users'));
        $this->set('_serialize', ['externalDocument']);
    }

    /**
     * Edit method
     *
     * @param string|null $id External Document id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $externalDocument = $this->ExternalDocuments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $externalDocument = $this->ExternalDocuments->patchEntity($externalDocument, $this->request->data);
            if ($this->ExternalDocuments->save($externalDocument)) {
                $this->Flash->success(__('The external document has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The external document could not be saved. Please, try again.'));
            }
        }
        $clients = $this->ExternalDocuments->Clients->find('list', ['limit' => 200]);
        $treatments = $this->ExternalDocuments->Treatments->find('list', ['limit' => 200]);
        $users = $this->ExternalDocuments->Users->find('list', ['limit' => 200]);
        $this->set(compact('externalDocument', 'clients', 'treatments', 'users'));
        $this->set('_serialize', ['externalDocument']);
    }

    /**
     * Delete method
     *
     * @param string|null $id External Document id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $externalDocument = $this->ExternalDocuments->get($id);
        if ($this->ExternalDocuments->delete($externalDocument)) {
            $this->Flash->success(__('The external document has been deleted.'));
        } else {
            $this->Flash->error(__('The external document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
