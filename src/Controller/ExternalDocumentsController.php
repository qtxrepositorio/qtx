<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

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
            'contain' => ['TreatmentsDocument', 'LocalsDocument', 'Users']
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
            'contain' => ['TreatmentsDocument', 'LocalsDocument', 'Users']
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

        $authenticatedUserId = $this->Auth->user('id');

        $externalDocument = $this->ExternalDocuments->newEntity();
        if ($this->request->is('post')) {

            //======================= GERA O NOVO CODIGO
            $connection = ConnectionManager::get('default');
            $maxRs = $connection->execute("SELECT max([id])
                    ,[number_document]
                FROM [external_documents]
            	    GROUP by [id], [number_document]");
            $max = '';
            foreach ($maxRs as $key => $value) {
                $max = $value['number_document'];
            }
            $max = (int) substr($max,0,6);
            $data = getdate();
            $novo = ( ((string) $max+1) . $data['year']);
            $tamanho = strlen($novo);
            $oquefalta = '';
            for ($i=0; $i < 10 - $tamanho ; $i++) {
                $oquefalta .= '0';
            }
            $novoCod = $oquefalta . $novo;
            //====================================

            $this->request->data['number_document'] = $novoCod;

            $externalDocument = $this->ExternalDocuments->patchEntity($externalDocument, $this->request->data);
            if ($this->ExternalDocuments->save($externalDocument)) {
                $this->Flash->success(__('The external document has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The external document could not be saved. Please, try again.'));
            }
        }

        $localsDocument = $this->ExternalDocuments->LocalsDocument->find('list', ['limit' => 200]);
        $treatmentsDocument = $this->ExternalDocuments->TreatmentsDocument->find('list', ['limit' => 200]);
        $users = $this->ExternalDocuments->Users->find('list', ['limit' => 200]);
        $this->set(compact('externalDocument', 'treatmentsDocument', 'localsDocument', 'users', 'authenticatedUserId'));
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
        $localsDocument = $this->ExternalDocuments->LocalsDocument->find('list', ['limit' => 200]);
        $treatmentsDocument = $this->ExternalDocuments->TreatmentsDocument->find('list', ['limit' => 200]);
        $users = $this->ExternalDocuments->Users->find('list', ['limit' => 200]);
        $this->set(compact('externalDocument', 'treatmentsDocument', 'localsDocument', 'users'));
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
