<?php
class Wallet extends Controller {
    public function __construct()
    {
        $this->walletModel = $this->model('WalletModel');
    }

    public function index(){
        $pays = $this->walletModel->getAllPays();
        $wallets = $this->walletModel->getWallet();
        $employees = $this->walletModel->getEmployees();
        $data = [
            'title' => 'Cartera',
            'pays' => $pays,
            'wallets' => $wallets,
            'employees' => $employees
        ];
        $this->view('pages/wallet', $data);
    }

    public function getWallet(){

    }

    public function addPay(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $dataInsert = [
                'employee' => trim($_POST['employee'])
            ];
            if ($this->walletModel->insert($dataInsert)){
                redirect('/wallet');
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