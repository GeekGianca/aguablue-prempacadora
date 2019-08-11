<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->modelLot = $this->model('LotModel');
    }

    public function index()
    {
        $lots = $this->modelLot->getAll();
        $countreg = $this->modelLot->countRowDomiciles();
        $data = [
            'title' => 'Inicio',
            'lots' => $lots,
            'count' => $countreg
        ];
        $this->view('pages/index', $data);
    }

    public function insertLot(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $dataInsert = [
                'type' => trim($_POST['type']),
                'unit' => trim($_POST['unit']),
                'total' => trim($_POST['total']),
                'price' => trim($_POST['price'])
            ];
            if ($this->modelLot->insert($dataInsert)){
                redirect('/pages');
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
            $this->view('pages/insertLot', $dataInsert);
        }
    }

    public function openWallet(){
        $this->modelLot->openWallet();
        redirect('/pages');
    }
}
