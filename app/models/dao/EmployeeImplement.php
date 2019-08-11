<?php
require_once 'DAOEmployee.php';
class EmployeeImplement implements DAOEmployee{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectById($id)
    {
    }

    public function insert($data)
    {
        $this->db->query("INSERT INTO `empleado`(`idempleado`, `nombre`, `apellidos`, `direccion`, `telefono`, `cargo`) VALUES (:idemployee,:name,:lastnames,:address,:phone,:position);");
        $this->db->bind(':idemployee', $data['idemployee']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':lastnames', $data['lastnames']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':position', $data['position']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($data)
    {
    }

    public function getAll()
    {
        $this->db->query("SELECT `idempleado`, `nombre`, `apellidos`, `direccion`, `telefono`, `cargo` FROM `empleado`;");
        return $this->db->records();
    }
}