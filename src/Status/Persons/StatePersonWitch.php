<?php
namespace App\Status\Persons;

use App\Status\Persons\StatePerson;

class StatePersonWitch extends StatePerson{

    public function getValue(){
        return StatePerson::$STATUS_WITCH;
    }
    
    public function getLabel(){
        return __('Witch');
    }
}
