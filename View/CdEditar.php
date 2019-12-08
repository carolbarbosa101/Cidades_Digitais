
<?php
    include_once("_cabecalho.php");
    require_once("../Controller/ControleCdVisualizar.php");
    require_once("../Controller/ControleMunicipioSelect.php");
    require_once("../Controller/ControleLoteSelect.php");
    
    ?>
    
    <main id="main_conteudo">

        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
            <i class="fas fa-globe-asia"></i>
            </span>
            <span>
              <h3 class="mb-0">Editar Cd</h3>
             
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
          <form action="../Controller/ControleCdEditar.php" method="post">

            <div class="form-row">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="cod_ibge" type="hidden" value="<?php echo $cod_ibge ?>"/>

                  <div class="form-group col-md-4">
                    <label for="recipient-cod_ibge" class="col-form-label">Municipio:</label>
                    <input disabled 
                      value="<?php echo $cod_ibge ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-cod_ibge">
                  </div>
                  
                  <div class="form-group col-md-4">
                    <label for="recipient-cod_lote" class="col-form-label">Cód. Lote:</label>
                    <input
                      value="<?php echo $cod_lote ?>"
                      name="cod_lote"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-cod_lote">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-os_pe" class="col-form-label">Ordem de Serviço P.E:</label>
                    <input  
                      value="<?php echo $os_pe ?>"
                      name="os_pe"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="10" 
                      id="recipient-os_pe">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-data_pe" class="col-form-label">Data P.E:</label>
                    <input  
                      value="<?php echo $data_pe ?>"
                      name="data_pe"
                      placeholder=""
                      type="date" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-data_pe">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-os_imp" class="col-form-label">Ordem Serviço Implantação:</label>
                    <input  
                      value="<?php echo $os_imp ?>"
                      name="os_imp"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="10" 
                      id="recipient-os_imp">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-data_imp" class="col-form-label">Data implatação:</label>
                    <input  
                      value="<?php echo $data_imp ?>"
                      name="data_imp"
                      placeholder=""
                      type="date" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-data_imp">
                  </div>


                </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/Cd.php" class="btn btn-secondary">Cancelar</a>
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
    <div class="modal fade cadastrar-cd-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myCdModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myCdModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Cidade Digital
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleCdEditar.php" method="post">

            <div class="modal-body">

            

            <div class="form-group col-md-12">
                    <label for="recipient-os_pe" class="col-form-label">Ordem de Serviço P.E:</label>
                    <input
                    name="os_pe"
                    placeholder=""
                    type="text"
                    class="form-control"
                    maxlength="10"
                    id="recipient-os_pe">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-data_pe" class="col-form-label">Data P.E:</label>
                    <input
                    name="data_pe"
                    placeholder=""
                    type="date"
                    class="form-control"
                    maxlength=""
                    id="recipient-data_pe">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-os_imp" class="col-form-label">Ordem de Serviço Implantação:</label>
                    <input
                    name="os_imp"
                    placeholder=""
                    type="text"
                    class="form-control"
                    maxlength="10"
                    id="recipient-os_imp">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-data_imp" class="col-form-label">Data Implantação:</label>
                    <input 
                      name="data_imp"
                      placeholder=""
                      type="date" 
                      class="form-control"
                      ]maxlength=""
                      id="recipient-data_imp">
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