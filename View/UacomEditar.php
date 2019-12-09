<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleUacomVisualizar.php");

    require_once("../Controller/ControleContatoSelect.php");
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
              <h3 class="mb-0">Editar Uacom</h3>
             
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
          <form action="../Controller/ControleUacomEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="cod_ibge" type="hidden" value="<?php echo $cod_ibge ?>"/>
                  <input name="data" type="hidden" value="<?php echo $data ?>"/>

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_ibge" class="col-form-label">Cód. IBGE:</label>
                    <input disabled 
                      value="<?php echo $cod_ibge ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-cod_ibge">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-data" class="col-form-label">Data:</label>
                    <input disabled 
                      value="<?php echo $data ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-data">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-titulo" class="col-form-label">Título:</label>
                    <input 
                      value="<?php echo $titulo ?>"
                      name="titulo"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45" 
                      id="recipient-titulo">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-relato" class="col-form-label">Relato:</label>
                    <input 
                      value="<?php echo $relato ?>"
                      name="relato"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength=""
                      id="recipient-relato">
                  </div>

                </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/Uacom.php" class="btn btn-secondary">Cancelar</a>
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
    <div class="modal fade cadastrar-uacom-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myUacomModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myUacomModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Uacom
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleUacomEditar.php" method="post">

            <div class="modal-body">

              
                
                <div class="form-group col-md-12">
                    <label for="recipient-titulo" class="col-form-label">Título:</label>
                    <input 
                      name="titulo"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="45"
                      id="recipient-titulo">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-relato" class="col-form-label">Relato:</label>
                    <input 
                      name="relato"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength=""
                      id="recipient-relato">
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