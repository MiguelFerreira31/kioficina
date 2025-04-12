<form method="POST" id="form-dep" action="http://localhost/kioficina/public/depoimentos/adicionar" enctype="multipart/form-data">
  <div class="container my-5">
    <div class="row">
      <!-- Coluna para imagem -->
     

      <!-- Coluna para os campos do formulário -->
      <div class="col-md-8">
        <div class="row">
          <!-- Nome -->
          <div class="col-md-6 mb-3">
            <label for="nome_cliente" class="form-label">Nome do cliente:</label>
            <select class="form-select" id="id_cliente" name="id_cliente" required>
              <option selected>Selecione</option>
              <?php foreach ($clientes as $linha): ?>
                <option value="<?php echo $linha['id_cliente']; ?>"><?php echo $linha['nome_cliente']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>


          <!-- descricao -->
          <div class="col-md-6 mb-3">
            <label for="descricao_depoimento" class="form-label">Descrição:</label>
            <input type="text" class="form-control" id="descricao_depoimento" name="descricao_depoimento" placeholder="Digite Aqui..." required>
          </div>

          <!-- Data de Nascimento -->
          <div class="col-md-6 mb-3">
            <label for="cpf_cnpj_cliente" class="form-label">Nota:</label>
            <select class="form-select" id="nota_depoimento" name="nota_depoimento" required>
              <option selected>Selecione</option>
              <?php for ($i = 1; $i <= 5; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php endfor; ?>
            </select>

          </div>

         
        
     
        

      
          
          </div>
        </div>

        <!-- Botões -->
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

  // Seleciona o botão e o formulário
  const btnCancelar = document.getElementById('btn-cancelar');
  const formCliente = document.getElementById('form-dep');

  // Adiciona o evento de clique para resetar o formulário
  btnCancelar.addEventListener('click', () => {
    formCliente.reset();
  });
</script>