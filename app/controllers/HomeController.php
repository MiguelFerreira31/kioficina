<?php

class HomeController extends Controller
{


    public function index()
    {

        $dados = array();

        $dados['mensagem'] = 'Bem-vindo a KiOficina';

        // Instaciar o modelo Servico
        $servicoModel = new Servico();

        // Obter os 3 servicos
        $servicoAleatorio = $servicoModel->getServicoAleatorio(3);
        $especialidadeAleatorio = $servicoModel->getEspecialidadeAleatorio(4);

        $dados['servicos'] = $servicoAleatorio;
        $dados['especialidades'] = $especialidadeAleatorio;


        // Carregar as marcas
        $marcaModel = new Marca();
        $marca = $marcaModel->getTodasMarcas();
        $dados['marcas'] = $marca;

        // Carregar os depoimentos
        $depoimentoModel = new Depoimento();
        $depoimento = $depoimentoModel->getTodosDepoimentos();
        $dados['depoimentos'] = $depoimento;

        // Carregar os depoimentos positivos (CONTAGEM)       
        $depoimentoPos = $depoimentoModel->getDepoimentoPositivo();
        $dados['depoimentosPositivos'] = $depoimentoPos;

        // Carregar a quantidade de clientes (CONTAGEM)  
        $clienteModel = new Cliente();     
        $contarCliente = $clienteModel->getContarCliente();

        $dados['contarClientes'] = $contarCliente;

        //var_dump($dados['contarClientes']);

        $this->carregarViews('home', $dados);
    }
}
