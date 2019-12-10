<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleEntidadeVisualizar.php");
    // $array_dados
    ?>
    
    <!-- Conteudo -->
    <main id="main_conteudo">
      <div class="container">
        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
            <i class="fas fa-globe-asia"></i>
            </span>
            <span>
              <h3 class="mb-0">Editar Entidade</h3>
            </span>
          </div>
 
        </div>
        </div>

        <div class="container">

            <?php
                // Se a variavél de sessão existir, exibir a informação ela contem
                if(isset($_SESSION['msg'])) {
                    echo $_SESSION['msg']; // Exibir conteudo da variavel
                    unset($_SESSION['msg']); // após exibir a informação do alerta, destruir a variavel, para que ao recarregar a página o alerta não permanessa na pagina.
                }
            ?>

          <?php 
            if(!empty($array_dados)){

              extract($array_dados);
          ?>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleEntidadeEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="cnpj" type="hidden" value="<?php echo $cnpj ?>"/>

                  <div class="form-group col-md-12">
                    <label for="recipient-cnpj" class="col-form-label">CNPJ:</label>
                    <input 
                      value="<?php echo $cnpj ?>"
                      name="cnpj"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="14"
                      id="recipient-cnpj">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-nome" class="col-form-label">Nome:</label>
                    <input 
                      value="<?php echo $nome ?>"
                      name="nome"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="50"
                      id="recipient-nome">
                  </div>
                    

                  <div class="form-group col-md-12">
                    <label for="recipient-endereco" class="col-form-label">Endereço:</label>
                    <input 
                      value="<?php echo $endereco ?>"
                      name="endereco"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="100"
                      id="recipient-endereco">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-numero" class="col-form-label">Número:</label>
                    <input 
                      value="<?php echo $numero ?>"
                      name="numero"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="10"
                      id="recipient-numero">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-bairro" class="col-form-label">Bairro:</label>
                    <input 
                      value="<?php echo $bairro ?>"
                      name="bairro"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="100"
                      id="recipient-bairro">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cep" class="col-form-label">Cep:</label>
                    <input 
                      value="<?php echo $cep ?>"
                      name="cep"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="8"
                      id="recipient-cep">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-nome_municipio" class="col-form-label">Nome Município:</label>
                    <input 
                      value="<?php echo $nome_municipio ?>"
                      name="nome_municipio"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="50"
                      id="recipient-nome_municipio">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-uf" class="col-form-label">UF:</label>
                    <input 
                      value="<?php echo $uf ?>"
                      name="uf"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="2"
                      id="recipient-uf">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-observacao" class="col-form-label">Observação:</label>
                    <input 
                      value="<?php echo $observacao ?>"
                      name="observacao"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="1000"
                      id="recipient-observacao">
                  </div>

                </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/Entidade.php" class="btn btn-secondary">Cancelar</a>
              <button type="submit" class="btn btn-primary">
                Salvar
              </button>
            </div>

          </form>

          <?php 
            } // fim do if para verificar se existe dados para editar
          ?>

        </div>

    </main>

    <?php
    // Rodape
    include_once('_rodape.php');
?>