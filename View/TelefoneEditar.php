<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleTelefoneVisualizar.php");
    //require_once("../Controller/ControleListarTelefone.php");
    require_once("../Controller/ControleContatoSelect.php");
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
              <h3 class="mb-0">Editar Telefone</h3>
             
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

              //extract($array_dados);
          ?>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleTelefoneEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  
                  <input type="hidden" name="cod_telefone" value="<?php echo $cod_telefone ?>" />
                  <input type="hidden" name="cod_contato" value="<?php echo $cod_contato ?>" />
                 
                  
                  <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="recipient-cod_telefone" class="col-form-label">Codigo Telefone:</label>
                    <input disabled 
                      value="<?php echo $cod_telefone ?>"
                      type="int" 
                      class="form-control"
                      id="recipient-cod_telefone">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-cod_contato" class="col-form-label">Codigo Contato:</label>
                    <input disabled 
                      value="<?php echo $cod_contato ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-cod_contato">
                  </div>

                  <div class="form-group col-md-12">
                  <label for="recipient-contato" class="col-form-label">Contato:</label>
                    <input disabled 
                      name="contato"
                      value="<?php echo $contato ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-contato">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-telefone" class="col-form-label">Telefone:</label>
                    <input 
                      value="<?php echo $telefone ?>"
                      name="telefone"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="11"
                      id="recipient-telefone">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-tipo" class="col-form-label">Tipo:</label>
                    <input 
                      value="<?php echo $tipo ?>"
                      name="tipo"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="10" 
                      id="recipient-tipo">
                  </div>

                  
                </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/Telefone.php" class="btn btn-secondary">Cancelar</a>
              <button type="submit" class="btn btn-primary">
                Salvar
              </button>
            </div>

          </form>

          <?php 
           // } // fim do if para verificar se existe dados para editar
          ?>

        </div>

    </main>





    <!-- Modal de Cadastro -->
    <div class="modal fade cadastrar-telefone-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myTelefoneModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myTelefoneModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Telefone
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleTelefoneEditar.php" method="post">

            <div class="modal-body">

            <div class="form-group col-md-12">
                    <label for="recipient-cod_contato" class="col-form-label">Código Contato:</label>
                    <select name="cod_contato" class="form-control" id="recipient-cod_contato">
                      <option value="">Selecionar Contato</option>
                      <?php 
                        foreach($array_selectContato as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_contato'] ?>"><?= $valor['nome'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                  </div>
              

                <div class="form-group col-md-12">
                    <label for="recipient-telefone" class="col-form-label">Telefone:</label>
                    <input 
                      name="telefone"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="11"
                      id="recipient-telefone">
                  </div>
                  
                
                <div class="form-group col-md-12">
                    <label for="recipient-tipo" class="col-form-label">Tipo:</label>
                    <input 
                      name="tipo"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="10"
                      id="recipient-tipo">
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