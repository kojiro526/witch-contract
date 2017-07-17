<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Negotiations Controller
 *
 * @property \App\Model\Table\NegotiationsTable $Negotiations
 *
 * @method \App\Model\Entity\Negotiation[] paginate($object = null, array $settings = [])
 */
class NegotiationsController extends AppController
{
    function initialize(){
        parent::initialize();
        $this->viewBuilder()->setLayout('../Layout/TwitterBootstrap/dashboard');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Persons']
        ];
        $negotiations = $this->paginate($this->Negotiations);

        $this->set(compact('negotiations'));
        $this->set('_serialize', ['negotiations']);
    }

    /**
     * View method
     *
     * @param string|null $id Negotiation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $negotiation = $this->Negotiations->get($id, [
            'contain' => ['Persons']
        ]);

        $this->set('negotiation', $negotiation);
        $this->set('_serialize', ['negotiation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $negotiation = $this->Negotiations->newEntity();
        if ($this->request->is('post')) {
            $negotiation = $this->Negotiations->patchEntity($negotiation, $this->request->getData());
            if ($this->Negotiations->save($negotiation)) {
                $this->Flash->success(__('The negotiation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The negotiation could not be saved. Please, try again.'));
        }
        $persons = $this->Negotiations->Persons->find('list', ['limit' => 200]);
        $this->set(compact('negotiation', 'persons'));
        $this->set('_serialize', ['negotiation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Negotiation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $negotiation = $this->Negotiations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $negotiation = $this->Negotiations->patchEntity($negotiation, $this->request->getData());
            if ($this->Negotiations->save($negotiation)) {
                $this->Flash->success(__('The negotiation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The negotiation could not be saved. Please, try again.'));
        }
        $persons = $this->Negotiations->Persons->find('list', ['limit' => 200]);
        $this->set(compact('negotiation', 'persons'));
        $this->set('_serialize', ['negotiation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Negotiation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $negotiation = $this->Negotiations->get($id);
        if ($this->Negotiations->delete($negotiation)) {
            $this->Flash->success(__('The negotiation has been deleted.'));
        } else {
            $this->Flash->error(__('The negotiation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
