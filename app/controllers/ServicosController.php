<?php

class ServicosController extends Controller
{

    private $servicoModel;

    public function __construct()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Instaciar o modelo Servico
        $this->servicoModel = new Servico();
    }

    // FRONT-END: Carregar a lista de serviços
    public function index()
    {

        $dados = array();
        $dados['titulo'] = 'Serviços - Ki Oficina';

        // Obter todos os servicos
        $todosServico = $this->servicoModel->getTodosServicos();

        // Passa os serviços para a página
        $dados['servicos'] = $todosServico;
        $this->carregarViews('servicos', $dados);
    }

    // FRONT-END: Carregar o detalhe do serviços
    public function detalhe($link)
    {
        //var_dump("Link: ".$link);

        $dados = array();

        $detalheServico = $this->servicoModel->getServicoPorLink($link);

        //var_dump($detalheServico);

        if ($detalheServico) {

            $dados['titulo'] = $detalheServico['nome_servico'];
            $dados['detalhe'] = $detalheServico;
            $this->carregarViews('detalhe-servicos', $dados);
        } else {
            $dados['titulo'] = 'Serviços Ki Oficina';
            $this->carregarViews('servicos', $dados);
        }
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

        $dados['listaServico'] = $this->servicoModel->getListarServicos();
        $dados['conteudo'] = 'dash/servico/listar';
        $dados['func'] = $dadosFunc;
        $this->carregarViews('dash/dashboard', $dados);
    }

    // 2- Método para adicionar serviços
    public function adicionar()
    {

        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {

            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {



            // TBL SERVICO
            $nome_servico                   = filter_input(INPUT_POST, 'nome_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao_servico              = filter_input(INPUT_POST, 'descricao_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $preco_base_servico             = filter_input(INPUT_POST, 'preco_base_servico', FILTER_SANITIZE_NUMBER_FLOAT);
            $tempo_estimado_servico         = filter_input(INPUT_POST, 'tempo_estimado_servico');
            $id_especialidade               = filter_input(INPUT_POST, 'id_especialidade', FILTER_SANITIZE_NUMBER_INT);
            $status_servico                 = filter_input(INPUT_POST, 'status_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $nova_especialidade              = filter_input(INPUT_POST, 'nova_especialidade', FILTER_SANITIZE_SPECIAL_CHARS);

            var_dump($nova_especialidade);

            // TBL ESPECIALIDADE

            // $nome_especialiade


            if ($nome_servico && $descricao_servico && $preco_base_servico !== false) {

                //1 Verificar a especialidade 
                if (empty($id_especialidade) && !empty($nova_especialidade)) {

                    // Criar e obter especialidade

                    $id_especialidade = $this->servicoModel->obterOuCriarEspecialidade($nova_especialidade);
                }

                if (empty($id_especialidade)) {

                    $dados['mensagem'] = "É necesssario escolher ou criar uma especialidade!";
                    $dados['tipo-msg'] = "erro";
                    $this->carregarViews('dash/servico/adcionar', $dados);
                    return;
                }




                // 2 Link do Servico 

                $link_servico = $this->gerarLinkServico($nome_servico);

                // 3 Preparar Dados 

                $dadosServico = array(

                    'nome_servico'              => $nome_servico,
                    'descricao_servico'         => $descricao_servico,
                    'preco_base_servico'        => $preco_base_servico,
                    'tempo_estimado_servico'    => $tempo_estimado_servico,
                    'id_especialidade'          => $id_especialidade, //Esse id_especialidade pode vim da lista ou de uma nova
                    'status_servico'            => $status_servico,
                    'link_servico'              => $link_servico
                );

                // 4 Inserir Servico 



                $id_servico = $this->servicoModel->addServico($dadosServico);


                if ($id_servico) {
                    if (isset($_FILES['foto_galeria']) && $_FILES['foto_galeria']['error'] == 0) {

                        $arquivo = $this->uploadFoto($_FILES['foto_galeria'], $link_servico);


                        if ($arquivo) {
                            //Inserir na galeria

                            $this->servicoModel->addFotoGaleria($id_servico, $arquivo, $nome_servico);
                        } else {
                            //Definir uma mensagem informando que não pode ser salva
                        }
                    }


                    // Mensagem de SUCESSO 
                    $_SESSION['mensagem'] = "Serviço adcionado com Sucesso";
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location: http://localhost/kioficina/public/servicos/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao adicionar o serviço";
                    $dados['tipo-msg'] = "erro";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios";
                $dados['tipo-msg'] = "erro";
            }
        }


        // Buscar Funcionarios 
        $func = new Funcionario();
        $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);


        // Buscar Especialidades 
        $especialidades = new Especialidades();
        $dados['especialidades'] = $especialidades->getTodasEspecialidades();



        $dados['conteudo'] = 'dash/servico/adicionar';
        $dados['func'] = $dadosFunc;

        $this->carregarViews('dash/dashboard', $dados);
    }

    // 3- Método para editar
    public function editar($id = null)
    {

        // Else houve ID na URL, Redirecionar para a pagina de erro (LISTAR)

        if ($id === null) {
            header('Location:http://localhost/kioficina/public/servicos/listar');
            exit;
        }


        // Caso seja POST, processado via FORM 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {



            // Coleta dados do input

            $nome_servico                   = filter_input(INPUT_POST, 'nome_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao_servico              = filter_input(INPUT_POST, 'descricao_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $preco_base_servico             = filter_input(INPUT_POST, 'preco_base_servico', FILTER_SANITIZE_NUMBER_FLOAT);
            $tempo_estimado_servico         = filter_input(INPUT_POST, 'tempo_estimado_servico');
            $id_especialidade               = filter_input(INPUT_POST, 'id_especialidade', FILTER_SANITIZE_NUMBER_INT);
            $status_servico                 = filter_input(INPUT_POST, 'status_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $nova_especialidade              = filter_input(INPUT_POST, 'nova_especialidade', FILTER_SANITIZE_SPECIAL_CHARS);

            var_dump($nova_especialidade);

            // TBL ESPECIALIDADE

            // $nome_especialiade


            if ($nome_servico && $descricao_servico && $preco_base_servico !== false) {

                //1 Verificar a especialidade 
                if (empty($id_especialidade) && !empty($nova_especialidade)) {

                    // Criar e obter especialidade

                    $id_especialidade = $this->servicoModel->obterOuCriarEspecialidade($nova_especialidade);
                }

                if (empty($id_especialidade)) {

                    $dados['mensagem'] = "É necesssario escolher ou criar uma especialidade!";
                    $dados['tipo-msg'] = "erro";

                    // $this->carregarViews('dash/servico/editar', $dados);
                    // return;
                    header('Location:http://localhost/kioficina/public/servicos/editar' . $id);
                    exit;
                }




                // 2 Link do Servico 

                $link_servico = $this->gerarLinkServico($nome_servico);

                // 3 Preparar Dados 

                $dadosServico = array(

                    'nome_servico'              => $nome_servico,
                    'descricao_servico'         => $descricao_servico,
                    'preco_base_servico'        => $preco_base_servico,
                    'tempo_estimado_servico'    => $tempo_estimado_servico,
                    'id_especialidade'          => $id_especialidade, //Esse id_especialidade pode vim da lista ou de uma nova
                    'status_servico'            => $status_servico,
                    'link_servico'              => $link_servico
                );

                // 4 Atualizar Serviço 



                $id_servico = $this->servicoModel->atualizarServico($id, $dadosServico);


                if ($id_servico) {

                    if (isset($_FILES['foto_galeria']) && $_FILES['foto_galeria']['error'] == 0) {

                        $arquivo = $this->uploadFoto($_FILES['foto_galeria'], $link_servico);


                        if ($arquivo) {
                            //Inserir na galeria

                            $this->servicoModel->atualizarFotoGaleria($id, $arquivo, $nome_servico);
                        } else {
                            //Definir uma mensagem informando que não pode ser salva
                        }
                    }


                    // Mensagem de SUCESSO 
                    $_SESSION['mensagem'] = "Serviço adcionado com Sucesso";
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location: http://localhost/kioficina/public/servicos/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao adicionar o serviço";
                    $dados['tipo-msg'] = "erro";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios";
                $dados['tipo-msg'] = "erro";
            }
        }


        $dados = array();

        // Buscar dados do Serviço de acordo com id
        $servico = $this->servicoModel->getServicoById($id);

        $dados['servico'] = $servico;

        // var_dump($dados['servico']);



        // Buscar Funcionarios 
        $func = new Funcionario();
        $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);
        $dados['func'] = $dadosFunc;

        // Buscar Especialidades 
        $especialidades = new Especialidades();
        $dados['especialidades'] = $especialidades->getTodasEspecialidades();




        $dados['conteudo'] = 'dash/servico/editar';
        $this->carregarViews('dash/dashboard', $dados);
    }

    // 4- Método para desativar o serviço
    public function desativar($id = null)
    {

        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {
            http_response_code(400);
            echo json_encode(['sucesso' => false, "mensagem" => "Acesso Negado."]);
            exit;
        }



        if ($id === null) {
            http_response_code(400);
            echo json_encode(['sucesso' => false, "mensagem" => "ID Invalido."]);
            exit;
        }


        $resultado = $this->servicoModel->desativarServico($id);

        header('Content-Type: application/json');

        if ($resultado) {
            $_SESSION['mensagem'] = "Serviço Desativado com Sucesso";

            $_SESSION['tipo-msg'] = "sucesso";

            echo json_encode(['sucesso' => true]);
        } else {
            $_SESSION['mensagem'] = "falha ao Desativar ";

            $_SESSION['tipo-msg'] = "erro";


            echo json_encode(['sucesso' => false, "mensagem" => 'falha ao desativar servico']);
        }
    }


    // 5 metodo upload 

    private function uploadFoto($file, $link_servico)
    {

        $dir = '../public/uploads/servico/';

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nome_arquivo = $link_servico . '.' . $ext;


        if (move_uploaded_file($file['tmp_name'], $dir . $nome_arquivo)) {
            return 'servico/' . $nome_arquivo;
        }
        return false;
    }

    // 6 Método gerar link serviço
    public function gerarLinkServico($nome_servico)
    {


        //Remover os acentos

        $semAcento = iconv('UTF-8', 'ASCII//TRANSLIT', $nome_servico);

        // Substituir qualquer caracter que não seja letra ou numero por hifen 

        $link = strtolower(trim(preg_replace('/[^a-zA-Z0-9]/', '-', $semAcento)));

        // var_dump($link);


        // Verifica se ja existe no banco 

        $contador = 1;
        $link_original = $link;
        while ($this->servicoModel->existeEsseServico($link)) {

            $link = $link_original . '-' . $contador;
            //troca-de-bateria-1
            $contador++;
        }

        return $link;
    }
}
