<?php
class Domiciles extends Controller {
    public function __construct()
    {
        $this->modelDomicile = $this->model('DomicileModel');
    }

    public function index()
    {
        $lots = $this->modelDomicile->getLot();
        $data = [
            'title' => 'Domicilios',
            'lots' => $lots
        ];
        $this->view('pages/domiciles', $data);
    }

    public function addDomicile(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            session_start();
            if (!isset($_SESSION['domiciles'])){
                $_SESSION['domiciles'] = array();
            }
            $dataInsert = [
                'type' => trim($_POST['type']),
                'address' => trim($_POST['address']),
                'quantity' => trim($_POST['quantity']),
                'price' => trim($_POST['price'])
            ];
            array_push($_SESSION['domiciles'], $dataInsert);
            setcookie("session", $_SESSION['domiciles']);
            redirect('/domiciles');
            //var_dump($_SESSION['domiciles'][0]);
        }else{
            $dataInsert = [
                'type' => '',
                'address' => '',
                'quantity' => '',
                'price' => ''
            ];
            $this->view('pages/addDomicile', $dataInsert);
        }
    }

    public function insertDomicile(){
        session_start();
        foreach ($_SESSION['domiciles'] as $dom) {
            if ($this->modelDomicile->addDomicile($dom)){
                $this->modelDomicile->insertHasLote($dom);
            }
        }
        session_destroy();
        redirect('/domiciles');
    }
}