<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleItensOtbVisualizar.php");

    
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
              <h3 class="mb-0">Editar Itens Otb</h3>
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
          <form action="../Controller/ControleItensOtbEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input type="hidden" name="cod_otb" value="<?php echo $cod_otb ?>" />
                  <input type="hidden" name="num_nf" value="<?php echo $num_nf ?>" />
                  <input type="hidden" name="cod_ibge" value="<?php echo $cod_ibge ?>" />
                  <input type="hidden" name="id_empenho" value="<?php echo $id_empenho ?>" />
                  <input type="hidden" name="cod_item" value="<?php echo $cod_item ?>" />
                  <input type="hidden" name="cod_tipo_item" value="<?php echo $cod_tipo_item ?>" />
                  
                  <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="recipient-cod_otb" class="col-form-label">Otb:</label>
                    <input disabled 
                      value="<?php echo $cod_otb ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-cod_otb">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-num_nf" class="col-form-label">Nota Fiscal:</label>
                    <input disabled 
                      value="<?php echo $num_nf ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-num_nf">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-municipioIbge" class="col-form-label">Município:</label>
                    <input disabled 
                      value="<?php echo $municipioIbge ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-municipioIbge">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-cod_empenho" class="col-form-label">Cod Empenho:</label>
                    <input disabled 
                      value="<?php echo $cod_empenho ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-cod_empenho">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-descricaoItem" class="col-form-label">Item:</label>
                    <input disabled 
                      value="<?php echo $descricaoItens ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-descricaoItem">
                  </div>

                  <div class="form-group col-md-4">
                  <label for="recipient-valor" class="col-form-label">Valor: (No empenho R$<?=$valor_fatura?> )</label>
                    <input 
                      value="<?php echo $valor ?>"
                      name="valor"
                      placeholder=""
                      type="float" 
                      class="form-control"
                      maxlength="12" 
                      id="recipient-valor">
                  </div>

                  <div class="form-group col-md-4">
                  <label for="recipient-quantidade" class="col-form-label">Quantidade: (Disponível: <?=$quant_calc?> )</label>
                    <input 
                      value="<?php echo $quantidade ?>"
                      name="quantidade"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength=""
                      id="recipient-quantidade">
                  </div>

                </div>

                </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/ItensOtb.php" class="btn btn-secondary">Cancelar</a>
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
    <div class="modal fade cadastrar-cditens-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myItensOtbModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myItensOtbModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar CD Itens
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleItensOtbEditar.php" method="post">

            <div class="modal-body">


                  <div class="form-group col-md-12">
                    <label for="recipient-quantidade_previsto" class="col-form-label">Quantidade Previsto :</label>
                    <input 
                      name="quantidade_previsto"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-quantidade_previsto">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-quantidade_projeto_executivo" class="col-form-label">Quantidade Projeto Executivo:</label>
                    <input 
                      name="quantidade_projeto_executivo"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-quantidade_projeto_executivo">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-quantidade_termo_instalacao" class="col-form-label">Quantidade Termo Instalação:</label>
                    <input 
                      name="quantidade_termo_instalacao"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength=""
                      id="recipient-quantidade_termo_instalacao">
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