<?php
  include_once("_cabecalho.php");

  // Buscar todos os cadastros no banco
  require_once("../Controller/ControleListarItensOtb.php");
  require_once("../Controller/ControleOtbSelect.php");
  require_once("../Controller/ControleFaturaSelect.php");
  require_once("../Controller/ControleMunicipioSelect.php");
  require_once("../Controller/ControleEmpenhoSelect.php");
  require_once("../Controller/ControleItensSelect.php");
  require_once("../Controller/ControleTipoItemSelect.php");
  ?>

  <!-- Conteudo -->
  <main id="main">

      <div class="row mb-5">
        <div id="mainHeader" class="col-md-6 d-flex align-items-center">
          <span id="mainHeaderIcon">
          <i class="fas fa-globe-asia"></i>
          </span>
          <span>
            <h3 class="mb-0">Itens Otb</h3>
            <small>Descrição</small>
          </span>
        </div>
        <div class="col-md-6 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-itens_otb-modal-lg">
            <i class="far fa-plus-square"></i>
            Cadastrar
          </button>
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
                    <th scope="col">Ordem de Transferência Bancária</th>
                    <th scope="col">Nota fiscal:</th>
                    <th scope="col">Municipio - IBGE</th>
                    <th scope="col">Cód. Empenho</th>
                    <th scope="col">Item</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                //var_dump($array_dados);
                //die();
                  foreach ($array_dados as $key => $value) {
                      ?>
                      <tr>
                        <td><?php echo $value['cod_otb'] ?></td>
                        <td><?php echo $value['num_nf'] ?></td>
                        <td><?php echo $value['municipioIbge'] ?></td>
                        <td><?php echo $value['cod_empenho'] ?></td>
                        <td><?php echo $value['descricaoItem'] ?></td>
                        <td><?php echo $value['valor'] ?></td>
                        <td><?php echo $value['quantidade'] ?></td>
                        <td> 
                          <span class="d-flex">
                          <a href="<?php echo URL ?>View/ItensOtbEditar.php?cod_otb=<?php echo $value['cod_otb'] ?>&num_nf=<?php echo $value['num_nf'] ?>&cod_ibge=<?php echo $value['cod_ibge'] ?>&cod_empenho=<?php echo $value['cod_empenho'] ?>&cod_item=<?php echo $value['cod_item'] ?>&cod_tipo_item=<?php echo $value['cod_tipo_item'] ?>" class="btn btn-warning mr-1"> Editar
                          </a>
                          <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarItensOtb.php?cod_otb=<?php echo $value['cod_otb'] ?>&num_nf=<?php echo $value['num_nf'] ?>&cod_ibge=<?php echo $value['cod_ibge'] ?>&cod_empenho=<?php echo $value['cod_empenho'] ?>&cod_item=<?php echo $value['cod_item'] ?>&cod_tipo_item=<?php echo $value['cod_tipo_item'] ?>')" class="btn btn-danger">Excluir</button> 
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
  <div class="modal fade cadastrar-itens_otb-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myItensOtbModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="myItensOtbModalLabel">
            <i class="far fa-plus-square"></i>
            Cadastrar Itens Otb
          </h5>
        </div>

        <!-- FORMULARIO -->
        <form action="../Controller/ControleItensOtb.php" method="post">

          <div class="modal-body">

            <!-- Input cod_lote -->
            <div class="form-row">

            <div class="form-group col-md-12">
                <label for="recipient-cod_otb" class="col-form-label">Ordem de Transferência Bancária:</label>
                      <select name="cod_otb" class="form-control" id="recipient-cod_otb">
                      <option value="">Selecionar Ordem de Transferência Bancária</option>
                      <?php 
                        foreach($array_selectOtb as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_otb'] ?>"><?= $valor['cod_otb'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
              </div>

              <div class="form-group col-md-12">
                <label for="recipient-num_nf" class="col-form-label">Nota Fiscal:</label>
                      <select name="num_nf" class="form-control" id="recipient-num_nf">
                      <option value="">Selecionar Nota Fiscal</option>
                      <?php 
                        foreach($array_selectFatura as $chave => $valor){
                        ?>
                        <option value="<?= $valor['num_nf'] ?>"><?= $valor['num_nf'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
              </div>


              <div class="form-group col-md-12">
                <label for="recipient-cod_ibge" class="col-form-label">IBGE:</label>
                      <select name="cod_ibge" class="form-control" id="recipient-cod_ibge">
                      <option value="">Selecionar Código IBGE</option>
                      <?php 
                        foreach($array_selectMunicipios as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_ibge'] ?>"><?= $valor['municipioIbge'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
              </div>

           
              <div class="form-group col-md-12">
                <label for="recipient-cod_empenho" class="col-form-label">Cód. Empenho:</label>
                      <select name="cod_empenho" class="form-control" id="recipient-cod_empenho">
                      <option value="">Selecionar Código do Empenho</option>
                      <?php 
                        foreach($array_selectEmpenho as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_empenho'] ?>"><?= $valor['cod_empenho'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
              </div>
              
              <div class="form-group col-md-12">
                <label for="recipient-cod_tipo_item" class="col-form-label">Cód. Tipo Item:</label>
                      <select name="cod_tipo_item" class="form-control" id="recipient-cod_tipo_item">
                      <option value="">Selecionar Tipo do Item</option>
                      <?php 
                        foreach($selectTipoItem as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_tipo_item'] ?>"><?= $valor['tipo'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
              </div>
             
              <div class="form-group col-md-12">
                <label for="recipient-cod_item" class="col-form-label">Cód. Item:</label>
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
                <label for="recipient-valor" class="col-form-label">Valor:</label>
                <input
                name="valor"
                placeholder=""
                type="number"
                class="form-control"
                maxlength="12"
                id="recipient-valor">
              </div>

              <div class="form-group col-md-12">
                <label for="recipient-quantidade" class="col-form-label">Quantidade:</label>
                <input
                name="quantidade"
                placeholder=""
                type="number"
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
          </div>
        </form>
      </div>
    </div>
  </div>
<?php
    // Rodape
    include_once('_rodape.php');
?>