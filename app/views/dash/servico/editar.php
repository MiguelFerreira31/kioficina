<form method="POST" action="http://localhost/kioficina/public/servicos/editar/<?php echo $servico['id_servico']; ?>" enctype="multipart/form-data">

    <div class="container my-5">

        <div class="row">
            <div class="col-md-4">


                <?php

                $fotoGaleria = $servico['foto_galeria'];
                $fotoPath = "http://localhost/kioficina/public/uploads/" . $fotoGaleria;
                $fotoDefault = "http://localhost/kioficina/public/uploads/servico/sem-foto-servico.png";

                $imagePath = (file_exists($_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $fotoGaleria) && !empty($fotoGaleria))
                    ? $fotoPath
                    : $fotoDefault;
                ?>



                <img src="<?php echo $imagePath ?>" alt="<?php echo htmlspecialchars($servico['nome_servico']) ?>" class="img-fluid" id="preview-img" style="width:100%; cursor:pointer; border-radius:12px;">
                
                <input type="file" name="foto_galeria" id="foto_galeria" style="display: none;" accept="image/*">
            </div>


            <div class="col-md-8">

                <div class="mb-3">
                    <label for="nome_servico" class="form-label">Nome do Serviço:</label>
                    <input type="text" class="form-control" id="nome_servico" name="nome_servico" placeholder="Digite o nome do serviço"
                        value="<?php echo htmlspecialchars($servico['nome_servico']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="descricao_servico" class="form-label">Descrição do Serviço:</label>
                    <textarea class="form-control" id="descricao_servico" name="descricao_servico" rows="3" placeholder="Digite a descrição do serviço" required><?php echo htmlspecialchars($servico['descricao_servico']) ?></textarea>
                </div>

                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="preco_base_servico" class="form-label">Preço Base:</label>
                        <input type="text" class="form-control" id="preco_base_servico" name="preco_base_servico" placeholder="R$" value="<?php echo ($servico['preco_base_servico']) ?>" required>
                    </div>

                    <div class="col-md-3">
                        <label for="tempo_estimado_servico" class="form-label">Tempo Estimado:</label>
                        <input type="time" class="form-control" id="tempo_estimado_servico" name="tempo_estimado_servico" value="<?php echo htmlspecialchars($servico['tempo_estimado_servico']) ?>">
                    </div>

                    <div class="col-md-3">
                        <label for="status_servico" class="form-label">Status:</label>
                        <select class="form-select" id="status_servico" name="status_servico">
                            <option value="Ativo" <?php echo ($servico['status_servico'] == 'Ativo') ? 'selected' : ''; ?>>Ativo</option>
                            <option value="Inativo" <?php echo ($servico['status_servico'] == 'Inativo') ? 'selected' : ''; ?>>Inativo</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="especialidade" class="form-label">Especialidade:</label>
                        <select class="form-select" id="id_especialidade" name="id_especialidade">
                            <option selected> Selecione </option>
                            <?php foreach ($especialidades as $linha): ?>
                                <option value="<?php echo $linha['id_especialidade']; ?>" <?php echo ($servico['id_especialidade'] == $linha['id_especialidade']) ? 'selected' : ''; ?>>
                                    <?php echo $linha['nome_especialidade']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="mt-3">
                    <label for="novaEspecialidade" class="form-label">
                        Se não existir a especialidade desejada, informe no campo abaixo:
                    </label>
                    <input type="text" class="form-control" id="novaEspecialidade" name="nova_especialidade" placeholder="Digite a nova especialidade">
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                    <button type="button" class="btn btn-secondary">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>



<script>
  document.addEventListener('DOMContentLoaded', function() {

    const visualizarImg = document.getElementById('preview-img');

    const arquivo = document.getElementById('foto_galeria');

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