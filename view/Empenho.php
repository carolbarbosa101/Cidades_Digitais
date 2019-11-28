<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarEmpenho.php");
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
              <h3 class="mb-0">Empenho</h3>
              <small>Descrição</small>
            </span>
          </div>
          <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-empenho-modal-lg">
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
                        <th scope="col">Código Empenho</th>
                        <th scope="col">Previsão de Empenho</th>
                        <th scope="col">Data</th>
                        <th scope="col">Contador</th>
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
                          <td><?php echo $value['cod_previsao_empenho'] ?></td>
                          <td><?php echo $value['data'] ?></td>
                          <td><?php echo $value['contador'] ?></td>
                          <td> 
                            <span class="d-flex">
                              <a href="<?php echo URL ?>View/EmpenhoEditar.php?cod_empenho=<?php echo $value['cod_empenho'] ?>" class="btn btn-warning mr-1">
                              Editar
                            </a> 
                            <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarEmpenho.php?cod_empenho=<?php echo $value['cod_empenho'] ?>')" class="btn btn-danger">
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
    <div class="modal fade cadastrar-empenho-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myEmpenhoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myEmpenhoModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Empenho
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleEmpenho.php" method="post">

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
                    <label for="recipient-cod_previsao_empenho" class="col-form-label">Código Previsão de Empenho:</label>
                    <select name="cod_previsao_empenho" class="form-control" id="recipient-cod_previsao_empenho">
                      <option value="">Selecionar Data de Empenho</option>
                      <?php 
                        foreach($array_selectCd as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_previsao_empenho'] ?>"><?= $valor['data'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                  </div>
                    

                  <div class="form-group col-md-12">
                    <label for="recipient-data" class="col-form-label">Data:</label>
                    <input 
                      name="data"
                      placeholder=""
                      type="date" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-data">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-contador" class="col-form-label">Contador:</label>
                    <input 
                      name="contador"
                      placeholder=""
                      type="int" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-contador">
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