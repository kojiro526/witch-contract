<?php
namespace App\Status\Persons;

use App\Status\Persons\StatePerson;

class StatePersonCandidate extends StatePerson {
    
    public function getValue(){
        return StatePerson::$STATUS_CANDIDATE;
    }
    
    public function getLabel(){
        return __('Candidate');
    }
}
