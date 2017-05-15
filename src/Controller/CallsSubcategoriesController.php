<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CallsSubcategories Controller
 *
 * @property \App\Model\Table\CallsSubcategoriesTable $CallsSubcategories
 */
class CallsSubcategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CallsCategories']
        ];
        $callsSubcategories = $this->paginate($this->CallsSubcategories);

        $this->set(compact('callsSubcategories'));
        $this->set('_serialize', ['callsSubcategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Calls Subcategory id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $callsSubcategory = $this->CallsSubcategories->get($id, [
            'contain' => ['CallsCategories']
        ]);

        $this->set('callsSubcategory', $callsSubcategory);
        $this->set('_serialize', ['callsSubcategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $callsSubcategory = $this->CallsSubcategories->newEntity();
        if ($this->request->is('post')) {
            $callsSubcategory = $this->CallsSubcategories->patchEntity($callsSubcategory, $this->request->data);
            if ($this->CallsSubcategories->save($callsSubcategory)) {
                $this->Flash->success(__('The calls subcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calls subcategory could not be saved. Please, try again.'));
            }
        }
        $callsCategories = $this->CallsSubcategories->CallsCategories->find('list', ['limit' => 200]);
        $this->set(compact('callsSubcategory', 'callsCategories'));
        $this->set('_serialize', ['callsSubcategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calls Subcategory id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $callsSubcategory = $this->CallsSubcategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $callsSubcategory = $this->CallsSubcategories->patchEntity($callsSubcategory, $this->request->data);
            if ($this->CallsSubcategories->save($callsSubcategory)) {
                $this->Flash->success(__('The calls subcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calls subcategory could not be saved. Please, try again.'));
            }
        }
        $callsCategories = $this->CallsSubcategories->CallsCategories->find('list', ['limit' => 200]);
        $this->set(compact('callsSubcategory', 'callsCategories'));
        $this->set('_serialize', ['callsSubcategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calls Subcategory id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $callsSubcategory = $this->CallsSubcategories->get($id);
        if ($this->CallsSubcategories->delete($callsSubcategory)) {
            $this->Flash->success(__('The calls subcategory has been deleted.'));
        } else {
            $this->Flash->error(__('The calls subcategory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
