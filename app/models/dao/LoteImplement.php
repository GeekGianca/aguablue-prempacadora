<?php
require_once 'DAOLote.php';
class LoteImplement implements DAOLote{
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
        $this->db->query("INSERT INTO `lote`(`fecha_salida`, `tipo_lote`, `cantidad_unidad`, `cantidad_total`, `precio_unitario`, `hora_salida`) VALUES ((SELECT CURRENT_DATE),:type,:unit,:total,:price,(SELECT CURRENT_TIME))");
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':unit', $data['unit']);
        $this->db->bind(':total', $data['total']);
        $this->db->bind(':price', $data['price']);
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
        $this->db->query("SELECT `fecha_salida`, `tipo_lote`, `cantidad_total`, `precio_unitario` FROM `lote`;");
        return $this->db->records();
    }

    public function open()
    {
        $this->db->query("INSERT INTO `cartera`(`fecha_cartera`, `gasto_diario`, `ganancia_diaria`, `total`) VALUES ((SELECT CURRENT_DATE),0,0,0);");
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getRows()
    {
        $this->db->query("SELECT COUNT(*) FROM `lote_has_domicilio`;");
        return $this->db->registry();
    }
}