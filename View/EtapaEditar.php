<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleEtapaVisualizar.php");
    // $array_dados
    ?>
    
    <!-- Conteudo -->
    <main id="main_conteudo">

        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span>
              <h3 class="mb-0">Editar Etapa</h3>
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
          <form action="../Controller/ControleEtapaEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="cod_etapa" type="hidden" value="<?php echo $cod_etapa ?>"/>

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_etapa" class="col-form-label">Cód. Etapa:</label>
                    <input disabled 
                      value="<?php echo $cod_etapa ?>"
                      name="cod_etapa"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-cod_etapa">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-descricao" class="col-form-label">Descrição:</label>
                    <input 
                      value="<?php echo $descricao ?>"
                      name="descricao"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45"
                      id="recipient-descricao">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-duracao" class="col-form-label">Duração:</label>
                    <input 
                      value="<?php echo $duracao ?>"
                      name="duracao"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength=""
                      id="recipient-duracao">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-depende" class="col-form-label">Depende:</label>
                    <input 
                      value="<?php echo $depende ?>"
                      name="depende"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength=""
                      id="recipient-depende">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-delay" class="col-form-label">Delay:</label>
                    <input 
                      value="<?php echo $delay ?>"
                      name="delay"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength=""
                      id="recipient-delay">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-setor_resp" class="col-form-label">Setor Resp:</label>
                    <input 
                      value="<?php echo $setor_resp ?>"
                      name="setor_resp"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45"
                      id="recipient-setor_resp">
                  </div>

                </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/Etapa.php" class="btn btn-secondary">Cancelar</a>
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
    <div class="modal fade cadastrar-etapa-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myEtapaModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myEtapaModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Etapa
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleEtapaEditar.php" method="post">

            <div class="modal-body">
            <div class="form-group col-md-12">
                    <label for="recipient-descricao" class="col-form-label">Descrição:</label>
                    <input 
                      name="descricao"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45" 
                      id="recipient-descricao">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-duracao" class="col-form-label">Duração:</label>
                    <input 
                      name="duracao"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-duracao">
                  </div>
                    

                  <div class="form-group col-md-12">
                    <label for="recipient-depende" class="col-form-label">Depende:</label>
                    <input 
                      name="depende"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-depende">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-delay" class="col-form-label">Delay:</label>
                    <input 
                      name="delay"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-delay">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-setor_resp" class="col-form-label">Setor Resp.:</label>
                    <input 
                      name="setor_resp"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45" 
                      id="recipient-setor_resp">
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