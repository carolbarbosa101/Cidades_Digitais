<?php
    // Cabeçalho
    include_once("_cabecalho.php");
    require_once("../Controller/ControleListarModulo.php");
    ?>
    <main id="main">
        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
                <i class="fas fa-globe-asia"></i>
            </span>
            <span>
            <h3 class="mb-0">Modulo</h3>
            <small>Descrição</small>
            </span>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-modulo-modal-lg">
                <i class="far fa-plus-square"></i>
                Cadastrar
                </button>
            </div>
        </div>

        <div class="container">

            <?php
     
                if(isset($_SESSION['msg'])) {
                    echo $_SESSION['msg']; 
                    unset($_SESSION['msg']); // após exibir a informação do alerta, destruir a variavel, para que ao recarregar a página o alerta não permanessa na pagina.
                }
            ?>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Codigo Modulo</th>
                      <th scope="col">Categoria 1</th>
                      <th scope="col">Categoria 2</th>
                      <th scope="col">Categoria 3</th>
                      <th scope="col">Descricao</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  //var_dump($array_dados);
                 //die();
                    foreach($array_dados as $key => $value) {
                        ?>
                        <tr>
                          <td><?php echo $value['cod_modulo'] ?></td>
                          <td><?php echo $value['categoria_1'] ?></td>
                          <td><?php echo $value['categoria_2'] ?></td>
                          <td><?php echo $value['categoria_3'] ?></td>
                          <td><?php echo $value['descricao'] ?></td>
                          <td> 
                            <span class="d-flex">
                              <button type="button" class="btn btn-warning mr-1">Editar</button> 
                              <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarModulo.php?cod_modulo=<?php echo $value['cod_modulo'] ?>')" class="btn btn-danger">Excluir</button> 
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
    <div class="modal fade cadastrar-modulo-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModuloModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myModuloModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Modulo
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleModulo.php" method="post">

            <div class="modal-body">

                <!-- Input cod_assunto -->
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_modulo" class="col-form-label">Código modulo:</label>
                    <input 
                      name="cod_modulo"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="11" 
                      id="recipient-cod_assunto">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="recipient-categoria_1" class="col-form-label">categoria_1:</label>
                    <input 
                      name="categoria_1"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="45"
                      id="recipient-categoria_1">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="recipient-categoria_2" class="col-form-label">categoria_2:</label>
                    <input 
                      name="categoria_2"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="45"
                      id="recipient-categoria_2">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="recipient-categoria_3" class="col-form-label">categoria_3:</label>
                    <input 
                      name="categoria_3"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="45"
                      id="recipient-categoria_3">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="recipient-descricao" class="col-form-label">descricao:</label>
                    <input 
                      name="descricao"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="45"
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