<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\BadRequestException;
use App\Status\Persons\StatePerson;
use Cake\Chronos\Date;
use Cake\I18n\Time;

/**
 * Persons Controller
 *
 * @property \App\Model\Table\PersonsTable $Persons
 *
 * @method \App\Model\Entity\Person[] paginate($object = null, array $settings = [])
 */
class PersonsController extends AppController
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
        $persons = $this->paginate($this->Persons);

        $this->set(compact('persons'));
        $this->set('_serialize', ['persons']);
    }

    /**
     * View method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $person = $this->Persons->get($id);
        
        $this->set('person', $person);
        $this->set('_serialize', ['person']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $person = $this->Persons->newEntity();
        if ($this->request->is('post')) {
            $person = $this->Persons->patchEntity($person, $this->request->getData());
            if ($this->Persons->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $this->set(compact('person'));
        $this->set('_serialize', ['person']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $person = $this->Persons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $person = $this->Persons->patchEntity($person, $this->request->getData());
            if ($this->Persons->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $this->set(compact('person'));
        $this->set('_serialize', ['person']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $person = $this->Persons->get($id);
        if ($this->Persons->delete($person)) {
            $this->Flash->success(__('The person has been deleted.'));
        } else {
            $this->Flash->error(__('The person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function contract($id = null)
    {
        $person = $this->Persons->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if(!$person->getStatus()->isCandidate()){
                throw new  BadRequestException(__("Unexpected status. status={0} id={1}", $person->status, $person->id));
            }
            
            $person->status = StatePerson::$STATUS_CONTRACTED;
            $person->contracted_at = (new Time())->now();
            if($this->Persons->save($person)){
                $this->Flash->success(__('Contract was concluded.'));
            }else{
                $this->Flash->error(__('Failed to conclude the contract.'));
            }
        }
        $this->set(compact('person'));
        $this->set('_serialize', ['person']);
        $this->render('view');
    }
}
