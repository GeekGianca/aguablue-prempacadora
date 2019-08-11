<?php
class Employees extends Controller {
    public function __construct()
    {
        $this->modelEmployee = $this->model('EmployeeModel');
    }

    public function index()
    {
        $employees = $this->modelEmployee->getAll();
        $data = [
            'title' => 'Empleados',
            'employees' => $employees
        ];
        $this->view('pages/employees', $data);
    }

    public function insertEmployee(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $dataInsert = [
                'idemployee' => trim($_POST['idemployee']),
                'name' => trim($_POST['name']),
                'lastnames' => trim($_POST['lastnames']),
                'address' => trim($_POST['address']),
                'phone' => trim($_POST['phone']),
                'position' => trim($_POST['position'])
            ];
            if ($this->modelEmployee->insert($dataInsert)){
                redirect('/employees');
            }else{
                die('Ups! Algo salio mal en la solicitud');
            }
        }else{
            $dataInsert = [
                'typelote' => '',
                'unit_quantity' => '',
                'total_quantity' => '',
                'unit_price' => ''
            ];
            $this->view('pages/insertEmployee', $dataInsert);
        }
    }
}