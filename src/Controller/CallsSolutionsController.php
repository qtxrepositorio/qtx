<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * CallsSolutions Controller
 *
 * @property \App\Model\Table\CallsSolutionsTable $CallsSolutions
 */
class CallsSolutionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CallsSubcategories']
        ];
        $callsSolutions = $this->paginate($this->CallsSolutions);

        $this->set(compact('callsSolutions'));
        $this->set('_serialize', ['callsSolutions']);
    }

    /**
     * View method
     *
     * @param string|null $id Calls Solution id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $this->loadModel('SolutionsFiles');

        $callsSolution = $this->CallsSolutions->get($id, [
            'contain' => ['CallsSubcategories']
        ]);

        $callsSolution['archives'] = $this->SolutionsFiles->find()
            ->where(['solution_id' => $callsSolution['id']]);

        //debug($callsSolution);

        $this->set('callsSolution', $callsSolution);
        $this->set('_serialize', ['callsSolution']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $callsSolution = $this->CallsSolutions->newEntity();
        if ($this->request->is('post')) {
            $callsSolution = $this->CallsSolutions->patchEntity($callsSolution, $this->request->data);
            if ($this->CallsSolutions->save($callsSolution)) {
                $this->Flash->success(__('The calls solution has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calls solution could not be saved. Please, try again.'));
            }
        }
        $callsSubcategories = $this->CallsSolutions->CallsSubcategories->find('list', ['limit' => 200]);
        $this->set(compact('callsSolution', 'callsSubcategories'));
        $this->set('_serialize', ['callsSolution']);
    }

    public function addIntoCall()
    {   
        $call_id = $this->request->data['call_id'];

        $callsSolution = $this->CallsSolutions->newEntity();
        if ($this->request->is('post')) {
            $callsSolution = $this->CallsSolutions->patchEntity($callsSolution, $this->request->data);
            $callsSolution['subcategorie_id'] = $this->request->data['subcategorie_id'];
            if ($this->CallsSolutions->save($callsSolution)) {
                $this->Flash->success(__('A solução foi salva e aplicada com sucesso!'));

                $connection = ConnectionManager::get('default');
                $callsCountCategory = $connection
                        ->execute("UPDATE CALLS SET SOLUTION_ID =" . $callsSolution['id'] . " WHERE ID = ". $call_id);

            } else {
                $this->Flash->error(__('A solução não foi salva e aplicada.'));
            }
            return $this->redirect(['controller'=>'calls','action' => 'view', $call_id]);
        }
        
        $callsSubcategories = $this->CallsSolutions->CallsSubcategories->find('list', ['limit' => 200]);
        $this->set(compact('callsSolution', 'callsSubcategories'));
        $this->set('_serialize', ['callsSolution']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calls Solution id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $callsSolution = $this->CallsSolutions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $callsSolution = $this->CallsSolutions->patchEntity($callsSolution, $this->request->data);
            if ($this->CallsSolutions->save($callsSolution)) {
                $this->Flash->success(__('A solução foi salva e aplicada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('A solução não foi salva e aplicada.'));
            }
        }
        $callsSubcategories = $this->CallsSolutions->CallsSubcategories->find('list', ['limit' => 200]);
        $this->set(compact('callsSolution', 'callsSubcategories'));
        $this->set('_serialize', ['callsSolution']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calls Solution id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $callsSolution = $this->CallsSolutions->get($id);
        if ($this->CallsSolutions->delete($callsSolution)) {
            $this->Flash->success(__('The calls solution has been deleted.'));
        } else {
            $this->Flash->error(__('The calls solution could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
