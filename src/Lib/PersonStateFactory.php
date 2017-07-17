<?php
namespace App\Lib;

use App\Status\Persons\StatePersonCandidate;
use App\Status\Persons\StatePersonContracted;
use App\Status\Persons\StatePersonWitch;
use App\Status\Persons\StatePerson;

class PersonStateFactory {
    
    public static function createInstance($state){
        switch($state){
            case StatePerson::$STATUS_CANDIDATE:
                return new StatePersonCandidate();
            case StatePerson::$STATUS_CONTRACTED:
                return new StatePersonContracted();
            case StatePerson::$STATUS_WITCH:
                return new StatePersonWitch();
            default:
                throw new \InvalidArgumentException(sprintf("Invalid status. status=%d", $state));
        }
    }

}