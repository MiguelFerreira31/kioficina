<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])) {

    $mensagem = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];


    // Exibir 
    if ($tipo == 'sucesso') {

        echo '<div class="alert alert-sucess" role="alert">'
            . $mensagem .
            '</div>';
    } elseif ($tipo == 'erro') {
        echo '<div class="alert alert-danger" role="alert">'
            . $mensagem .
            '</div>';
    }

// Limpe as variaveis de sessão 

unset($_SESSION['mensagem']);
unset($_SESSION['tipo-msg']);


}


?>



<div class="table-responsive" style="text-align:center;">
    <h2 class="title-listar text-black">Depoimentos Cadastrados:</h2>
    <table class="table table-hover tbl-listar">
        <thead>
            <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Nota</th>
                <th scope="col">Data</th>
                <th scope="col">estado</th>
                <th scope="col">Cidade</th>
                <th scope="col">Editar</th>
                <th scope="col">Desativar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($depoimentos as $linha): ?>
                <tr>
                    <td class="img-cliente"><img src="<?php
                                            $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $linha['foto_cliente'];

                                            if ($linha['foto_cliente'] != "") {
                                                if (file_exists($caminhoArquivo)) {
                                                    echo ("http://localhost/kioficina/public/uploads/" . htmlspecialchars($linha['foto_cliente'], ENT_QUOTES, 'UTF-8'));
                                                } else {
                                                    echo ("http://localhost/kioficina/public/uploads/cliente/sem-foto-cliente.png");
                                                }
                                            } else {
                                                echo ("http://localhost/kioficina/public/uploads/cliente/sem-foto-cliente.png");
                                            }
                                            ?>" alt="" ></td>
                    <td><?php echo $linha['nome_cliente'] ?></td>
                    <td><?php echo $linha['descricao_depoimento'] ?></td>
                    <td><?php echo $linha['nota_depoimento'] ?></td>
                    <td><?php echo date('d/m/Y H:i:s', strtotime($linha['datahora_depoimento'])); ?></td>
                    <td><?php echo $linha['sigla_uf'] ?></td>
                    <td><?php echo $linha['cidade_cliente'] ?></td>
                   
                    <td>
                        <a href="http://localhost/escola/public/depoimentos/editar/<?php echo $linha['id_depoimento'] ?>" title="Editar">
                            <img src="http://localhost/escola/public/uploads/pencil.png" alt="Editar" style="width: 20px; height: auto;">
                        </a>
                    </td>
                    <td>
                        <a href="http://localhost/escola/public/depoimentos/desativar/<?php echo $linha['id_depoimento'] ?>" title="Desativar" onclick="return confirm('Tem certeza que deseja desativar este serviço?');">
                            <img src="http://localhost/escola/public/uploads/trash.png" alt="Desativar" style="width: 20px; height: auto;">
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div id="btn-dash">

<h2 class="text-black">Não Encontrou o Curso? Cadastre Abaixo</h2>
<a href="http://localhost/kioficina/public/depoimentos/adicionar"><button>Adicionar</button></a>


</div>
