<form method="POST" id="form-funcionario" action="http://localhost/kioficina/public/funcionarios/editar<?php echo $funcionarios['id_funcionario']; ?>" enctype="multipart/form-data" class="container my-5 p-4 bg-light shadow rounded">
    <div class="row">
        <!-- Coluna para imagem -->
        <div class="col-md-4 text-center mb-4">
          
        <?php

$fotoFuncionario = $funcionarios['foto_funcionario'];
$fotoPath = "http://localhost/kioficina/public/uploads/" . $fotoFuncionario;
$fotoDefault = "http://localhost/kioficina/public/uploads/servico/sem-foto-servico.png";

$imagePath = (file_exists($_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $fotoFuncionario) && !empty($fotoFuncionario))
    ? $fotoPath
    : $fotoDefault;
?>



<img src="<?php echo $imagePath ?>" alt="<?php echo htmlspecialchars($funcionarios['nome_funcionario']) ?>" class="img-fluid" id="preview-img" style="width:100%; cursor:pointer; border-radius:12px;">

<input type="file" name="foto_funcionario" id="foto_funcionario" style="display: none;" accept="image/*">
        </div>

        <!-- Coluna para os campos do formulário -->
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nome_funcionario" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome_funcionario" name="nome_funcionario" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email_funcionario" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email_funcionario" name="email_funcionario" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cpf_cnpj_funcionario" class="form-label">CPF/CNPJ:</label>
                    <input type="text" class="form-control" id="cpf_cnpj_funcionario" name="cpf_cnpj_funcionario" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="data_adm_funcionario" class="form-label">Data de Admissão:</label>
                    <input type="date" class="form-control" id="data_adm_funcionario" name="data_adm_funcionario" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="telefone_funcionario" class="form-label">Telefone:</label>
                    <input type="tel" class="form-control" id="telefone_funcionario" name="telefone_funcionario">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="endereco_funcionario" class="form-label">Endereço:</label>
                    <input type="text" class="form-control" id="endereco_funcionario" name="endereco_funcionario">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="bairro_funcionario" class="form-label">Bairro:</label>
                    <input type="text" class="form-control" id="bairro_funcionario" name="bairro_funcionario">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cargo_funcionario" class="form-label">Cargo:</label>
                    <input type="text" class="form-control" id="cargo_funcionario" name="cargo_funcionario">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="especialidade" class="form-label">Especialidade Existente:</label>
                    <select class="form-select" id="id_especialidade" name="id_especialidade">
                        <option selected>Selecione</option>
                        <?php foreach ($especialidades as $linha): ?>
                            <option value="<?php echo $linha['id_especialidade']; ?>"><?php echo $linha['nome_especialidade']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="salario_funcionario" class="form-label">Salário:</label>
                    <input type="number" step="0.01" class="form-control" id="salario_funcionario" name="salario_funcionario">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status_funcionario" class="form-label">Status:</label>
                    <select class="form-select" id="status_funcionario" name="status_funcionario">
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="id_uf" class="form-label">Sigla:</label>
                    <select class="form-select" id="id_uf" name="id_uf">
                        <option selected>Selecione</option>
                        <?php foreach ($estados as $linha): ?>
                            <option value="<?php echo $linha['id_uf']; ?>"><?php echo $linha['sigla_uf']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


            </div>
            <div class="mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="button" class="btn btn-secondary" id="btn-cancelar">Cancelar</button>
            </div>
        </div>
    </div>
</form>

<script>
    document.getElementById('preview-img').addEventListener('click', function() {
        document.getElementById('foto_funcionario').click();
    });
    document.getElementById('foto_funcionario').addEventListener('change', function(event) {
        if (event.target.files.length > 0) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-img').src = e.target.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    });
    document.getElementById('btn-cancelar').addEventListener('click', function() {
        document.getElementById('form-funcionario').reset();
    });
</script>
