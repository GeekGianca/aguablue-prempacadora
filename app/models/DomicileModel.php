<?php
require_once 'dao/DomicileImplement.php';

class DomicileModel
{
    private $daodomicile;

    public function __construct()
    {
        $this->daodomicile = new DomicileImplement();
    }

    public function addDomicile($data){
        return $this->daodomicile->insert($data);
    }

    public function insertHasLote($data){
        return $this->daodomicile->insertHasLote($data);
    }

    public function getLot(){
        return $this->daodomicile->getLot();
    }
}