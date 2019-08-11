<?php
require_once 'DAOWallet.php';
class WalletImplement implements DAOWallet{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function selectById($id)
    {
        $this->db->query("SELECT `idcartera`, `fecha_cartera`, `gasto_diario`, `ganancia_diaria`, `total` FROM `cartera` WHERE `idcartera` = '$id';");
        return $this->db->registry();
    }

    public function getAll()
    {
        $this->db->query("SELECT `idcartera`, `fecha_cartera`, `gasto_diario`, `ganancia_diaria`, `total` FROM `cartera`;");
        return $this->db->records();
    }

    public function getAllPays()
    {
        $this->db->query("SELECT `idpago`, `fehca_pago`, `hora_pago`, `nombre`, `apellidos`, `cargo` FROM `empleado` INNER JOIN `pago` ON  `empleado`.idempleado =  `pago`.empleado_idempleado;");
        return $this->db->records();
    }

    public function getEmployee()
    {
        $this->db->query("SELECT `idempleado`, `nombre`, `apellidos` FROM `empleado`;");
        return $this->db->records();
    }

    public function insert($data)
    {
        $this->db->query("INSERT INTO `pago`(`fehca_pago`, `hora_pago`, `empleado_idempleado`, `cartera_idcartera`) VALUES ((SELECT CURRENT_DATE),(SELECT CURRENT_TIME),:idemployee,(SELECT `idcartera` FROM `cartera` WHERE `fecha_cartera` = (SELECT CURRENT_DATE)));");
        $this->db->bind(':idemployee', $data['employee']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}