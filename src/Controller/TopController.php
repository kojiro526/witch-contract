<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Lib\Summary;

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
        $summary = new Summary();

        $this->set(compact('summary'));
        $this->set('_serialize', ['top']);
    }

}
