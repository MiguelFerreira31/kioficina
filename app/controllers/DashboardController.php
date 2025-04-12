<?php

class DashboardController extends Controller
{


    public function index()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['userId']) || !isset($_SESSION['userTipo'])) {

            header('Location:' . BASE_URL);
            exit;
        }

        $func = new Funcionario();
        $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);

        $cliente = new Cliente();
        $dadosCliente = $cliente->buscarCliente($_SESSION['userEmail']);
        $dados['cliente'] = $dadosCliente;

        $dados = array();
        $dados['titulo']        = 'Dashboard - Ki Oficina';
        $dados['func'] = $dadosFunc;


        if($_SESSION['userTipo'] == 'cliente'){
            $cliente = new Cliente();
            $dadosCliente = $cliente->buscarCliente($_SESSION['userEmail']);
            $dados['cliente'] = $dadosCliente;
          
            $this->carregarViews('dash/dashboard-cliente', $dados);

        }
        $this->carregarViews('dash/dashboard', $dados);
    }
}
