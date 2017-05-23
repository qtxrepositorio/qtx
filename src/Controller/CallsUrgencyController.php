<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * CallsUrgency Controller
 *
 * @property \App\Model\Table\CallsUrgencyTable $CallsUrgency
 */
class CallsUrgencyController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $callsUrgency = $this->paginate($this->CallsUrgency);

        $this->set(compact('callsUrgency'));
        $this->set('_serialize', ['callsUrgency']);
    }

    /**
     * View method
     *
     * @param string|null $id Calls Urgency id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $callsUrgency = $this->CallsUrgency->get($id, [
            'contain' => []
        ]);

        $this->set('callsUrgency', $callsUrgency);
        $this->set('_serialize', ['callsUrgency']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $callsUrgency = $this->CallsUrgency->newEntity();
        if ($this->request->is('post')) {
            $callsUrgency = $this->CallsUrgency->patchEntity($callsUrgency, $this->request->data);
            if ($this->CallsUrgency->save($callsUrgency)) {
                $this->Flash->success(__('The calls urgency has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calls urgency could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('callsUrgency'));
        $this->set('_serialize', ['callsUrgency']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calls Urgency id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $callsUrgency = $this->CallsUrgency->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $callsUrgency = $this->CallsUrgency->patchEntity($callsUrgency, $this->request->data);
            if ($this->CallsUrgency->save($callsUrgency)) {
                $this->Flash->success(__('The calls urgency has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calls urgency could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('callsUrgency'));
        $this->set('_serialize', ['callsUrgency']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calls Urgency id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $callsUrgency = $this->CallsUrgency->get($id);
        if ($this->CallsUrgency->delete($callsUrgency)) {
            $this->Flash->success(__('The calls urgency has been deleted.'));
        } else {
            $this->Flash->error(__('The calls urgency could not be deleted. Please, try again.'));
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
