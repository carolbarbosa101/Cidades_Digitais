<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControlePidVisualizar.php");

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
              <h3 class="mb-0">Editar Pid</h3>
             
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
          <form action="../Controller/ControlePidEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="cod_pid" type="hidden" value="<?php echo $cod_pid ?>"/>

                 
                 <div class="form-group col-md-12">
                    <label for="recipient-cod_ibge" class="col-form-label">Municipio:</label>
                    <input disabled 
                      value="<?php echo $nome_municipio ?>"
                      name="cod_ibge"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-cod_ibge">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-nome" class="col-form-label">Nome:</label>
                    <input 
                      value="<?php echo $nome ?>"
                      name="nome"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255"
                      id="recipient-nome">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-inep" class="col-form-label">Inep:</label>
                    <input 
                      value="<?php echo $inep ?>"
                      name="inep"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="15" 
                      id="recipient-inep">
                  </div>

                  
                </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/Pid.php" class="btn btn-secondary">Cancelar</a>
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
    <div class="modal fade cadastrar-pid-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myPidModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myPidModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Pid
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControlePidEditar.php" method="post">

            <div class="modal-body">

              

                <div class="form-group col-md-12">
                    <label for="recipient-nome" class="col-form-label">Nome:</label>
                    <input 
                      name="nome"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255"
                      id="recipient-nome">
                  </div>
                  
                
                <div class="form-group col-md-12">
                    <label for="recipient-inep" class="col-form-label">Inep:</label>
                    <input 
                      name="inep"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="15"
                      id="recipient-inep">
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