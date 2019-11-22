<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControlePrefeitoVisualizar.php");
    require_once("../Controller/ControleMunicipioSelect.php");
    // $array_dados
    ?>
    
    <!-- Conteudo -->
    <main id="main_conteudo">

        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
          
            <span>
              <h3 class="mb-0">Editar Prefeito</h3>
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
          <form action="../Controller/ControlePrefeitosEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="cod_prefeito" type="hidden" value="<?php echo $cod_prefeito ?>"/>
                  <input name="cod_ibge" type="hidden" value="<?php echo $cod_ibge ?>"/>

                  <div class="form-group col-md-4">
                    <label for="recipient-cod_ibge" class="col-form-label">Cód IBGE:</label>
                    <input disabled 
                      value="<?php echo $cod_ibge ?>"
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
                      maxlength="45"
                      id="recipient-nome">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cpf" class="col-form-label">CPF:</label>
                    <input 
                      value="<?php echo $cpf ?>"
                      name="cpf"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="11"
                      id="recipient-cpf">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-rg" class="col-form-label">RG:</label>
                    <input 
                      value="<?php echo $rg ?>"
                      name="rg"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="20" 
                      id="recipient-rg">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-partido" class="col-form-label">Partido:</label>
                    <input 
                      value="<?php echo $partido ?>"
                      name="partido"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45" 
                      id="recipient-partido">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-exericio" class="col-form-label">Exercício:</label>
                    <input 
                      value="<?php echo $exericio ?>"
                      name="exericio"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45"
                      id="recipient-exericio">
                  </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/Prefeitos.php" class="btn btn-secondary">Cancelar</a>
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
    <div class="modal fade cadastrar-prefeitos-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myPrefeitosModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myPrefeitosModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Prefeito
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControlePrefeitosEditar.php" method="post">

            <div class="modal-body">


            <div class="form-group col-md-12">
              <label for="recipient-nome" class="col-form-label">Nome:</label>
              <input 
                name="nome"
                placeholder=""
                type="text" 
                class="form-control"
                maxlength="45"
                id="recipient-nome">
            </div>

            <div class="form-group col-md-12">
              <label for="recipient-cpf" class="col-form-label">CPF:</label>
              <input 
                name="cpf"
                placeholder=""
                type="text" 
                class="form-control"
                maxlength="11" 
                id="recipient-cpf">
            </div>

            <div class="form-group col-md-12">
              <label for="recipient-rg" class="col-form-label">RG:</label>
              <input 
                name="rg"
                placeholder=""
                type="text" 
                class="form-control"
                maxlength="20" 
                id="recipient-rg">
            </div>

            <div class="form-group col-md-12">
              <label for="recipient-partido" class="col-form-label">Partido:</label>
              <input 
                name="partido"
                placeholder=""
                type="text" 
                class="form-control"
                maxlength="14" 
                id="recipient-partido">
            </div>

            <div class="form-group col-md-12">
              <label for="recipient-exercicio" class="col-form-label">Exercício:</label>
              <input 
                name="exercicio"
                placeholder=""
                type="text" 
                class="form-control"
                maxlength="45"
                id="recipient-exercicio">
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