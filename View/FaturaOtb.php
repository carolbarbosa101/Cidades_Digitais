<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarFaturaOtb.php");
    require_once("../Controller/ControleFaturaSelect.php");
    require_once("../Controller/ControleFaturaSelectIBGE.php");
    require_once("../Controller/ControleOtbSelect.php");
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
            <h3 class="mb-0"> Fatura da Ordem de Transferência Bancária</h3>
            <small>Descrição</small>
            </span>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-fatura_otb-modal-lg">
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
                      <th scope="col">Código ordem de Transferência Bancária</th>
                      <th scope="col">Número da Nota Fiscal</th>
                      <th scope="col">Código IBGE</th>
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
                          <td><?php echo $value['cod_otb'] ?></td>
                          <td><?php echo $value['num_nf'] ?></td>
                          <td><?php echo $value['cod_ibge'] ?></td>
                          <td> 
                            <span class="d-flex">
                              <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarFaturaOtb.php?cod_otb=<?php echo $value['cod_otb'] ?>&num_nf=<?php echo $value['num_nf'] ?>&cod_ibge=<?php echo $value['cod_ibge'] ?>')" class="btn btn-danger">Excluir</button> 
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
    <div class="modal fade cadastrar-fatura_otb-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myFaturaOtbModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myFaturaOtbModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Ordem de Transferência Bancária
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleFaturaOtb.php" method="post">

            <div class="modal-body">

                <!-- Input cod_assunto -->
                <div class="form-row">
                 
                <div class="form-group col-md-12">
                    <label for="recipient-cod_otb" class="col-form-label">Código ordem de Transferência Bancária:</label>
                    <select name="cod_otb" class="form-control" id="recipient-cod_otb">
                      <option value="">Selecionar OTB</option>
                      <?php 
                        foreach($array_selectOtb as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_otb'] ?>"><?= $valor['cod_otb'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                  </div>


                        <!-- O Código da Nota fiscal e o Código de IBGE tem que ser os mesmos relacionados na tabela fatura -->


                        <div class="form-group col-md-12">
                    <label for="recipient-cod_ibge" class="col-form-label">IBGE:</label>
                    <select name="cod_ibge" class="form-control" id="recipient-cod_ibge">
                      <option value="">Selecionar Categoria</option>
                      <?php 
                        foreach($array_selectFatura as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_ibge']?>"><?= $valor['cod_ibge'] ?></option>
                        
                        <?php 
                        }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-num_nf" class="col-form-label">Nota Fiscal:</label>
                    <select name="num_nf" class="form-control" id="recipient-num_nf">
                      <option value="">Selecionar Categoria</option>
                      <?php 
                        foreach($array_selectFatura as $chave => $valor){
                        ?>
                        <option value="<?= $valor['num_nf']?>"><?= $valor['num_nf'] ?></option>
                        
                        <?php 
                        }
                      ?>
                    </select>
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