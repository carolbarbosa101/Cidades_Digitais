<?php
    include_once("_cabecalho.php");
    require_once("../Controller/ControleLoteItensVisualizar.php");

    ?>
    
    <main id="main_conteudo">

        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
            <i class="fas fa-globe-asia"></i>
            </span>
            <span>
              <h3 class="mb-0">Editar Itens - Lote</h3>
             
            </span>
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
          <form action="../Controller/ControleLoteItensEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="cod_lote" type="hidden" value="<?php echo $cod_lote ?>"/>
                  <input name="cod_item" type="hidden" value="<?php echo $cod_item ?>"/>
                  <input name="cod_tipo_item" type="hidden" value="<?php echo $cod_tipo_item ?>"/>

                  
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_lote" class="col-form-label">Cód. Lote:</label>
                    <input disabled 
                      value="<?php echo $cod_lote ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-cod_lote">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_item" class="col-form-label">Cód. Item:</label>
                    <input disabled 
                      value="<?php echo $cod_item ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-cod_item">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_tipo_item" class="col-form-label">Tipo de Item:</label>
                    <input disabled 
                      value="<?php echo $cod_tipo_item ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-cod_tipo_item">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-preco" class="col-form-label">Preço:</label>
                    <input  
                      value="<?php echo $preco ?>"
                      name="preco"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="45" 
                      id="recipient-preco">
                  </div>


                </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/LoteItens.php" class="btn btn-secondary">Cancelar</a>
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
    <div class="modal fade cadastrar-loteitens-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLoteItensModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myLoteItensModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Item Lote
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleLoteItensEditar.php" method="post">

            <div class="modal-body">

              
                
                <div class="form-group col-md-12">
                    <label for="recipient-preco" class="col-form-label">Preço:</label>
                    <input 
                      name="preco"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      ]maxlength="12"
                      id="recipient-preco">
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