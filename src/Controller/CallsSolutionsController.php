<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

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
