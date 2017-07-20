<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

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
    public function viewPdf($id = null)
    {
        $doc = $this->ExternalDocuments->get($id);

        $this->loadModel('Users');
        $user = $this->Users->get($doc['user_id']);
        $userCpf = $user['cpf'];

        $connection = ConnectionManager::get('baseProtheus');
        $funcao = $connection->execute("
            SELECT [RJ_DESC]
                FROM [SRA010]
            	    INNER JOIN [SRJ010] ON [RJ_FUNCAO] = [RA_CODFUNC]
            	        WHERE [RJ_CODCBO] != ''
                            AND [SRJ010].D_E_L_E_T_ = ''
                            AND [RA_CIC] like '%$userCpf%'")->fetchAll('assoc');

        $connection = ConnectionManager::get('default');
        $externalDocument = $connection->execute("SELECT  [external_documents].[id]
            , [external_documents].[number_document] as number_document
            , [locals_document].name as locals_name
            , [external_documents].[client_id] as client_id
            , [external_documents].[client_name] as client_name
            , [external_documents].[client_contact] as client_contact
            , [treatments_document].[description] as treatments_description
            , [external_documents].[reference] as external_reference
            , [external_documents].[subject] as external_subject
            , [external_documents].[description] as external_description
            , [users].[name] as users_name
            , [external_documents].[user_function] as user_function
            , [external_documents].[created] as created
            FROM [external_documents]
            INNER JOIN [locals_document] on [locals_document].[id] = [external_documents].[local_id]
            INNER JOIN [treatments_document] on [treatments_document].[id] = [external_documents].[treatment_id]
            INNER JOIN [users] on [users].[id] = [external_documents].[user_id]
            WHERE [external_documents].[id] = '$id'")->fetchAll('assoc');

            $funcao = $funcao[0]['RJ_DESC'];

            $this->set(compact('externalDocument','funcao'));
            $this->set('_serialize', ['externalDocument','funcao']);
            $this->viewBuilder()->layout('ajax');
            $this->response->type('pdf');
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
            $authenticatedUserId = $this->Auth->user('id');

            $externalDocument = $this->ExternalDocuments->get($id, [
                'contain' => []
            ]);

            if ($authenticatedUserId == $externalDocument['user_id']) {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $externalDocument = $this->ExternalDocuments->patchEntity($externalDocument, $this->request->data);
                    if ($this->ExternalDocuments->save($externalDocument)) {
                        $this->Flash->success(__('The external document has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('The external document could not be saved. Please, try again.'));
                    }
                }
            }else{
                $this->Flash->error(__('Apenas o criador do documento pode moficá-lo!'));
                return $this->redirect(['action' => 'index']);
            }

            $localsDocument = $this->ExternalDocuments->LocalsDocument->find('list', ['limit' => 200]);
            $treatmentsDocument = $this->ExternalDocuments->TreatmentsDocument->find('list', ['limit' => 200]);
            $users = $this->ExternalDocuments->Users->find('list', ['limit' => 200]);
            $this->set(compact('externalDocument', 'treatmentsDocument', 'localsDocument', 'users','authenticatedUserId'));
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

        public function beforeFilter(Event $event) {
            parent::beforeFilter($event);
            // Allow users to register and logout.
            // You should not add the "login" action to allow list. Doing so would
            // cause problems with normal functioning of AuthComponent.
            // $this->Auth->allow(['index', 'add', 'addIntoCall', 'edit', 'editIntoCall', 'delete', 'view']);
        }

        public function isAuthorized($user) {
            return true;
        }


    }
