<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Top Controller
 *
 *
 */
class TopController extends AppController
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

        $this->set(compact('top'));
        $this->set('_serialize', ['top']);
    }

}
