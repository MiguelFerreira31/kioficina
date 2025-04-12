<form method="POST"  id="form-cliente" action="http://localhost/kioficina/public/clientes/adicionar" enctype="multipart/form-data">
    <div class="container my-5">
      <div class="row">
        <!-- Coluna para imagem -->
        <div class="col-md-4 text-center mb-4">
          <img src="http://localhost/kioficina/public/uploads/sem-foto-servico.png" alt="kioficina Logo" class="img-fluid" id="preview-img" style="width: 100%; cursor: pointer; border-radius: 12px;">
          <input type="file" name="foto_cliente" id="foto_cliente" style="display: none;" accept="image/*">
        </div>

        <!-- Coluna para os campos do formulário -->
        <div class="col-md-8">
          <div class="row">
            <!-- Nome -->
            <div class="col-md-6 mb-3">
              <label for="nome_cliente" class="form-label">Nome do cliente:</label>
              <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" placeholder="Digite o nome do cliente" required>
            </div>

          
            <!-- Email -->
            <div class="col-md-6 mb-3">
              <label for="email_cliente" class="form-label">Email:</label>
              <input type="email" class="form-control" id="email_cliente" name="email_cliente" placeholder="exemplo@email.com" required>
            </div>
             <!-- Data de Nascimento -->
             <div class="col-md-6 mb-3">
              <label for="nasc_cliente" class="form-label">Data de Nascimento:</label>
              <input type="date" class="form-control" id="nasc_cliente" name="nasc_cliente" required>
            </div>

            <!-- Senha -->
            <div class="col-md-6 mb-3">
              <label for="senha_cliente" class="form-label">Senha:</label>
              <input type="password" class="form-control" id="senha_cliente" name="senha_cliente" required>
            </div>

            <!-- CPF/CNPJ -->
            <div class="col-md-6 mb-3">
              <label for="cpf_cnpj_cliente" class="form-label">CPF ou CNPJ:</label>
              <input type="text" class="form-control" id="cpf_cnpj_cliente" name="cpf_cnpj_cliente" required>
            </div>

            <!-- tipo -->
            <div class="col-md-6 mb-3">
              <label for="status_cliente" class="form-label">Status cliente:</label>
              <select class="form-select" id="status_cliente" name="status_cliente">
                <option selected>Ativo</option>
                <option>Inativo</option>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="tipo_cliente" class="form-label">tipo cliente:</label>
              <select class="form-select" id="tipo_cliente" name="tipo_cliente">
                <option selected value="Pessoa fisica">Pessoa fisica</option>
                <option value="Pessoa Juridica">Pessoa Juridica</option>
              </select>
            </div>


            <!-- Telefone -->
            <div class="col-md-6 mb-3">
              <label for="telefone_cliente" class="form-label">Telefone:</label>
              <input type="tel" class="form-control" id="telefone_cliente" name="telefone_cliente" placeholder="(XX) XXXXX-XXXX">
            </div>


            
            <!-- Endereço -->
            <div class="col-md-6 mb-3">
              <label for="endereco_cliente" class="form-label">Endereço:</label>
              <input type="text" class="form-control" id="endereco_cliente" name="endereco_cliente" required>
            </div>

            <!-- Bairro -->
            <div class="col-md-6 mb-3">
              <label for="bairro_cliente" class="form-label">Bairro:</label>
              <input type="text" class="form-control" id="bairro_cliente" name="bairro_cliente" required>
            </div>

            <!-- Cidade -->
            <div class="col-md-6 mb-3">
              <label for="cidade_cliente" class="form-label">Cidade:</label>
              <input type="text" class="form-control" id="cidade_cliente" name="cidade_cliente" required>
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
  const formCliente = document.getElementById('form-cliente');

  // Adiciona o evento de clique para resetar o formulário
  btnCancelar.addEventListener('click', () => {
    formCliente.reset();
  });

</script>