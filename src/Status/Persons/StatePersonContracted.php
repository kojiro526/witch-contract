<?php
namespace App\Status\Persons;

use App\Status\Persons\StatePerson;

class StatePersonContracted extends StatePerson{
  
    public function getValue(){
        return StatePerson::$STATUS_CONTRACTED;
    }
    
    public function getLabel(){
        return __('Contracted');
    }

    public function isContracted()
    {
        return true;
    }
}
