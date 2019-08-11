<?php
require_once 'dao/LoteImplement.php';
class LotModel{
    private $daolot;
    public function __construct()
    {
        $this->daolot = new LoteImplement();
    }

    public function insert($data){
        return $this->daolot->insert($data);
    }

    public function getAll(){
        return $this->daolot->getAll();
    }

    public function openWallet(){
        return $this->daolot->open();
    }

    public function countRowDomiciles(){
        return $this->daolot->getRows();
    }

}