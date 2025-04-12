<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])) {

    $mensagem = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];


    // Exibir 
    if ($tipo == 'sucesso') {

        echo '<div class="alert alert-success" role="alert">'
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

<a href="http://localhost/kioficina/public/servicos/adicionar/"><button class="btn btn-primary" style="margin:2% ; width:30%">Adicionar</button></a>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Preço</th>
            <th scope="col">Tempo</th>
            <th scope="col">Especialidade</th>
            <th scope="col">Editar</th>
            <th scope="col">Desativar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listaServico as $linha): ?>

            <tr>
                <td>
                    <?php
                    // Caminho da foto
                    $caminhoBase = "http://localhost/kioficina/public/uploads/";
                    $caminhoFoto = $_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $linha['foto_galeria'];
                    $urlFoto = $linha['foto_galeria'] != "" && file_exists($caminhoFoto)
                        ? $caminhoBase . htmlspecialchars($linha['foto_galeria'], ENT_QUOTES, 'UTF-8')
                        : $caminhoBase . "sem-foto-servico.png";
                    ?>
                    <img src="<?php echo $urlFoto; ?>" alt="Foto do Serviço" style="width: 100px; height: auto;">
                </td>
                <td><?php echo $linha['nome_servico'] ?></td>
                <td><?php echo $linha['descricao_servico'] ?></td>
                <td><?php echo number_format($linha['preco_base_servico'], 2, ',', '.') ?></td>
                <td><?php echo $linha['tempo_estimado_servico'] ?></td>
                <td><?php echo $linha['nome_especialidade'] ?></td>
                <td>
                    <a href="http://localhost/kioficina/public/servicos/editar/<?php echo $linha['id_servico'] ?>" class="btn btn-primary" title="Editar">
                        <img src="http://localhost/kioficina/public/uploads/pencil.png" alt="Editar" style="width: 20px; height: auto;">
                    </a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger" title="Desativar" onclick="abrirModalDesativar(<?php echo $linha['id_servico'];  ?>)">
                        <img src="http://localhost/kioficina/public/uploads/trash.png" alt="Desativar" style="width: 20px; height: auto;">
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>


<!-- MODAL DESATIVAR SERVICO  -->
<div class="modal" tabindex="-1" id="modalDesativar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Desativar Serviço</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Tem Certeza que deseja desativar esse Serviço?</p>
                <input type="hidden" id="idServicoDesativar" value="">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnConfirmar">Desativar</button>
            </div>
        </div>
    </div>
</div>



<script>
        function abrirModalDesativar(idServico) {


            if ($('#modalDesativar').hasClass('show')) {
                return;

            }

            document.getElementById('idServicoDesativar').value = idServico;

            $('#modalDesativar').modal('show');


        }



        document.getElementById('btnConfirmar').addEventListener('click', function() {
            const idServico = document.getElementById('idServicoDesativar').value;
            // console.log(idServico);

            if (idServico) {
                desativarServico(idServico);

            }

        });

        function desativarServico(idServico) {

            fetch(`http://localhost/kioficina/public/servicos/desativar/${idServico}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    }

                })

                .then(response => {
                    // Se o codigo de resposta NÃO for OK lança pra ele uma msg de ERRO
                    if (!response.ok) {

                        throw new Error(`Erro HTTP: ${reponse.status}`);
                    ''
                    }
                    return response.json();

                })

                .then(data => {

                    if (data.sucesso) {
                        console.log('servico desativado com sucesso');
                        $('#modalDesativer').modal('hide');
                        setTimeout(()=>{
                            location.reload();
                        }),500;

                    }else{
                        alert(data.mensagem || "Ocorreu um erro ao Desativar o serviço");
                    }

                })

                .catch(erro => {
                    console.error("erro", erro);
                    alert('erro na requisicao');

                })



        }
    </script>
