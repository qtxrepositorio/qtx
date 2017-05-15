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
            $solutionsFile = $this->SolutionsFiles->patchEntity($solutionsFile, $this->request->data);
            if ($this->SolutionsFiles->save($solutionsFile)) {
                $this->Flash->success(__('The solutions file has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The solutions file could not be saved. Please, try again.'));
            }
        }
        $callsSolutions = $this->SolutionsFiles->CallsSolutions->find('list', ['limit' => 200]);
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
                $this->Flash->success(__('The solutions file has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The solutions file could not be saved. Please, try again.'));
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
            $this->Flash->success(__('The solutions file has been deleted.'));
        } else {
            $this->Flash->error(__('The solutions file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
