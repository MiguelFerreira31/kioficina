<?php

class FuncionariosController extends Controller
{

    private $funcionarioModel;

    public function __construct()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Instaciar o modelo funcionarios
        $this->funcionarioModel = new Funcionario();
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
        $dados['func'] = $dadosFunc;

        // Carregar os Funcionarios
        $funcionarioModel = new Funcionario();
        $funcionario = $funcionarioModel->getListarFuncionario();
        $dados['funcionarios'] = $funcionario;



        // Buscar Especialidades 
        $especialidades = new Especialidades();
        $dados['especialidades'] = $especialidades->getTodasEspecialidades();


        $dados['conteudo'] = 'dash/funcionario/listar';

        $this->carregarViews('dash/dashboard', $dados);
    }

    // 2- Método para adicionar Alunos
    public function adicionar()
    {

        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {

            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // TBL Funcionário
            $email_funcionario       = filter_input(INPUT_POST, 'email_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $nome_funcionario        = filter_input(INPUT_POST, 'nome_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $foto_funcionario        = $_FILES['foto_funcionario'] ?? null;
            $cpf_cnpj_funcionario    = filter_input(INPUT_POST, 'cpf_cnpj_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $data_adm_funcionario    = filter_input(INPUT_POST, 'data_adm_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefone_funcionario    = filter_input(INPUT_POST, 'telefone_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $endereco_funcionario    = filter_input(INPUT_POST, 'endereco_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $bairro_funcionario      = filter_input(INPUT_POST, 'bairro_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $cargo_funcionario       = filter_input(INPUT_POST, 'cargo_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_especialidade        = filter_input(INPUT_POST, 'id_especialidade', FILTER_SANITIZE_SPECIAL_CHARS);
            $salario_funcionario     = filter_input(INPUT_POST, 'salario_funcionario', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $status_funcionario      = filter_input(INPUT_POST, 'status_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_uf                   = filter_input(INPUT_POST, 'id_uf', FILTER_SANITIZE_SPECIAL_CHARS);
            
            if ($nome_funcionario && $email_funcionario) {
                // Preparar dados
                $dadosFuncionario = array(
                    'nome_funcionario'       => $nome_funcionario,
                    'cpf_cnpj_funcionario'   => $cpf_cnpj_funcionario,
                    'email_funcionario'      => $email_funcionario,
                    'data_adm_funcionario'   => $data_adm_funcionario,
                    'telefone_funcionario'   => $telefone_funcionario,
                    'endereco_funcionario'   => $endereco_funcionario,
                    'bairro_funcionario'     => $bairro_funcionario,
                    'cargo_funcionario'      => $cargo_funcionario,
                    'id_especialidade'       => $id_especialidade,
                    'salario_funcionario'    => $salario_funcionario,
                    'status_funcionario'     => $status_funcionario,
                    'id_uf'                  => $id_uf
                );
        
                // Inserir funcionário
                $id_funcionario = $this->funcionarioModel->addFuncionario($dadosFuncionario);
        
                if ($id_funcionario) {
                    // Verificar e processar a imagem do funcionário
                    if ($foto_funcionario && $foto_funcionario['error'] == 0) {
                        $arquivo = $this->uploadFoto($foto_funcionario);
                        if ($arquivo) {
                            $this->funcionarioModel->addFotoFuncionario($id_funcionario, $arquivo, $nome_funcionario);
                        }
                    }
        
                    // Mensagem de sucesso
                    $_SESSION['mensagem'] = "Funcionário cadastrado com sucesso!";
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location: http://localhost/kioficina/public/funcionarios/listar');
                    exit;
                } else {
                    $_SESSION['mensagem'] = "Erro ao adicionar funcionário.";
                    $_SESSION['tipo-msg'] = "erro";
                }
            } else {
                $_SESSION['mensagem'] = "Preencha todos os campos obrigatórios.";
                $_SESSION['tipo-msg'] = "erro";
            }
        }
        


        // Buscar professors 
        $func = new Funcionario();
        $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);


        // Buscar Estado
        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();



        // Buscar Especialidades 
        $especialidades = new Especialidades();
        $dados['especialidades'] = $especialidades->getTodasEspecialidades();



        $dados['conteudo'] = 'dash/funcionario/adicionar';
        $dados['func'] = $dadosFunc;

        $this->carregarViews('dash/dashboard', $dados);
    }



    public function editar($id = null)
    {

        $dados = array();
        if ($id === null) {
            header('Location: http://localhost/kioficina/public/funcionario/listar');
            exit;
        }
    


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // TBL Funcionário
            $email_funcionario       = filter_input(INPUT_POST, 'email_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $nome_funcionario        = filter_input(INPUT_POST, 'nome_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $foto_funcionario        = $_FILES['foto_funcionario'] ?? null;
            $cpf_cnpj_funcionario    = filter_input(INPUT_POST, 'cpf_cnpj_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $data_adm_funcionario    = filter_input(INPUT_POST, 'data_adm_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefone_funcionario    = filter_input(INPUT_POST, 'telefone_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $endereco_funcionario    = filter_input(INPUT_POST, 'endereco_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $bairro_funcionario      = filter_input(INPUT_POST, 'bairro_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $cargo_funcionario       = filter_input(INPUT_POST, 'cargo_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_especialidade        = filter_input(INPUT_POST, 'id_especialidade', FILTER_SANITIZE_SPECIAL_CHARS);
            $salario_funcionario     = filter_input(INPUT_POST, 'salario_funcionario', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $status_funcionario      = filter_input(INPUT_POST, 'status_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_uf                   = filter_input(INPUT_POST, 'id_uf', FILTER_SANITIZE_SPECIAL_CHARS);
            
            if ($nome_funcionario && $email_funcionario) {
                // Preparar dados
                $dadosFuncionario = array(
                    'nome_funcionario'       => $nome_funcionario,
                    'cpf_cnpj_funcionario'   => $cpf_cnpj_funcionario,
                    'email_funcionario'      => $email_funcionario,
                    'data_adm_funcionario'   => $data_adm_funcionario,
                    'telefone_funcionario'   => $telefone_funcionario,
                    'endereco_funcionario'   => $endereco_funcionario,
                    'bairro_funcionario'     => $bairro_funcionario,
                    'cargo_funcionario'      => $cargo_funcionario,
                    'id_especialidade'       => $id_especialidade,
                    'salario_funcionario'    => $salario_funcionario,
                    'status_funcionario'     => $status_funcionario,
                    'id_uf'                  => $id_uf
                );
        
                // Inserir funcionário
                $id_funcionario = $this->funcionarioModel->addFuncionario($dadosFuncionario);
        
                if ($id_funcionario) {
                    // Verificar e processar a imagem do funcionário
                    if ($foto_funcionario && $foto_funcionario['error'] == 0) {
                        $arquivo = $this->uploadFoto($foto_funcionario);
                        if ($arquivo) {
                            $this->funcionarioModel->addFotoFuncionario($id_funcionario, $arquivo, $nome_funcionario);
                        }
                    }
        
                    // Mensagem de sucesso
                    $_SESSION['mensagem'] = "Funcionário cadastrado com sucesso!";
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location: http://localhost/kioficina/public/funcionarios/listar');
                    exit;
                } else {
                    $_SESSION['mensagem'] = "Erro ao adicionar funcionário.";
                    $_SESSION['tipo-msg'] = "erro";
                }
            } else {
                $_SESSION['mensagem'] = "Preencha todos os campos obrigatórios.";
                $_SESSION['tipo-msg'] = "erro";
            }
        }
        

   
        
        // Buscar professors 
        $func = new Funcionario();
        $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);
        $dados['func'] = $dadosFunc;

        
        $dados['funcionarios'] = $this->funcionarioModel->getFuncionarioById($id);
        $dados['estados'] = (new Estado())->getListarEstados();
    
        $dados['conteudo'] = 'dash/funcionario/editar';
        $this->carregarViews('dash/dashboard', $dados);
    }
    



   


    private function uploadFoto($file)
    {

        // var_dump($file);
        $dir = '../public/uploads/cliente/';

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nome_arquivo = uniqid() . '.' . $ext;


        if (move_uploaded_file($file['tmp_name'], $dir . $nome_arquivo)) {
            return 'cliente/' . $nome_arquivo;
        }
        return false;
    }


}
