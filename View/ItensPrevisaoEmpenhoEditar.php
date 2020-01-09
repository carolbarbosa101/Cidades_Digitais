<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleItensPrevisaoEmpenhoVisualizar.php");
    require_once("../Controller/ControleCdSelect.php");
    //$variavel = $value['quant_calc'];
    ?>
  <style>
  li {
    padding: 20px;
    display: none;
  }
    
  span:hover + li {
    display: block;
  }
  </style>
    
    <!-- Conteudo -->
    <main id="main">
      <div class="container">
        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
            <i class="fas fa-globe-asia"></i>
            </span>
            <span>
              <h3 class="mb-0">Editar Itens Previsão Empenho</h3>
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
              //var_dump($array_dados);
              //die;
          ?>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleItensPrevisaoEmpenhoEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input type="hidden" name="cod_previsao_empenho" value="<?php echo $cod_previsao_empenho ?>" />
                  <input type="hidden" name="cod_item" value="<?php echo $cod_item ?>" />
                  <input type="hidden" name="cod_tipo_item" value="<?php echo $cod_tipo_item ?>" />
                  <input type="hidden" name="cod_lote" value="<?php echo $cod_lote ?>" />
                  
                  <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="recipient-cod_previsao_empenho" class="col-form-label">Previsão Empenho:</label>
                    <input disabled 
                      value="<?php echo $cod_previsao_empenho ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-cod_previsao_empenho">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-cod_item" class="col-form-label">Item:</label>
                    <input disabled 
                      value="<?php echo $itensLista ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-cod_item">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-cod_lote" class="col-form-label">Lote:</label>
                    <input disabled 
                      value="<?php echo $cod_lote ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-cod_lote">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-valor" class="col-form-label">Valor:</label>
                    <input 
                      value="<?php echo $valor ?>"
                      name="valor"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-valor">
                  </div>
                  <?php
                  //var_dump($quant_calc);
                  //die;
                  ?>
                  <div class="form-group col-md-12">
                    <span><label for="recipient-quantidade" class="col-form-label">Quantidade:</label></span>
                    <li>Quantidade disponível: <?php printf($quant_calc) ?> </li>
                    <input 
                      value="<?php echo $quantidade; ?>"
                      name="quantidade"
                      placeholder="<?php printf($quant_calc) ?>"
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-quantidade">
                  </div>

                </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/ItensPrevisaoEmpenho.php" class="btn btn-secondary">Cancelar</a>
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
    <div class="modal fade cadastrar-itens_previsao_empenho-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myItensPrevisaoEmpenhoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myItensPrevisaoEmpenhoModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Itens Previsão Empenho
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleItensPrevisaoEmpenhoEditar.php" method="post">

            <div class="modal-body">


                  <div class="form-group col-md-12">
                    <label for="recipient-valor" class="col-form-label">Valor:</label>
                    <input 
                      name="valor"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-valor">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-quantidade" class="col-form-label">Quantidade:</label>
                    <input 
                      name="quantidade"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength=""
                      id="recipient-quantidade">
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