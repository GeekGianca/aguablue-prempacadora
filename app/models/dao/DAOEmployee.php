<?php
interface DAOEmployee{
    public function selectById($id);
    public function insert($data);
    public function update($data);
    public function getAll();
}