<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarTipologiaPid.php");
    require_once("../Controller/ControleTipologiaSelect.php");
    require_once("../Controller/ControlePidSelect.php");
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
            <h3 class="mb-0">Tipologia Pid </h3>
            <small>Descrição</small>
            </span>
            
            </div>
            <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-tipologiapid-modal-lg">
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
                      <th scope="col">PID</th>
                      <th scope="col">Tipologia</th>
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
                          <td><?php echo $value['nome'] ?></td>
                          <td><?php echo $value['descricao'] ?></td>
                          <td> 
                            <span class="d-flex">
                            
                              <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarTipologiaPid.php?cod_pid=<?php echo $value['cod_pid'] ?>&cod_tipologia=<?php echo $value['cod_tipologia'] ?>')" class="btn btn-danger">Excluir</button> 
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
    <div class="modal fade cadastrar-tipologiapid-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myTipologiaPidModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myTipologiaPidModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Pid Tipologia
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleTipologiaPid.php" method="post">

            <div class="modal-body">

                <!-- Input cod_assunto -->
                <div class="form-row">
                 

                <div class="form-group col-md-12">
                    <label for="recipient-cod_pid" class="col-form-label">Pid:</label>
                    <select name="cod_pid" class="form-control" id="recipient-cod_pid">
                      <option value="">Selecionar Pid</option>
                      <?php 
                        foreach($array_selectPid as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_pid'] ?>"><?= $valor['nome'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_tipologia" class="col-form-label">Tipologia:</label>
                    <select name="cod_tipologia" class="form-control" id="recipient-cod_tipologia">
                      <option value="">Selecionar Tipologia</option>
                      <?php 
                        foreach($array_selectTipologia as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_tipologia'] ?>"><?= $valor['descricao'] ?></option>
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