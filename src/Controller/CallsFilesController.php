<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * CallsFiles Controller
 *
 * @property \App\Model\Table\CallsFilesTable $CallsFiles
 */
class CallsFilesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Calls']
        ];
        $callsFiles = $this->paginate($this->CallsFiles);

        $this->set(compact('callsFiles'));
        $this->set('_serialize', ['callsFiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Calls File id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $callsFile = $this->CallsFiles->get($id, [
            'contain' => ['Calls']
        ]);

        $this->set('callsFile', $callsFile);
        $this->set('_serialize', ['callsFile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $callsFile = $this->CallsFiles->newEntity();
        if ($this->request->is('post')) {

            $callsFile['text'] = $this->request->data['text'];
            $callsFile['call_id'] = $this->request->data['call_id'];
            $callsFile['archive'] = $this->request->data['files']['name'];

            $fieldsFull = true;
            if ($callsFile['text'] == '' or $callsFile['archive'] == '') {
                $fieldsFull = false;
            }

            if ($fieldsFull) {

                $existFind = $this->CallsFiles->find()
                        ->where(['call_id' => $callsFile['call_id']])
                        ->andWhere(['archive' => $callsFile['archive']]);

                $exist = false;
                foreach ($existFind as $key => $value) {
                    $exist = true;
                }

                if (!$exist) {
                    if ($this->CallsFiles->save($callsFile)) {

                        if (file_exists(getcwd() . '/files/calls_files/' . strval($callsFile['call_id']) . '/')) {

                            $filepath = getcwd() . '/files/calls_files' . '/' . strval($callsFile['call_id']) . '/' . $this->request->data['files']['name'];

                            $filename = $this->request->data['files']['name'];

                            move_uploaded_file($this->request->data['files']['tmp_name'], $filepath);
                        } else {

                            mkdir(getcwd() . '/files/calls_files/' . strval($callsFile['call_id']) . '/', 0777, true);

                            $filepath = getcwd()
                                    . '/files/calls_files/'
                                    . strval($callsFile['call_id'])
                                    . '/' . $this->request->data['files']['name'];

                            $filename = $this->request->data['files']['name'];

                            move_uploaded_file($this->request->data['files']['tmp_name'], $filepath);
                        }

                        $this->Flash->success(__('O arquivo foi salvo com sucesso!'));

                        return $this->redirect(['controller' => 'calls', 'action' => 'view', $callsFile['call_id']]);
                    } else {
                        $this->Flash->error(__('O arquivo não pode ser salvo!'));
                    }
                } else {
                    $this->Flash->error(__('Esse arquivo já foi anexado! Caso necessário enviar novamente, mude o nome do arquivo antes do envio ou apague o envio antigo!'));
                    return $this->redirect(['controller' => 'calls', 'action' => 'view', $callsFile['call_id']]);
                }
            } else {
                $this->Flash->error(__('Os dois campos são obrigatórios!'));
                return $this->redirect(['controller' => 'calls', 'action' => 'view', $callsFile['call_id']]);
            }
        }
        $calls = $this->CallsFiles->Calls->find('list', ['limit' => 200]);
        $this->set(compact('callsFile', 'calls'));
        $this->set('_serialize', ['callsFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calls File id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $callsFile = $this->CallsFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $callsFile = $this->CallsFiles->patchEntity($callsFile, $this->request->data);
            if ($this->CallsFiles->save($callsFile)) {
                $this->Flash->success(__('O arquivo foi salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O arquivo não pode ser salvo!'));
            }
        }
        $calls = $this->CallsFiles->Calls->find('list', ['limit' => 200]);
        $this->set(compact('callsFile', 'calls'));
        $this->set('_serialize', ['callsFile']);
    }

    public function editIntoCall($id = null) {

        $callsFile = $this->CallsFiles->get($id, [
            'contain' => []
        ]);

        $this->loadModel('Calls');
        $call = $this->Calls->get($callsFile->call_id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $callsFile = $this->CallsFiles->patchEntity($callsFile, $this->request->data);
            if ($this->CallsFiles->save($callsFile)) {
                $this->Flash->success(__('O arquivo foi salvo com sucesso!'));

                return $this->redirect(['controller' => 'calls', 'action' => 'view', $callsFile->call_id]);
            } else {
                $this->Flash->error(__('O arquivo não pode ser salvo!'));
            }
        }
        $calls = $this->CallsFiles->Calls->find('list', ['limit' => 200]);
        $this->set(compact('callsFile', 'calls'));
        $this->set('_serialize', ['callsFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calls File id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $callsFile = $this->CallsFiles->get($id);
        if ($this->CallsFiles->delete($callsFile)) {

            echo unlink(getcwd()
                    . '/files/calls_files/'
                    . strval($callsFile['call_id'])
                    . '/' . strval($callsFile['files']));

            $this->Flash->success(__('O arquivo foi apagado com sucesso!.'));
        } else {
            $this->Flash->error(__('O arquivo não pode ser apagado!'));
        }

        return $this->redirect(['controller' => 'calls', 'action' => 'view', $callsFile['call_id']]);
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        // $this->Auth->allow(['index', 'add', 'edit', 'delete', 'view']);
    }

    public function isAuthorized($user) {

        return true;

    }

}
