<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarItensEmpenho.php");
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-itens_empenho-modal-lg">
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

                          <td><?php echo $value['cod_empenho'] ?></td>
                          <td><?php echo $value['cod_item'] ?></td>
                          <td><?php echo $value['cod_tipo_item'] ?></td>
                          <td><?php echo $value['cod_previsao_empenho'] ?></td>
                          <td><?php echo $value['valor'] ?></td>
                          <td><?php echo $value['quantidade'] ?></td>
                          <td> 
                            <span class="d-flex">
                              <a href="<?php echo URL ?>View/ItensEmpenhoEditar.php?cod_empenho=<?php echo $value['cod_empenho'] ?>" class="btn btn-warning mr-1">
                              Editar
                            </a> 
                            <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarItensEmpenho.php?cod_empenho=<?php echo $value['cod_empenho'] ?>')" class="btn btn-danger">
                              Excluir
                            </button> 
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
                    <label for="recipient-cod_empenho" class="col-form-label">Código de Empenho:</label>
                    <input 
                      name="cod_empenho"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="13" 
                      id="recipient-cod_empenho">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_item" class="col-form-label">Código de Item:</label>
                    <input 
                      name="cod_item"
                      placeholder=""
                      type="int" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-cod_item">
                  </div>
                    

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_tipo_item" class="col-form-label">Código Tipo de Item:</label>
                    <input 
                      name="cod_tipo_item"
                      placeholder=""
                      type="int" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-cod_tipo_item">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_previsao_empenho" class="col-form-label">Código da Previsão de Empenho:</label>
                    <input 
                      name="cod_previsao_empenho"
                      placeholder=""
                      type="int" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-cod_previsao_empenho">
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