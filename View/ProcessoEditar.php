<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleProcessoVisualizar.php");
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
              <h3 class="mb-0">Editar Processo</h3>
            </span>
          </div>
 
        </div>

        <div class="container">

            <?php

                if(isset($_SESSION['msg'])) {
                    echo $_SESSION['msg']; 
                    unset($_SESSION['msg']);
                }
            ?>

          <?php 
            if(!empty($array_dados)){

              extract($array_dados);
          ?>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleProcessoEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="cod_processo" type="hidden" value="<?php echo $cod_processo ?>"/>
                  <input name="cod_ibge" type="hidden" value="<?php echo $cod_ibge ?>"/>

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_processo" class="col-form-label">CÓD. Processo:</label>
                    <input disabled 
                      value="<?php echo $cod_processo ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-cod_processo">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_ibge" class="col-form-label">Municipio:</label>
                    <input disabled 
                      value="<?php echo $cod_ibge ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-cod_ibge">
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


            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/Processo.php" class="btn btn-secondary">Cancelar</a>
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
    <div class="modal fade cadastrar-processo-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myProcessoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myProcessoModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Processo
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleProcessoEditar.php" method="post">

            <div class="modal-body">

            <div class="form-group col-md-12">
                <label for="recipient-cod_ibge" class="col-form-label">Código IBGE:</label>
                <select name="cod_ibge" class="form-control" id="recipient-cod_ibge">
                  <option value="">Selecionar município</option>
                  <?php 
                    foreach($array_selectMunicipios as $chave => $valor){
                    ?>
                    <option value="<?= $valor['cod_ibge'] ?>"><?= $valor['nome_municipio'] ?></option>
                    <?php 
                    }
                  ?>
                </select>
            </div>

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