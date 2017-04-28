<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * CallsCategories Controller
 *
 * @property \App\Model\Table\CallsCategoriesTable $CallsCategories
 */
class CallsCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $connection = ConnectionManager::get('default');
        $callsCategories = $connection->execute("
                SELECT *  FROM CALLS_CATEGORIES");
        //$callsCategories = $callsCategories->queryAll();

       
        $this->set(compact('callsCategories'));
        $this->set('_serialize', ['callsCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Calls Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $callsCategory = $this->CallsCategories->get($id, [
            'contain' => []
        ]);

        $this->set('callsCategory', $callsCategory);
        $this->set('_serialize', ['callsCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $callsCategory = $this->CallsCategories->newEntity();
        if ($this->request->is('post')) {
            $callsCategory = $this->CallsCategories->patchEntity($callsCategory, $this->request->data);
            if ($this->CallsCategories->save($callsCategory)) {
                $this->Flash->success(__('A cateforia foi adicionada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('A categoria não pode ser salva, tente novamente.'));
            }
        }
        $this->set(compact('callsCategory'));
        $this->set('_serialize', ['callsCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calls Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $callsCategory = $this->CallsCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $callsCategory = $this->CallsCategories->patchEntity($callsCategory, $this->request->data);
            if ($this->CallsCategories->save($callsCategory)) {
                $this->Flash->success(__('A categoria foi atualizada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('A categoria não pode ser atualizada, tente novamente!'));
            }
        }
        $this->set(compact('callsCategory'));
        $this->set('_serialize', ['callsCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calls Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $callsCategory = $this->CallsCategories->get($id);
        if ($this->CallsCategories->delete($callsCategory)) {
            $this->Flash->success(__('A categoria foi apagada com sucesso!'));
        } else {
            $this->Flash->error(__('A categoria não pode ser apagada!'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
