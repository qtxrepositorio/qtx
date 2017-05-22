<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SolutionsFiles Controller
 *
 * @property \App\Model\Table\SolutionsFilesTable $SolutionsFiles
 */
class SolutionsFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CallsSolutions']
        ];
        $solutionsFiles = $this->paginate($this->SolutionsFiles);

        $this->set(compact('solutionsFiles'));
        $this->set('_serialize', ['solutionsFiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Solutions File id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $solutionsFile = $this->SolutionsFiles->get($id, [
            'contain' => ['CallsSolutions']
        ]);

        $this->set('solutionsFile', $solutionsFile);
        $this->set('_serialize', ['solutionsFile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $solutionsFile = $this->SolutionsFiles->newEntity();
        if ($this->request->is('post')) {

            $solutionsFile['text'] = $this->request->data['text'];
            $solutionsFile['solution_id'] = $this->request->data['solution_id'];
            $solutionsFile['archive'] = $this->request->data['archive']['name'];

            $existFind = $this->SolutionsFiles->find()
                ->where(['solution_id' => $solutionsFile['solution_id']])
                ->andWhere(['archive' => $solutionsFile['archive']]);

            $exist = false;
            foreach ($existFind as $key => $value) {
                $exist = true;
            }

            if (!$exist) {

                if ($this->SolutionsFiles->save($solutionsFile)) {

                    if (file_exists(getcwd() . '/files/solutions_files/' . strval($solutionsFile['solution_id']) . '/')) {

                        $filepath = getcwd() . '/files/solutions_files' . '/' . strval($solutionsFile['solution_id']) . '/' . $this->request->data['archive']['name'];

                        $filename = $this->request->data['archive']['name'];

                        move_uploaded_file($this->request->data['archive']['tmp_name'], $filepath);
                    } else {

                        mkdir(getcwd() . '/files/solutions_files/' . strval($solutionsFile['solution_id']) . '/', 0777, true);

                        $filepath = getcwd()
                                . '/files/solutions_files/'
                                . strval($solutionsFile['solution_id'])
                                . '/' . $this->request->data['archive']['name'];

                        $filename = $this->request->data['archive']['name'];

                        move_uploaded_file($this->request->data['archive']['tmp_name'], $filepath);
                    }

                    $this->Flash->success(__('O anexo foi salvo com sucesso!'));
                    
                } else {

                    $this->Flash->error(__('O anexo não pode ser salvo!'));
                    
                }
            }else{
                $this->Flash->error(__('O anexo não pode ser salvo pois o arquivo já foi anexado anteriormente, mude o nome do arquivo e tente novamente!'));    
            }

            return $this->redirect(['controller'=>'callsSolutions','action' => 'view',$this->request->data['solution_id']]);
            
        }
        $callsSolutions = $this->SolutionsFiles->CallsSolutions->find('list', ['limit' => 200]);
        $this->set(compact('solutionsFile', 'callsSolutions'));
        $this->set('_serialize', ['solutionsFile']);
    }

    public function addIntoCall()
    {
        $solutionsFile = $this->SolutionsFiles->newEntity();
        if ($this->request->is('post')) {

            $solutionsFile['text'] = $this->request->data['text'];
            $solutionsFile['solution_id'] = $this->request->data['solution_id'];
            $solutionsFile['archive'] = $this->request->data['archive']['name'];

            $existFind = $this->SolutionsFiles->find()
                ->where(['solution_id' => $solutionsFile['solution_id']])
                ->andWhere(['archive' => $solutionsFile['archive']]);

            $exist = false;
            foreach ($existFind as $key => $value) {
                $exist = true;
            }

            if (!$exist) {

                if ($this->SolutionsFiles->save($solutionsFile)) {

                    if (file_exists(getcwd() . '/files/solutions_files/' . strval($solutionsFile['solution_id']) . '/')) {

                        $filepath = getcwd() . '/files/solutions_files' . '/' . strval($solutionsFile['solution_id']) . '/' . $this->request->data['archive']['name'];

                        $filename = $this->request->data['archive']['name'];

                        move_uploaded_file($this->request->data['archive']['tmp_name'], $filepath);
                    } else {

                        mkdir(getcwd() . '/files/solutions_files/' . strval($solutionsFile['solution_id']) . '/', 0777, true);

                        $filepath = getcwd()
                                . '/files/solutions_files/'
                                . strval($solutionsFile['solution_id'])
                                . '/' . $this->request->data['archive']['name'];

                        $filename = $this->request->data['archive']['name'];

                        move_uploaded_file($this->request->data['archive']['tmp_name'], $filepath);
                    }

                    $this->Flash->success(__('O anexo foi salvo com sucesso!'));
                    
                } else {

                    $this->Flash->error(__('O anexo não pode ser salvo!'));
                    
                }
            }else{
                $this->Flash->error(__('O anexo não pode ser salvo pois o arquivo já foi anexado anteriormente, mude o nome do arquivo e tente novamente!'));    
            }

            return $this->redirect(['controller'=>'calls','action' => 'view',$this->request->data['call_id']]);
            
        }
        
        $this->set(compact('solutionsFile', 'callsSolutions'));
        $this->set('_serialize', ['solutionsFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Solutions File id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $solutionsFile = $this->SolutionsFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $solutionsFile = $this->SolutionsFiles->patchEntity($solutionsFile, $this->request->data);
            if ($this->SolutionsFiles->save($solutionsFile)) {
                
                $this->Flash->success(__('O anexo foi editado com sucesso!'));
                return $this->redirect(['controller'=>'callsSolutions','action' => 'view',$this->request->data['solution_id']]);
            } else {

                $this->Flash->error(__('O anexo nao pode ser foi editado!'));
                return $this->redirect(['controller'=>'callsSolutions','action' => 'view',$this->request->data['solution_id']]);
            }
        }
        $callsSolutions = $this->SolutionsFiles->CallsSolutions->find('list', ['limit' => 200]);
        $this->set(compact('solutionsFile', 'callsSolutions'));
        $this->set('_serialize', ['solutionsFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Solutions File id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $solutionsFile = $this->SolutionsFiles->get($id);
        if ($this->SolutionsFiles->delete($solutionsFile)) {
            echo unlink(getcwd()
                    . '/files/solutions_files/'
                    . strval($solutionsFile['solution_id'])
                    . '/' . strval($solutionsFile['archive']));
            $this->Flash->success(__('O anexo da solução foi apagado.'));
        } else {
            $this->Flash->error(__('O anexo da solução não pode ser apagado.'));
        }

        return $this->redirect(['controller'=>'callsSolutions','action' => 'view', $solutionsFile['solution_id']]);
    }
}
