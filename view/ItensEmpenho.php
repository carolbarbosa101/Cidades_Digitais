<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarItensEmpenho.php");
    require_once("../Controller/ControleEmpenhoSelect.php");
    require_once("../Controller/ControleItensSelect.php");
    require_once("../Controller/ControleTipoItemSelect.php");
    require_once("../Controller/ControlePrevisaoEmpenhoSelect.php");
    // $array_dados
    ?>
    
    <!-- Conteudo -->
    <main id="main">

        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
            <i class="fas fa-globe-asia"></i>
            </span>
            <span>
              <h3 class="mb-0">ItensEmpenho</h3>
              <small>Descrição</small>
            </span>
          </div>
          <div class="col-md-6 text-right">
            
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

          <div class="row">
            <div class="col-12">
              <!-- Exibir lista de dados em tabela -->
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                        <th scope="col">Código de Empenho</th>
                        <th scope="col">Código de Item</th>
                        <th scope="col">Código Tipo de Item</th>
                        <th scope="col">Código Previsão de Empenho</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Quantidade</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  //var_dump($array_dados);
                  //die();
                    foreach ($array_dados as $key => $value) {
                        ?>
                        <tr>

                          <td><?php echo $value['empenhoLista'] ?></td>
                          <td><?php echo $value['itemLista'] ?></td>
                          <td><?php echo $value['tipo_itemLista'] ?></td>
                          <td><?php echo $value['previsaoLista'] ?></td>
                          <td><?php echo $value['valor'] ?></td>
                          <td><?php echo $value['quantidade'] ?></td>
                          <td> 
                            <span class="d-flex">
                              <a href="<?php echo URL ?>View/ItensEmpenhoEditar.php?cod_empenho=<?php echo $value['cod_empenho'] ?>&cod_item=<?php echo $value['cod_item'] ?>&cod_tipo_item=<?php echo $value['cod_tipo_item'] ?>&cod_previsao_empenho=<?php echo $value['cod_previsao_empenho'] ?>&valor=<?php echo $value['valor'] ?>&quantidade=<?php echo $value['quantidade'] ?>" class="btn btn-warning mr-1">
                              Editar
                            </a> 
                          
                            </span>
                          </td>

                        </tr>
                        <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

    </main>

    <!-- Modal de Cadastro -->
    <div class="modal fade cadastrar-itens_empenho-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myItensEmpenhoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myItensEmpenhoModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Itens Empenho
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleItensEmpenho.php" method="post">

            <div class="modal-body">
            <div class="form-group col-md-12">
                    <label for="recipient-cod_empenho" class="col-form-label">Código Empenho:</label>
                    <select name="cod_empenho" class="form-control" id="recipient-cod_empenho">
                      <option value="">Selecionar Item</option>
                      <?php 
                        foreach($array_selectEmpenho as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_empenho'] ?>"><?= $valor['empenho'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_item" class="col-form-label">Código Item:</label>
                    <select name="cod_item" class="form-control" id="recipient-cod_item">
                      <option value="">Selecionar Item</option>
                      <?php 
                        foreach($array_selectItens as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_item'] ?>"><?= $valor['item'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                  </div>
                    

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_tipo_item" class="col-form-label">Código Tipo Item:</label>
                    <select name="cod_tipo_item" class="form-control" id="recipient-cod_tipo_item">
                      <option value="">Selecionar Tipo Item</option>
                      <?php 
                        foreach($array_selectTipoItem as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_tipo_item'] ?>"><?= $valor['tipo'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_previsao_empenho" class="col-form-label">Código Previsão Empenho:</label>
                    <select name="cod_previsao_empenho" class="form-control" id="recipient-cod_previsao_empenho">
                      <option value="">Selecionar Previsão de Empenho</option>
                      <?php 
                        foreach($array_selectPrevisaoEmpenho as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_previsao_empenho'] ?>"><?= $valor['previsao'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                  </div>


                              <!-- float tambem é do tipo decimal? -->
                  <div class="form-group col-md-12">
                    <label for="recipient-valor" class="col-form-label">Valor:</label>
                    <input 
                      name="valor"
                      placeholder=""
                      type="float" 
                      class="form-control"
                      maxlength="12" 
                      id="recipient-valor">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-quantidade" class="col-form-label">Quantidade:</label>
                    <input 
                      name="quantidade"
                      placeholder=""
                      type="int" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-quantidade">
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