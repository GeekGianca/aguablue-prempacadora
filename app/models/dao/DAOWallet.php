<?php
interface DAOWallet{
    public function selectById($id);
    public function getAll();
    public function getAllPays();
    public function insert($data);
    public function getEmployee();
}