<?php
require_once 'dao/EmployeeImplement.php';
class EmployeeModel
{
    private $daoemployee;
    public function __construct()
    {
        $this->daoemployee = new EmployeeImplement();
    }

    public function insert($data){
        return $this->daoemployee->insert($data);
    }

    public function getAll(){
        return $this->daoemployee->getAll();
    }
}