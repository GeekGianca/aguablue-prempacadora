<?php
interface DAOLote{
    public function selectById($id);
    public function insert($data);
    public function update($data);
    public function getAll();
    public function open();
    public function getRows();
}