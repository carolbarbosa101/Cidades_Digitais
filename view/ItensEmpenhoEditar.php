<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleItensEmpenhoVisualizar.php");
    //require_once("../Controller/ControleEmpenhoSelect.php");


    
     
     //var_dump($array_dados);
     //die();
     //$array_dados
    ?>
    
    <!-- Conteudo -->
    <main id="main_conteudo">

        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
            <i class="fas fa-globe-asia"></i>
            </span>
            <span>
              <h3 class="mb-0">Editar Itens Empenho</h3>
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
            //if(!empty($array_dados)){

            //  extract($array_dados);
          ?>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleItensEmpenhoEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="cod_empenho" type="hidden" value="<?php echo $cod_empenho ?>"/>

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_empenho" class="col-form-label">Código Empenho:</label>
                    <input 
                      value="<?php echo $cod_empenho ?>"
                      name="cod_empenho"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="13"
                      id="recipient-cod_empenho">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_item" class="col-form-label">Código Item:</label>
                    <input 
                      value="<?php echo $cod_item ?>"
                      name="cod_item"
                      placeholder=""
                      type="int" 
                      class="form-control"
                      maxlength=""
                      id="recipient-cod_item">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_tipo_item" class="col-form-label">Código Tipo Item:</label>
                    <input 
                      value="<?php echo $cod_tipo_item ?>"
                      name="cod_tipo_item"
                      placeholder=""
                      type="int" 
                      class="form-control"
                      maxlength=""
                      id="recipient-cod_tipo_item">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_previsao_empenho" class="col-form-label">Código Previsão Empenho:</label>
                    <input 
                      value="<?php echo $cod_previsao_empenho ?>"
                      name="cod_previsao_empenho"
                      placeholder=""
                      type="int" 
                      class="form-control"
                      maxlength=""
                      id="recipient-cod_previsao_empenho">
                  </div>
                    
                  <div class="form-group col-md-12">
                    <label for="recipient-valor" class="col-form-label">Valor:</label>
                    <input 
                      value="<?php echo $valor ?>"
                      name="valor"
                      placeholder=""
                      type="int" 
                      class="form-control"
                      maxlength="12"
                      id="recipient-valor">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-quantidade" class="col-form-label">Quantidade:</label>
                    <input 
                      value="<?php echo $quantidade ?>"
                      name="quantidade"
                      placeholder=""
                      type="int" 
                      class="form-control"
                      maxlength=""
                      id="recipient-quantidade">
                  </div>


                </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/ItensEmpenho.php" class="btn btn-secondary">Cancelar</a>
              <button type="submit" class="btn btn-primary">
                Salvar
              </button>
            </div>

          </form>

          <?php 
            //} // fim do if para verificar se existe dados para editar
          ?>

        </div>

    </main>





    <!-- Modal de Cadastro -->
    <div class="modal fade cadastrar-empenho-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myItensEmpenhoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myItensEmpenhoModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar ItensEmpenho
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleItensEmpenhoEditar.php" method="post">

            <div class="modal-body">
                <div class="form-group col-md-12">
                    <label for="recipient-cod_empenho" class="col-form-label">Número da Nota Fiscal:</label>
                    <input 
                      name="cod_empenho"
                      placeholder=""
                      type="int" 
                      class="form-control"
                      maxlength="14" 
                      id="recipient-cod_empenho">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_previsao_empenho" class="col-form-label">Código IBGE:</label>
                    <input 
                      name="cod_previsao_empenho"
                      placeholder=""
                      type="int" 
                      class="form-control"
                      maxlength="7" 
                      id="recipient-cod_previsao_empenho">
                  </div>
                    

                  <div class="form-group col-md-12">
                    <label for="recipient-data" class="col-form-label">Data:</label>
                    <input 
                      name="data"
                      placeholder=""
                      type="date" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-data">
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