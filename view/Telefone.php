<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarTelefone.php");
    // $array_dados
    require_once("../Controller/ControleContatoSelect.php");
    ?>
    
    <!-- Conteudo -->
    <main id="main">
        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
                <i class="fas fa-globe-asia"></i>
            </span>
            <span>
            <h3 class="mb-0">Telefone</h3>
            <small>Descrição</small>
            </span>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-telefone-modal-lg">
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
                      <th scope="col">Cód. Telefone</th>
                      <th scope="col">Contato</th>
                      <th scope="col">Telefone</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                 // var_dump($array_dados);
                 // die();

                    foreach($array_dados as $key => $value) {
                        ?>
                        <tr>
                          <td><?php echo $value['cod_telefone'] ?></td>
                          <td><?php echo $value['nome'] ?></td>
                          <td><?php echo $value['telefone'] ?></td>
                          <td><?php echo $value['tipo'] ?></td>
                          <td> 
                            <span class="d-flex">
                            <a href="<?php echo URL ?>View/TelefoneEditar.php?cod_telefone=<?php echo $value['cod_telefone'] ?>" 
                                class="btn btn-warning mr-1">
                                Editar
                              </a> 
                              <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarTelefone.php?cod_telefone=<?php echo $value['cod_telefone'] ?>')" class="btn btn-danger">
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
    <div class="modal fade cadastrar-telefone-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myTelefoneModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myTelefoneModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Telefone
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleTelefone.php" method="post">

            <div class="modal-body">

                <!-- Input cod_telefone -->
                <div class="form-row">
    

                 
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_contato" class="col-form-label">Código Contato:</label>
                    <select name="cod_contato" class="form-control" id="recipient-cod_contato">
                      <option value="">Selecionar Contato</option>
                      <?php 
                        foreach($array_selectContato as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_contato'] ?>"><?= $valor['nome'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                  </div>
              

                <div class="form-group col-md-12">
                    <label for="recipient-telefone" class="col-form-label">Telefone:</label>
                    <input 
                      name="telefone"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="11"
                      id="recipient-telefone">
                  </div>
                  
                
                <div class="form-group col-md-12">
                    <label for="recipient-tipo" class="col-form-label">Tipo:</label>
                    <input 
                      name="tipo"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="10"
                      id="recipient-tipo">
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