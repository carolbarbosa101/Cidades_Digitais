<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleReajusteVisualizar.php");
    require_once("../Controller/ControleLoteSelect.php");
    // $array_dados
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
              <h3 class="mb-0">Editar Reajuste</h3>
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
          <form action="../Controller/ControleReajusteEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="ano_ref" type="hidden" value="<?php echo $ano_ref ?>"/>
                  
                  <input name="cod_lote" type="hidden" value="<?php echo $cod_lote ?>"/>
              
                  <div class="form-group col-md-12">
                    <label for="recipient-ano_ref" class="col-form-label">Ano:</label>
                    <input disabled 
                      value="<?php echo $ano_ref ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-ano_ref">
                  </div>              

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_lote" class="col-form-label">Cód. Lote:</label>
                    <input disabled 
                      value="<?php echo $cod_lote ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-cod_lote">
                  </div> 

                  <div class="form-group col-md-12">
                    <label for="recipient-percentual" class="col-form-label"> Percentual:</label>
                    <input 
                      value="<?php echo $percentual ?>"
                      name="percentual"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-percentual">
                  </div>

                </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/Reajuste.php" class="btn btn-secondary">Cancelar</a>
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
    <div class="modal fade cadastrar-reajuste-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myReajusteModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myReajusteModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Reajuste
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleReajusteEditar.php" method="post">

            <div class="modal-body">

                  <div class="form-group col-md-12">
                    <label for="recipient-ano_ref" class="col-form-label">Ano Referência:</label>
                    <input 
                      name="ano_ref"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-ano_ref">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cod-lote" class="col-form-label">Código lote:</label>
                    <select name="cod_lote" class="form-control" id="recipient-cod_ibge">
                        <option value="">Código Lote</option>
                        <?php 
                            foreach($array_selectLote as $chave => $valor){
                            ?>
                            <option value="<?= $valor['cod_lote'] ?>"><?= $valor['cod_lote'] ?></option>
                            <?php 
                            }
                        ?>
                    </select>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-percentual" class="col-form-label">Percentual:</label>
                    <input 
                      name="percentual"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-percentual">
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