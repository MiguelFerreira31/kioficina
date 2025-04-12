<form method="POST" id="form-cliente" action="http://localhost/kioficina/public/clientes/editar/<?php echo $clientes['id_cliente']; ?>" enctype="multipart/form-data">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4 text-center mb-4">

                <?php

                $fotoCliente = $clientes['foto_cliente'];
                $fotoPath = "http://localhost/kioficina/public/uploads/" . $fotoCliente;
                $fotoDefault = "http://localhost/kioficina/public/uploads/servico/sem-foto-servico.png";

                $imagePath = (file_exists($_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $fotoCliente) && !empty($fotoCliente))
                    ? $fotoPath
                    : $fotoDefault;
                ?>



                <img src="<?php echo $imagePath ?>" alt="<?php echo htmlspecialchars($clientes['nome_cliente']) ?>" class="img-fluid" id="preview-img" style="width:100%; cursor:pointer; border-radius:12px;">

                <input type="file" name="foto_cliente" id="foto_cliente" style="display: none;" accept="image/*">
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome_cliente" class="form-label">Nome do cliente:</label>
                        <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" placeholder="Digite o nome do cliente" value="<?php echo htmlspecialchars($clientes['nome_cliente']) ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email_cliente" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email_cliente" name="email_cliente" placeholder="exemplo@email.com" value="<?php echo htmlspecialchars($clientes['email_cliente']) ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nasc_cliente" class="form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="nasc_cliente" name="nasc_cliente" value="<?php echo htmlspecialchars($clientes['data_nasc_cliente']) ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="senha_cliente" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="senha_cliente" name="senha_cliente" value="<?php echo htmlspecialchars($clientes['senha_cliente']) ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="cpf_cnpj_cliente" class="form-label">CPF ou CNPJ:</label>
                        <input type="text" class="form-control" id="cpf_cnpj_cliente" name="cpf_cnpj_cliente" value="<?php echo htmlspecialchars($clientes['cpf_cnpj_cliente']) ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="status_cliente" class="form-label">Tipo Cliente:</label>
                        <select class="form-select" id="tipo_cliente" name="tipo_cliente">
                            <option value="Pessoa fisica" <?php echo ($clientes['tipo_cliente'] == 'Pessoa fisica') ? 'selected' : ''; ?>>Pessoa fisica</option>
                            <option value="Pessoa Juridica" <?php echo ($clientes['tipo_cliente'] == 'Pessoa Juridica') ? 'selected' : ''; ?>>Pessoa Juridica</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="status_cliente" class="form-label">status Cliente:</label>
                        <select class="form-select" id="status_cliente" name="status_cliente">
                            <option value="Ativo" <?php echo ($clientes['status_cliente'] == 'Ativo') ? 'selected' : ''; ?>>Ativo</option>
                            <option value="Inativo" <?php echo ($clientes['status_cliente'] == 'Inativo') ? 'selected' : ''; ?>>Inativo</option>
                        </select>
                    </div>



                    <div class="col-md-6 mb-3">
                        <label for="telefone_cliente" class="form-label">Telefone:</label>
                        <input type="tel" class="form-control" id="telefone_cliente" name="telefone_cliente" placeholder="(XX) XXXXX-XXXX" value="<?php echo htmlspecialchars($clientes['telefone_cliente']) ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="id_uf" class="form-label">Estado:</label>
                        <select class="form-select" id="id_uf" name="id_uf">
                            <option value="">Selecione</option>
                            <?php foreach ($estados as $linha): ?>
                                <option value="<?php echo $linha['id_uf']; ?>" <?php echo ($clientes['id_uf'] == $linha['id_uf']) ? 'selected' : ''; ?>>
                                    <?php echo $linha['sigla_uf']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    
                    <div class="col-md-6 mb-3">
                        <label for="endereco_cliente" class="form-label">Endereço:</label>
                        <input type="text" class="form-control" id="endereco_cliente" name="endereco_cliente" value="<?php echo htmlspecialchars($clientes['endereco_cliente']) ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="bairro_cliente" class="form-label">Bairro:</label>
                        <input type="text" class="form-control" id="bairro_cliente" name="bairro_cliente" value="<?php echo htmlspecialchars($clientes['bairro_cliente']) ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="cidade_cliente" class="form-label">Cidade:</label>
                        <input type="text" class="form-control" id="cidade_cliente" name="cidade_cliente" value="<?php echo htmlspecialchars($clientes['cidade_cliente']) ?>" required>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-secondary" id="btn-cancelar">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>




<script>
  document.addEventListener('DOMContentLoaded', function() {

    const visualizarImg = document.getElementById('preview-img');

    const arquivo = document.getElementById('foto_cliente');

    visualizarImg.addEventListener('click', function() {
      arquivo.click()

    });


    arquivo.addEventListener('change', function() {
      if (arquivo.files && arquivo.files[0]) {

        let render = new FileReader();
        render.onload = function(e) {
          visualizarImg.src = e.target.result
        }

        render.readAsDataURL(arquivo.files[0]);

      }
    });

  });
</script>