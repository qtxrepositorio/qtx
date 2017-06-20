<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

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
        $callsCategories = $this->CallsCategories->find('all', 
            [
                'contain' => ['CallsAreas']
            ]
        ));

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
            'contain' => ['CallsAreas']
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
                $this->Flash->success(__('A categoria foi salva!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('A categoria não pode ser salva.'));
            }
        }
        $callsAreas = $this->CallsCategories->CallsAreas->find('list', ['limit' => 200]);
        $this->set(compact('callsCategory', 'callsAreas'));
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
                $this->Flash->success(__('A categoria foi salva!'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('A categoria não pode ser salva.'));
            }
        }
        $callsAreas = $this->CallsCategories->CallsAreas->find('list', ['limit' => 200]);
        $this->set(compact('callsCategory', 'callsAreas'));
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
            $this->Flash->success(__('A categoria foi apagada!'));
        } else {
            $this->Flash->error(__('A categoria não pode ser apagada.'));
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
                $query = $this->Roles->find()
                        ->where([
                    'id' => $key['role_id']
                ]);
                $correspondingFunction = $query->all();
                foreach ($correspondingFunction as $key) {
                    if ($key['id'] == 25 or $key['id'] == 26 or $key['id'] == 01) {
                        $release = true;
                    }
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
        else {
            $this->redirect($this->Auth->logout());
        }
        return parent::isAuthorized($user);
    }

}
