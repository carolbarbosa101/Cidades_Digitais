<?php
  // Cabeçalho
  include_once("_cabecalho.php");
  require_once("../Controller/ControleListarCategoria.php");
?>
  <main id="main">
    <div class="container">
      <div class="row mb-5">
        <div id="mainHeader" class="col-md-6 d-flex align-items-center">
          
          <span>
            <h3 class="mb-0">Categoria</h3>
          </span>
        </div>
        <div class="col-md-6 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-categoria-modal-lg">
            <i class="far fa-plus-square"></i>
            Cadastrar
          </button>
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

        <div class="row">
          <div class="col-12">
            <!-- Exibir lista de dados em tabela -->
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Código da Categoria</th>
                    <th scope="col">Descrição</th>
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
                        <td><?php echo $value['cod_categoria'] ?></td>
                        <td><?php echo $value['descricao'] ?></td>
                        <td> 
                          <span class="d-flex">
                          <a href="<?php echo URL ?>View/CategoriaEditar.php?cod_categoria=<?php echo $value['cod_categoria'] ?>" class="btn btn-warning mr-1"> Editar
                          </a>
                          <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarCategoria.php?cod_categoria=<?php echo $value['cod_categoria'] ?>')" class="btn btn-danger">Excluir</button> 
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
  <div class="modal fade cadastrar-categoria-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myCategoriaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="myCategoriaModalLabel">
            <i class="far fa-plus-square"></i>
            Cadastrar Categoria
          </h5>
        </div>

        <!-- FORMULARIO -->
        <form action="../Controller/ControleCategoria.php" method="post">

          <div class="modal-body">

            <!-- Input cod_lote -->
            <div class="form-row">
             

              <div class="form-group col-md-12">
                <label for="recipient-descricao" class="col-form-label">Descrição:</label>
                <input
                name="descricao"
                placeholder=""
                type="text"
                class="form-control"
                maxlength="10"
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
            
          </div>
        </form>
      </div>
    </div>

<?php
    // Rodape
    include_once('_rodape.php');
?>