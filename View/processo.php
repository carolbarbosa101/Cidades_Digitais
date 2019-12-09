<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarProcesso.php");
    require_once("../Controller/ControleCdSelect.php");
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
            <h3 class="mb-0">Processo</h3>
            <small>Descrição</small>
            </span>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-processo-modal-lg">
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
                      <th scope="col">Codigo Processo</th>
                      <th scope="col">Código IBGE</th>
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
                          <td><?php echo $value['cod_processo'] ?></td>
                          <td><?php echo $value['cod_ibge_dados'] ?></td>
                          <td><?php echo $value['descricao'] ?></td>
                          <td> 
                            <span class="d-flex">
                            <a href="<?php echo URL ?>View/ProcessoEditar.php?cod_processo=<?php echo $value['cod_processo'] ?>&cod_ibge=<?php echo $value['cod_ibge'] ?>" class="btn btn-warning mr-1">
                              Editar
                            </a> 
                            <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarProcesso.php?cod_processo=<?php echo $value['cod_processo'] ?>&cod_ibge=<?php echo $value['cod_ibge'] ?>')" class="btn btn-danger">
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



    <div class="modal fade cadastrar-processo-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myProcessoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myProcessoModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Processo
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleProcesso.php" method="post">

            <div class="modal-body">

                <!-- Input cod_processo -->
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_processo" class="col-form-label">Código processo:</label>
                    <input 
                      name="cod_processo"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="17" 
                      id="recipient-cod_assunto">
                  </div>
                  <select name="cod_ibge" class="form-control" id="recipient-cod_ibge">
                      <option value="">Município:</option>
                      <?php 
                        foreach($array_selectCd as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_ibge'] ?>"><?= $valor['nome_municipio'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>

                 
                  <div class="form-group col-md-12">
                    <label for="recipient-descricao" class="col-form-label">Descricao:</label>
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