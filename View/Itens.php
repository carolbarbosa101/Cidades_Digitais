<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarItens.php");
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
            <h3 class="mb-0">Itens</h3>
            <small>Descrição</small>
            </span>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-itens-modal-lg">
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
                      <th scope="col">Cód. Item</th>
                      <th scope="col">Cod. Tipo Item</th>
                      <th scope="col">Natureza da despesa</th>
                      <th scope="col">Empenho</th>
                      <th scope="col">Descrição</th>
                      <th scope="col">Unidade</th>
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
                          <td><?php echo $value['cod_item'] ?></td>
                          <td><?php echo $value['cod_tipo_item'] ?></td>
                          <td><?php echo $value['cod_natureza_despesa'] ?></td>
                          <td><?php echo $value['cod_classe_empenho'] ?></td>
                          <td><?php echo $value['descricao'] ?></td>
                          <td><?php echo $value['unidade'] ?></td>
                          <td> 
                            <span class="d-flex">
                            <a href="<?php echo URL ?>View/ItensEditar.php?cod_item=<?php echo $value['cod_item'] ?>&cod_tipo_item=<?php echo $value['cod_tipo_item'] ?>" class="btn btn-warning mr-1">
                                Editar
                            </a>
                            <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarItens.php?cod_item=<?php echo $value['cod_item'] ?>&cod_tipo_item=<?php echo $value['cod_tipo_item'] ?>')" class="btn btn-danger">Excluir</button> 
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
    <div class="modal fade cadastrar-itens-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myItensModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myItensModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Itens
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleItens.php" method="post">

            <div class="modal-body">

                <!-- Input cod_assunto -->
                <div class="form-row">
                 
                <div class="form-group col-md-12">
                    <label for="recipient-cod_tipo_item" class="col-form-label">Tipo Item:</label>
                    <select name="cod_tipo_item" class="form-control" id="recipient-cod_tipo_item">
                        <option value="">Selecionar Tipo Item</option>
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
                    <label for="recipient-cod_natureza_despesa" class="col-form-label">Naturesa Despesa:</label>
                    <select name="cod_natureza_despesa" class="form-control" id="recipient-cod_natureza_despesa">
                        <option value="">Selecionar Naturesa Despesa</option>
                        <?php 
                            foreach($array_selectNatureza_Despesa as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_natureza_despesa'] ?>"><?= $valor['cod_natureza_despesa'] ?></option>
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
                      maxlength="100"
                      id="recipient-descricao">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-unidade" class="col-form-label">Unidade:</label>
                    <input 
                      name="unidade"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45"
                      id="recipient-unidade">
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