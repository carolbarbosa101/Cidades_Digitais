<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleItensEmpenhoVisualizar.php");
    require_once("../Controller/ControleCdSelect.php");
    
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
              <h3 class="mb-0">Editar Itens Empenho</h3>
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
          <form action="../Controller/ControleItensEmpenhoEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->

                  <input type="hidden" name="cod_empenho" value="<?php echo $cod_empenho ?>" />
                  <input type="hidden" name="cod_item" value="<?php echo $cod_item ?>" />
                  <input type="hidden" name="cod_tipo_item" value="<?php echo $cod_tipo_item ?>" />
                  <input type="hidden" name="cod_previsao_empenho" value="<?php echo $cod_previsao_empenho ?>" />
                  
                  <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="recipient-cod_empenho" class="col-form-label">Cod Empenho:</label>
                    <input disabled 
                      value="<?php echo $cod_empenho ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-cod_empenho">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-descricaoItem" class="col-form-label">Item:</label>
                    <input disabled 
                      value="<?php echo $descricaoItem ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-descricaoItem">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-cod_previsao_empenho" class="col-form-label">Previsao de Empenho:</label>
                    <input disabled 
                      value="<?php echo $cod_previsao_empenho ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-cod_previsao_empenho">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-valor" class="col-form-label">Valor:</label>
                    <input 
                      value="<?php echo $valor ?>"
                      name="valor"
                      placeholder=""
                      type="float" 
                      class="form-control"
                      maxlength="12" 
                      id="recipient-valor">
                  </div>

                  <div class="form-group col-md-4">
                  <span><label for="recipient-quantidade" class="col-form-label">Quantidade:</label></span>
                    <li>Quantidade disponível: <?php printf($quant_calc) ?> </li>
                    <input 
                      value="<?php echo $quantidade ?>"
                      name="quantidade"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength=""
                      id="recipient-quantidade">
                  </div>

                  <div class="form-group col-md-4">
                  <?php 
                  if($quantidade>$quant_calc+$quantidade){
                    echo '<script>alert("ERRO: O valor da quantidade é maior que o permitido!!");</script>';

                    echo '<div class="alert alert-danger" role="alert">';
                    echo ' ERRO: A quantidade: "';echo $quantidade ,'" é maior que o permitido!!';
                    echo '</div>';
                    //$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> ERRO: A quantidade: ";echo $quantidade ," é maior que o permitido!!'</div>";
                  }?>
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
            } // fim do if para verificar se existe dados para editar
          ?>

        </div>

    </main>





    <!-- Modal de Cadastro -->
    <div class="modal fade cadastrar-cditens-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myItensEmpenhoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myItensEmpenhoModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Itens Empenho
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleItensEmpenhoEditar.php" method="post">

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