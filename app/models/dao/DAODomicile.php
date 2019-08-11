<?php
interface DAODomicile{
    public function selectById($id);
    public function insert($data);
    public function insertHasLote($data);
    public function update($data);
    public function getLot();
    public function getAll();
}