<?php
namespace App\Status\Persons;

abstract class StatePerson {
    public static $STATUS_CANDIDATE = 0;
    public static $STATUS_CONTRACTED = 1;
    public static $STATUS_WITCH = 2;
    
    protected $state;
    protected $label;
    
    abstract protected function getValue();
    abstract protected function getLabel();
}