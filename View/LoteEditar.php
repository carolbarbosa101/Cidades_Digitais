<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleLoteVisualizar.php");
    require_once("../Controller/ControleEntidadeSelect.php");
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
              <h3 class="mb-0">Editar Lote</h3>
             
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
          <form action="../Controller/ControleLoteEditar.php" method="post">

          <div class="form-row">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="cod_lote" type="hidden" value="<?php echo $cod_lote ?>"/>
                 
                 
                  <div class="form-group col-md-4">
                    <label for="recipient-cod_lote" class="col-form-label">Cód. Lote:</label>
                    <input disabled 
                      value="<?php echo $cod_lote ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-cod_lote">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-cnpj" class="col-form-label">Entidade:</label>
                    <input 
                      value="<?php echo $cnpj ?>"
                      name="cnpj"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-cnpj">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-contrato" class="col-form-label">Contrato:</label>
                    <input 
                      value="<?php echo $contrato ?>"
                      name="contrato"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="10"
                      id="recipient-contrato">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-dt_inicio_vig" class="col-form-label">Data inicio da Vigência:</label>
                    <input 
                      value="<?php echo $dt_inicio_vig ?>"
                      name="dt_inicio_vig"
                      placeholder=""
                      type="date" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-dt_inicio_vig">
                  </div>

                  
                  <div class="form-group col-md-12">
                    <label for="recipient-dt_final_vig" class="col-form-label">Data final da Vigência:</label>
                    <input 
                      value="<?php echo $dt_final_vig ?>"
                      name="dt_final_vig"
                      placeholder=""
                      type="date" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-dt_final_vig">
                  </div>

                  
                  <div class="form-group col-md-12">
                    <label for="recipient-dt_reajuste" class="col-form-label">Data Reajuste:</label>
                    <input 
                    value="<?php echo date('d/m/y',strtotime($dt_reajuste)); ?>"
                    name="dt_reajuste"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-dt_reajuste">
                  </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/Lote.php" class="btn btn-secondary">Cancelar</a>
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
    <div class="modal fade cadastrar-lote-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLoteModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myLoteModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Lote
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleLoteEditar.php" method="post">

           
            <div class="form-row">

            <div class="form-group col-md-12">
                <label for="recipient-cnpj" class="col-form-label">Cnpj:</label>
                      <select name="cnpj" class="form-control" id="recipient-cnpj">
                      <option value="">Selecionar Entidade</option>
                      <?php 
                        foreach($array_selectEntidade as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cnpj'] ?>"><?= $valor['nome'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
              </div>

                  <div class="form-group col-md-12">
                      <label for="recipient-contrato" class="col-form-label">Contrato:</label>
                      <input
                      name="contrato"
                      placeholder=""
                      type="text"
                      class="form-control"
                      maxlength="10"
                      id="recipient-contrato">
                </div>
                  
                
                <div class="form-group col-md-12">
                    <label for="recipient-dt_inicio_vig" class="col-form-label">Data inicio da Vigência:</label>
                    <input
                    name="dt_inicio_vig"
                    placeholder=""
                    type="date"
                    class="form-control"
                    maxlength="2"
                    id="recipient-dt_inicio_vig">
                </div>
                
                <div class="form-group col-md-12">
                      <label for="recipient-dt_final_vig" class="col-form-label">Data final da Vigência:</label>
                      <input
                      name="dt_final_vig"
                      placeholder=""
                      type="date"
                      class="form-control"
                      maxlength="15"
                      id="recipient-dt_final_vig">
                </div>

                <div class="form-group col-md-12">
                    <label for="recipient-dt_reajuste" class="col-form-label">Data Reajuste:</label>
                    <input
                    name="dt_reajuste"
                    placeholder="dd-mm"
                    type="text"
                    class="form-control"
                    maxlength="8"
                    id="recipient-dt_reajuste">
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