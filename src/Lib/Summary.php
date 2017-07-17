<?php
namespace App\Lib;

use Cake\ORM\TableRegistry;
use App\Status\Persons\StatusPerson;

class Summary
{

    private $Persons = null;
    private $Negotiations = null;

    public function __construct()
    {
        $this->Persons = TableRegistry::get('Persons');
        $this->Negotiations = TableRegistry::get('Negotiations');
    }

    public function countCandidates()
    {
        return $this->Persons->find()
            ->where([
            'Persons.status' => StatusPerson::$STATUS_CANDIDATE
        ])
            ->count();
    }

    public function countContracted()
    {
        return $this->Persons->find()
            ->where([
            'Persons.status' => StatusPerson::$STATUS_CONTRACTED
        ])
            ->count();
    }

    public function countWitches()
    {
        return $this->Persons->find()
            ->where([
            'Persons.status' => StatusPerson::$STATUS_WITCHE
        ])
            ->count();
    }

    public function findRecentNegotiations()
    {
        return $this->Negotiations->find()
            ->contain(['Persons'])
            ->order([
            'Negotiations.negotiated_at' => 'desc',
            'Negotiations.created' => 'desc'
        ])
            ->limit(5);
    }
}