<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

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

        $callsSubcategories = $this->CallsSubcategories->find('all',[
            'contain' => ['CallsCategories']]);

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
                $this->Flash->success(__('A subcategoria foi salva!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('A subcategoria não foi salva!'));
            }
        }
        $this->loadModel('Calls');
        $callsAreas = $this->Calls->CallsAreas->find('list', ['limit' => 200]);
        $callsCategories = $this->CallsSubcategories->CallsCategories->find('list', ['limit' => 200]);

        $callsCategoriesForJs = $this->CallsSubcategories->CallsCategories->find();

        $this->set(compact('callsSubcategory', 'callsCategories','callsAreas','callsCategoriesForJs'));
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
                $this->Flash->success(__('A subcategoria foi salva!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('A subcategoria não foi salva!'));
            }
        }

        $this->loadModel('Calls');
        $callsAreas = $this->Calls->CallsAreas->find('list', ['limit' => 200]);
        $callsCategories = $this->CallsSubcategories->CallsCategories->find('list', ['limit' => 200]);
        $callsCategoriesForJs = $this->CallsSubcategories->CallsCategories->find();

        $this->set(compact('callsSubcategory', 'callsCategories','callsAreas','callsCategoriesForJs'));
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
            $this->Flash->success(__('A subcategoria foi apagada!'));
        } else {
            $this->Flash->error(__('A subcategoria não foi apagada!'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        //$this->Auth->allow(['index', 'add', 'edit', 'delete', 'view']);
    }

    public function isAuthorized($user) {

        $this->loadModel('Users');
        $this->loadModel('Roles');
        $this->loadModel('RolesUsers');
        $authenticatedUserId = $this->Auth->user('id');
        $query = $this->Users->find()
                ->where([
            'id' => $authenticatedUserId
        ]);
        $statusArray = $query->all();
        $status = null;
        foreach ($statusArray as $key) {
            $status = $key['status'];
        }
        if ($status == true) {
            $query = $this->RolesUsers->find()
                    ->where([
                'user_id' => $authenticatedUserId
            ]);
            $currentUserGroups = $query->all();
            $release = null;
            foreach ($currentUserGroups as $key) {
                if ($key['role_id'] == 25 or $key['role_id'] == 26 or $key['role_id'] == 01) {
                        $release = true;
                }
            }
            if ($release == false) {
                $this->Flash->error(__('Você não tem autorização para acessar esta área do sistema. Caso necessário, favor entrar em contato com o setor TI.'));
                $this->redirect($this->Auth->redirectUrl());
            } else {
                //$this->Flash->error(__('VC É ADM'));
                if (in_array($this->action, array('dash')))
                    return true;
            }
        }
        else
        {
			$this->Flash->error(__('Usuário desativado, favor procurar o setor TI.'));
			$this->redirect($this->Auth->logout());
        }
        return parent::isAuthorized($user);
    }

}
