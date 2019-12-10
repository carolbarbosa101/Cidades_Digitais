<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarReajuste.php");
    require_once("../Controller/ControleLoteSelect.php");
    // $array_dados
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
              <h3 class="mb-0">Reajustes</h3>
            </span>
          </div>
          <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-reajuste-modal-lg">
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
                      <th scope="col">Ano de Referência</th>
                      <th scope="col">Código Lote</th>
                      <th scope="col">Percentual</th>
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

                          <td><?php echo $value['ano_ref'] ?></td>
                          <td><?php echo $value['cod_lote'] ?></td>
                          <td><?php echo $value['percentual'] ?></td>
                          <td> 
                            <span class="d-flex">
                              <a href="<?php echo URL ?>View/ReajusteEditar.php?ano_ref=<?php echo $value['ano_ref'] ?>&cod_lote=<?php echo $value['cod_lote'] ?>" class="btn btn-warning mr-1">
                              Editar
                            </a> 
                            <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarReajuste.php?ano_ref=<?php echo $value['ano_ref'] ?>&cod_lote=<?php echo $value['cod_lote'] ?>')" class="btn btn-danger">
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
    <div class="modal fade cadastrar-reajuste-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myReajusteModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myReajusteModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Reajuste
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleReajuste.php" method="post">

            <div class="modal-body">

                <!-- Input ano_ref -->
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-ano_ref" class="col-form-label">Ano de Referência:</label>
                    <input 
                      name="ano_ref"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-ano_ref">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_lote" class="col-form-label">Código lote:</label>
                    <select name="cod_lote" class="form-control" id="recipient-cod_ibge">
                      <option value="">Código Lote</option>
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
                    <label for="recipient-percentual" class="col-form-label">Percentual:</label>
                    <input 
                      name="percentual"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength=""
                      id="recipient-percentual">
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