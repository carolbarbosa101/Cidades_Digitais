<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleCdItensVisualizar.php");
    require_once("../Controller/ControleCdSelect.php");
    
    ?>
    
    
    <!-- Conteudo -->
    <main id="main">
      <div class="container">
        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
            <i class="fas fa-globe-asia"></i>
            </span>
            <span>
              <h3 class="mb-0">Editar Cd itens</h3>
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
          <form action="../Controller/ControleCdItensEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input type="hidden" name="cod_ibge" value="<?php echo $cod_ibge ?>" />
                  <input type="hidden" name="cod_item" value="<?php echo $cod_item ?>" />
                  <input type="hidden" name="cod_tipo_item" value="<?php echo $cod_tipo_item ?>" />
                  
                  <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="recipient-nome_municipio" class="col-form-label">Município:</label>
                    <input disabled 
                      value="<?php echo $nome_municipio ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-nome_municipio">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-cod_item" class="col-form-label">Item:</label>
                    <input disabled 
                      value="<?php echo $descricao ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-cod_item">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-quantidade_previsto" class="col-form-label">Quantidade Previsto:</label>
                    <input 
                      value="<?php echo $quantidade_previsto ?>"
                      name="quantidade_previsto"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-quantidade_previsto">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-quantidade_projeto_executivo" class="col-form-label">Quantidade Projeto Executivo:</label>
                    <input 
                      value="<?php echo $quantidade_projeto_executivo ?>"
                      name="quantidade_projeto_executivo"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-quantidade_projeto_executivo">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-quantidade_termo_instalacao" class="col-form-label">Quantidade Termo Instalação :</label>
                    <input 
                      value="<?php echo $quantidade_termo_instalacao ?>"
                      name="quantidade_termo_instalacao"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength=""
                      id="recipient-quantidade_termo_instalacao">
                  </div>

                </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/CdItens.php" class="btn btn-secondary">Cancelar</a>
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





    <!-- Modal de Cadastro -->
    <div class="modal fade cadastrar-cditens-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myCdItensModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myCdItensModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar CD Itens
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleCdItensEditar.php" method="post">

            <div class="modal-body">


                  <div class="form-group col-md-12">
                    <label for="recipient-quantidade_previsto" class="col-form-label">Quantidade Previsto :</label>
                    <input 
                      name="quantidade_previsto"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-quantidade_previsto">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-quantidade_projeto_executivo" class="col-form-label">Quantidade Projeto Executivo:</label>
                    <input 
                      name="quantidade_projeto_executivo"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-quantidade_projeto_executivo">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-quantidade_termo_instalacao" class="col-form-label">Quantidade Termo Instalação:</label>
                    <input 
                      name="quantidade_termo_instalacao"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength=""
                      id="recipient-quantidade_termo_instalacao">
                  </div>

                </div>

            </div>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">
                Cadastrar
              </button>
            </div>

          </form>

        
        </div>
      </div>
    </div>

    <?php
    // Rodape
    include_once('_rodape.php');
?>