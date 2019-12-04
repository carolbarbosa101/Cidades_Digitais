<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    require_once("../Controller/ControleListarLoteItens.php");
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
            <h3 class="mb-0">Itens do Lote</h3>
            <small>Descrição</small>
            </span>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-loteitens-modal-lg">
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
                      <th scope="col">Cód. Lote</th>
                      <th scope="col">Cód. Item</th>
                      <th scope="col">Cód. Tipo Item</th>
                      <th scope="col">Preço</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  //var_dump($array_dados);
                  //die();
                    foreach($array_dados as $key => $value) {
                        ?>
                        <tr>
                          <td><?php echo $value['cod_lote'] ?></td>
                          <td><?php echo $value['cod_item'] ?></td>
                          <td><?php echo $value['cod_tipo_item'] ?></td>
                          <td><?php echo $value['preco'] ?></td>
                          <td> 
                        <span class="d-flex">
                            <a href="<?php echo URL ?>View/LoteItensEditar.php?cod_lote=<?php echo $value['cod_lote'] ?>&cod_item=<?php echo $value['cod_item'] ?>&cod_tipo_item=<?php echo $value['cod_tipo_item'] ?>&preco=<?php echo $value['preco'] ?>" class="btn btn-warning mr-1">
                                Editar
                            </a>
                              <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarLoteItens.php?cod_lote=<?php echo $value['cod_lote'] ?>&cod_item=<?php echo $value['cod_item'] ?>&cod_tipo_item=<?php echo $value['cod_tipo_item'] ?>')" class="btn btn-danger">Excluir</button> 
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
    <div class="modal fade cadastrar-loteitens-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLoteItensModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myLoteItensModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Item do Lote
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleLoteItens.php" method="post">

            <div class="modal-body">

                <!-- Input cod_assunto -->
                <div class="form-row">
                 
                <div class="form-group col-md-12">
                    <label for="recipient-cod_lote" class="col-form-label">Código Lote:</label>
                    <select name="cod_lote" class="form-control" id="recipient-cod_lote">
                      <option value="">Selecionar Cód. Lote</option>
                        <?php 
                            foreach($array_selectLote as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_lote'] ?>"><?= $valor['cod_lote'] ?></option>
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
                            foreach($array_selectItem as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_item'] ?>"><?= $valor['cod_item'] ?></option>
                        <?php 
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label for="recipient-cod_tipo_item" class="col-form-label">Tipo Item:</label>
                    <select name="cod_tipo_item" class="form-control" id="recipient-cod_tipo_item">
                      <option value="">Selecionar Tipo do Item</option>
                        <?php 
                            foreach($array_selectTipoItem as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_tipo_item'] ?>"><?= $valor['cod_tipo_item'] ?></option>
                        <?php 
                            }
                        ?>
                    </select>
                </div>
                 
                  <div class="form-group col-md-12">
                    <label for="recipient-preco" class="col-form-label">Preço:</label>
                    <input 
                      name="preco"
                      placeholder="R$ 00.00"
                      type="number" 
                      class="form-control"
                      maxlength="12"
                      id="recipient-preco">
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