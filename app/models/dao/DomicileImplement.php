<?php
require_once 'DAODomicile.php';
class DomicileImplement implements DAODomicile{
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
        $this->db->query("INSERT INTO `domicilio`(`hora_domicilio`, `fecha_domicilio`, `direccion`) VALUES ((SELECT CURRENT_TIME),(SELECT CURRENT_DATE),:address);");
        $this->db->bind(':address', $data['address']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($data)
    {

    }

    public function getLot()
    {
        $this->db->query("SELECT `idlote`, `tipo_lote`, `cantidad_unidad`, `cantidad_total`, `precio_unitario` FROM `lote`;");
        return $this->db->records();
    }

    public function getAll()
    {
    }

    public function insertHasLote($data)
    {
        $this->db->query("INSERT INTO `lote_has_domicilio`(`costo_venta`, `cartera_idcartera`, `cantidad_producto`, `lote_idlote`, `domicilio_iddomicilio`) VALUES (:price,(SELECT `idcartera` FROM `cartera` WHERE `fecha_cartera` = (SELECT CURRENT_DATE)),:quantity,:lot,(SELECT `iddomicilio` FROM `domicilio` WHERE `direccion` = :address ORDER BY iddomicilio DESC LIMIT 1));");
        $this->db->bind(':lot', $data['type']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':quantity', $data['quantity']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}