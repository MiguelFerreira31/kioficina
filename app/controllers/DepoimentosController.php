<?php

class DepoimentosController extends Controller
{

    private $depoimentoModel;

    public function __construct()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Instaciar o modelo depoimento
        $this->depoimentoModel = new Depoimento();
    }


    // ###############################################
    // BACK-END - DASHBOARD
    #################################################//

    // 1- Método para listar todos os serviços
    public function listar()
    {

        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {

            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();
        $func = new Funcionario();
        $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);


        // Carregar os depoimentos
        $depoimentoModel = new Depoimento();
        $depoimento = $depoimentoModel->getTodosDepoimentos();
        $dados['depoimentos'] = $depoimento;




        $dados['conteudo'] = 'dash/depoimento/listar';
        $dados['func'] = $dadosFunc;
        $this->carregarViews('dash/dashboard', $dados);
    }

    // // 2- Método para adicionar Alunos
    public function adicionar()
    {

        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {

            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {



            // TBL Aluno
            $id_cliente                  = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao_depoimento                   = filter_input(INPUT_POST, 'descricao_depoimento', FILTER_SANITIZE_SPECIAL_CHARS);
            $nota_depoimento                   = filter_input(INPUT_POST, 'nota_depoimento', FILTER_SANITIZE_SPECIAL_CHARS);
            $datahora_depoimento = date('Y-m-d H:i:s', time()); // Retorna o timestamp atual

            // Caso você queira a data no formato 'Y-m-d H:i:s', você pode fazer:



            if ($id_cliente && $descricao_depoimento && $nota_depoimento !== false) {


                // 3 Preparar Dados 

                $dadosDepoimento = array(

                    'id_cliente'                         => $id_cliente,
                    'datahora_depoimento'                => $datahora_depoimento,
                    'nota_depoimento'                    => $nota_depoimento,
                    'descricao_depoimento'               => $descricao_depoimento,


                );

                // 4 Inserir cliente

                $id_cliente = $this->depoimentoModel->addDepoimento($dadosDepoimento);


                // Mensagem de SUCESSO 
                $_SESSION['mensagem'] = "Depoimento adcionado com Sucesso";
                $_SESSION['tipo-msg'] = "sucesso";
                header('Location: http://localhost/kioficina/public/depoimentos/listar');
                exit;
            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios";
                $dados['tipo-msg'] = "erro";
            }
        }


        // Buscar professors 
        $func = new Funcionario();
        $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);


        // Buscar Estado
        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();


        // Carregar os clientes
        $depoimentoModel = new Cliente();
        $cliente = $depoimentoModel->getListarCliente();
        $dados['clientes'] = $cliente;




        $dados['conteudo'] = 'dash/depoimento/adicionar';
        $dados['func'] = $dadosFunc;

        $this->carregarViews('dash/dashboard', $dados);
    }


    
}
