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
    <h2 class="title-listar text-black">Funcionários Cadastrados:</h2>
    <table class="table table-hover tbl-listar">
        <thead>
            <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Endereço</th>
                <th scope="col">Bairro</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Cargo</th>
                <th scope="col">Salário</th>
                <th scope="col">Status</th>
                <th scope="col">Editar</th>
                <th scope="col">Desativar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funcionarios as $linha): ?>
                <tr>
                    <td class="img-cliente"><img src="<?php
                        $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $linha['foto_funcionario'];
                        if (!empty($linha['foto_funcionario']) && file_exists($caminhoArquivo)) {
                            echo ("http://localhost/kioficina/public/uploads/" . htmlspecialchars($linha['foto_funcionario'], ENT_QUOTES, 'UTF-8'));
                        } else {
                            echo ("http://localhost/kioficina/public/uploads/sem-foto-servico.png");
                        }
                    ?>" alt="<?php echo htmlspecialchars($linha['alt_foto_funcionario'], ENT_QUOTES, 'UTF-8'); ?>" style="width: 50px; height: auto;"></td>
                    <td><?php echo htmlspecialchars($linha['nome_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($linha['email_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($linha['telefone_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($linha['endereco_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($linha['bairro_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($linha['cidade_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($linha['sigla_uf'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($linha['cargo_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo number_format($linha['salario_funcionario'], 2, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($linha['status_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a href="http://localhost/kioficina/public/funcionarios/editar/<?php echo $linha['id_funcionario'] ?>" title="Editar">
                            <img src="http://localhost/kioficina/public/uploads/pencil.png" alt="Editar" style="width: 20px; height: auto;">
                        </a>
                    </td>
                    <td>
                        <a href="http://localhost/kioficina/public/funcionarios/desativar/<?php echo $linha['id_funcionario'] ?>" title="Desativar" onclick="return confirm('Tem certeza que deseja desativar este funcionário?');">
                            <img src="http://localhost/kioficina/public/uploads/trash.png" alt="Desativar" style="width: 20px; height: auto;">
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<div id="btn-dash">

<h2 class="text-black">Não Encontrou o Funcionario? Cadastre Abaixo</h2>
<a href="http://localhost/kioficina/public/funcionarios/adicionar" ><button class="btn btn-primary">Adicionar</button></a>


</div>
