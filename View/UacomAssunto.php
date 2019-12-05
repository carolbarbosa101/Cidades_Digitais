<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
     require_once("../Controller/ControleListarUacomAssunto.php");
    // $array_dados

    require_once("../Controller/ControleAssuntoSelect.php");
    require_once("../Controller/ControleUacomSelect.php");
    ?>
    
 
    <main id="main">

        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
              <i class="fas fa-list-ol"></i>
            </span>
            <span>
              <h3 class="mb-0">Uacom Assunto</h3>
              <small>Descrição</small>
            </span>
          </div>
          <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-uacomassunto-modal-lg">
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

            <!-- Exibir lista de dados em tabela -->
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Código IBGE</th>
				    <th scope="col">Data</th>
                    <th scope="col">Código Assunto</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                //var_dump($array_dados);
               // die;
                  foreach ($array_dados as $key => $value) {
                      ?>
                      <tr>

                        <td><?php echo $value['cod_ibge'] ?></td>
                        <td><?php echo date('d/m/Y H:i:s', strtotime($value['data']))?> </td>
                        <td><?php echo $value['cod_assunto'] ?></td>
                        <td> 
                          <span class="d-flex">
                          <a href="<?php echo URL ?>View/UacomAssuntoEditar.php?cod_ibge=<?php echo $value['cod_ibge'] ?>&data=<?php echo $value['data'] ?>&cod_assunto=<?php echo $value['cod_assunto'] ?>" 
                                class="btn btn-warning mr-1">
                                Editar
                          </a> 
                            <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarUacomAssunto.php?cod_ibge=<?php echo $value['cod_ibge'] ?>&data=<?php echo $value['data'] ?>&cod_assunto=<?php echo $value['cod_assunto'] ?>')" class="btn btn-danger">Excluir</button> 
                             
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

    </main>

    <!-- Modal de Cadastro -->
    <div class="modal fade cadastrar-uacomassunto-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myUacomAssuntoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myUacomAssuntoModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Uacom
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleUacomAssunto.php" method="post">

            <div class="modal-body">

               <div class="form-group col-md-12">
                    <label for="recipient-cod_ibge" class="col-form-label">Código IBGE:</label>
                    <select name="cod_ibge" class="form-control" id="recipient-cod_ibge">
                      <option value="">Selecionar Município</option>
                      <?php 
                        foreach($array_selectUacom as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_ibge'] ?>"><?= $valor['cod_ibge'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-data" class="col-form-label">Data:</label>
                    <select name="data" class="form-control" id="recipient-data">
                      <option value="">Selecionar Data</option>
                      <?php 
                        foreach($array_selectUacom as $chave => $valor){
                        ?>
                        <option value="<?= $valor['data'] ?>"><?= $valor['data'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_assunto" class="col-form-label">Cód. Assunto:</label>
                    <select name="cod_assunto" class="form-control" id="recipient-cod_assunto">
                      <option value="">Selecionar Assunto</option>
                      <?php 
                        foreach($array_selectAssunto as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_assunto'] ?>"><?= $valor['cod_assunto'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
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