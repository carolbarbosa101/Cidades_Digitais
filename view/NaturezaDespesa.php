<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarNaturezaDespesa.php");
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
              <h3 class="mb-0">Natureza da Despesa</h3>
              <small>Descrição</small>
            </span>
          </div>
          <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-naturezadespesa-modal-lg">
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
                      <th scope="col">Cód. Natureza Despesa</th>
                      <th scope="col">Descricao</th>
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

                          <td><?php echo $value['cod_natureza_despesa'] ?></td>
                          <td><?php echo $value['descricao'] ?></td>
                          <td> 
                            <span class="d-flex">
                              <a href="<?php echo URL ?>View/NaturezaDespesaEditar.php?cod_natureza_despesa=<?php echo $value['cod_natureza_despesa'] ?>" 
                                class="btn btn-warning mr-1">
                                Editar
                              </a> 
                              <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarNaturezaDespesa.php?cod_natureza_despesa=<?php echo $value['cod_natureza_despesa'] ?>')" class="btn btn-danger">
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
    <div class="modal fade cadastrar-naturezadespesa-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myNaturezaDespesaModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myNaturezaDespesaModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Natureza da despesa
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleNaturezaDespesa.php" method="post">

            <div class="modal-body">

                <!-- Input cod_ibge -->
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_natureza_despesa" class="col-form-label">Código Natureza Despesa:</label>
                    <input 
                      name="cod_natureza_despesa"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-cod_natureza_despesa">
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