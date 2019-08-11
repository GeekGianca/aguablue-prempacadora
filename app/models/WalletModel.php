<?php
require_once 'dao/WalletImplement.php';

class WalletModel
{
    private $daowallet;

    public function __construct()
    {
        $this->daowallet = new WalletImplement();
    }

    public function insert($data){
        $this->daowallet->insert($data);
    }

    //Obtiene los registros para cartera
    public function getWallet()
    {
        return $this->daowallet->getAll();
    }

    public function getEmployees()
    {
        return $this->daowallet->getEmployee();
    }

    public function getAllPays()
    {
        return $this->daowallet->getAllPays();
    }
}