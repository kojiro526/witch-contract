<?php
namespace App\Lib;

use Cake\ORM\TableRegistry;
use App\Status\Persons\StatusPerson;

class Summary {
    private $Persons = null;
    public function __construct(){
        $this->Persons = TableRegistry::get('Persons');
    }

    public function countCandidates(){
        return $this->Persons->find()->where(['Persons.status' => StatusPerson::$STATUS_CANDIDATE])->count();
    }
    
    public function countContracted(){
        return $this->Persons->find()->where(['Persons.status' => StatusPerson::$STATUS_CONTRACTED])->count();
    }
    
    public function countWitches(){
        return $this->Persons->find()->where(['Persons.status' => StatusPerson::$STATUS_WITCHE])->count();
    }
    
}