<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleFaturaVisualizar.php");
    require_once("../Controller/ControleCdSelect.php");
    // $array_dados
    ?>
    
    <!-- Conteudo -->
    <main id="main_conteudo">

        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
            <i class="fas fa-globe-asia"></i>
            </span>
            <span>
              <h3 class="mb-0">Editar Fatura</h3>
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
          <form action="../Controller/ControleFaturaEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="num_nf" type="hidden" value="<?php echo $num_nf ?>"/>
                  <input name="cod_ibge" type="hidden" value="<?php echo $cod_ibge ?>"/>

                  <div class="form-group col-md-12">
                    <label for="recipient-num_nf" class="col-form-label">Número da Nota Fiscal:</label>
                    <input disable
                      value="<?php echo $num_nf ?>"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="14"
                      id="recipient-num_nf">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_ibge" class="col-form-label">Código IBGE:</label>
                    <input disable
                      value="<?php echo $cod_ibge ?>"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="7"
                      id="recipient-cod_ibge">
                  </div>
                    

                  <div class="form-group col-md-12">
                    <label for="recipient-dt_nf" class="col-form-label">Data da Nota Fiscal:</label>
                    <input 
                      value="<?php echo $dt_nf ?>"
                      name="dt_nf"
                      placeholder=""
                      type="date" 
                      class="form-control"
                      maxlength="100"
                      id="recipient-dt_nf">
                  </div>


                </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/Fatura.php" class="btn btn-secondary">Cancelar</a>
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
    <div class="modal fade cadastrar-fatura-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myFaturaModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myFaturaModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Fatura
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleFaturaEditar.php" method="post">

            <div class="modal-body">
                
                    

                  <div class="form-group col-md-12">
                    <label for="recipient-dt_nf" class="col-form-label">Data da Nota Fiscal:</label>
                    <input 
                      name="dt_nf"
                      placeholder=""
                      type="date" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-dt_nf">
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