<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarPrevisaoEmpenho.php");
    require_once("../Controller/ControleLoteSelect.php");
    require_once("../Controller/ControleNaturezaDespesaSelect.php");

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
            <h3 class="mb-0">Previsão Empenho</h3>
            </span>
            </div>
            <div class="col-md-6 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-previsao_empenho-modal-lg">
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
                      <th scope="col">Previsão Empenho</th>
                      <th scope="col">Lote</th>
                      <th scope="col">Natureza de Despesa</th>
                      <th scope="col">Data</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Ano de Referência</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  
                // var_dump($array_dados);
                // die();

                    foreach($array_dados as $key => $value) {
                        ?>
                        <tr>
                          <td><?php echo $value['cod_previsao_empenho'] ?></td>
                          <td><?php echo $value['cod_lote'] ?></td>
                          <td><?php echo $value['descricao'] ?></td>
                          <td><?php echo date('d/m/Y', strtotime($value['data']))?> </td>
                          <td><?php echo $value['tipo'] ?></td>
                          <td><?php echo $value['ano_referencia'] ?></td>
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
    <div class="modal fade cadastrar-previsao_empenho-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myPrevisaoEmprenhoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myPrevisaoEmprenhoModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Previsão Empenho
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControlePrevisaoEmpenho.php" method="post">

            <div class="modal-body">

                <!-- Input cod_previsao_empenho -->
                <div class="form-row">

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_lote" class="col-form-label">Código Lote:</label>
                    <select name="cod_lote" class="form-control" id="recipient-cod_lote">
                      <option value="">Selecionar Lote</option>
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
                    <label for="recipient-cod_natureza_despesa" class="col-form-label">Descrição da Natureza:</label>
                    <select name="cod_natureza_despesa" class="form-control" id="recipient-cod_natureza_despesa">
                      <option value="">Selecionar Natureza</option>
                      <?php 
                        foreach($array_selectNaturezaDespesa as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_natureza_despesa'] ?>"><?= $valor['descricao'] ?></option>
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
                    <label for="recipient-tipo" class="col-form-label">Tipo("O" Original/"R" Reajuste):</label>
                    <select name="tipo" class="form-control" id="recipient-tipo">
                            <option>O</option>
                            <option>R</option>
                    </select>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-ano_referencia" class="col-form-label">Ano:</label>
                    <input 
                      name="ano_referencia"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="4" 
                      id="recipient-ano_referencia">
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