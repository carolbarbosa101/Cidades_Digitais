<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleEtapasVisualizar.php");
    require_once("../Controller/ControleCdSelect.php");
    require_once("../Controller/ControleEtapaSelect.php");
    ?>
    
    <!-- Conteudo -->
    <main id="main_conteudo">

        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            
              <h3 class="mb-0">Editar Etapas Cidades Digitais</h3>
         
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
          <form action="../Controller/ControleEtapasCdEditar.php" method="post">

            <div class="form-row">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="cod_ibge" type="hidden" value="<?php echo $cod_ibge ?>"/>
                  <input name="cod_etapa" type="hidden" value="<?php echo $cod_etapa ?>"/>

                  <div class="form-group col-md-4">
                    <label for="recipient-cod_ibge" class="col-form-label">Cód. Ibge:</label>
                    <input disabled 
                      value="<?php echo $cod_ibge ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-cod_ibge">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-cod_etapa" class="col-form-label">Cód. Etapa:</label>
                    <input disabled 
                      value="<?php echo $cod_etapa ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-cod_etapa">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-dt_inicio" class="col-form-label">dt_inicio:</label>
                    <input 
                      value="<?php echo $dt_inicio ?>"
                      name="dt_inicio"
                      placeholder=""
                      type="date" 
                      class="form-control"
                      maxlength=""
                      id="recipient-dt_inicio">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-dt_fim" class="col-form-label">Data de Fim:</label>
                    <input 
                      value="<?php echo $dt_fim ?>"
                      name="dt_fim"
                      placeholder=""
                      type="datet" 
                      class="form-control"
                      maxlength=""
                      id="recipient-dt_fim">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-responsavel" class="col-form-label">Responsável:</label>
                    <input 
                      value="<?php echo $responsavel ?>"
                      name="responsavel"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45" 
                      id="recipient-responsavel">
                  </div>
            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/EtapasCd.php" class="btn btn-secondary">Cancelar</a>
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
    <div class="modal fade cadastrar-etapas-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myEtapasModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myEtapasModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Etapas Cidades Digitais
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleEtapasCdEditar.php" method="post">

            <div class="modal-body">

                <!-- Input cod_ibge -->
                <div class="form-row">
                 
                <div class="form-group col-md-12">
                      <label for="recipient-dt_inicio" class="col-form-label">Data de Ínicio:</label>
                      <input
                      name="dt_inicio"
                      placeholder=""
                      type="date"
                      class="form-control"
                      maxlength="19"
                      id="recipient-dt_inicio">
                </div>
                  <div class="form-group col-md-12">
                    <label for="recipient-dt_fim" class="col-form-label">Data de Fim:</label>
                    <input 
                      name="dt_fim"
                      placeholder=""
                      type="date" 
                      class="form-control"
                      maxlength="19"
                      id="recipient-uf">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-responsavel" class="col-form-label">Responsável:</label>
                    <input 
                      name="responsavel"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45" 
                      id="recipient-responsavel">
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