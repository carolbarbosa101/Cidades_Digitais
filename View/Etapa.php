<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
     require_once("../Controller/ControleListarEtapa.php");
    // $array_dados
    ?>
    
    <!-- Conteudo -->
    <main id="main">

        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
              <i class="fas fa-list-ol"></i>
            </span>
            <span>
              <h3 class="mb-0">Etapa</h3>
              <small>Descrição</small>
            </span>
          </div>
          <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-etapa-modal-lg">
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
                    <th scope="col">Código Etapa</th>
					          <th scope="col">Descrição</th>
                    <th scope="col">Duração</th>
                    <th scope="col">Depende</th>
                    <th scope="col">Delay</th>
					          <th scope="col">Setor Responsável</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                //var_dump($array_dados);
                //die;
                  foreach ($array_dados as $key => $value) {
                      ?>
                      <tr>

                        <td><?php echo $value['cod_etapa'] ?></td>						
                        <td><?php echo $value['descricao'] ?></td>
                        <td><?php echo $value['duracao'] ?></td>
                        <td><?php echo $value['depende'] ?></td>
                        <td><?php echo $value['delay'] ?></td>
                        <td><?php echo $value['setor_resp'] ?></td>
                        <td> 
                        <span class="d-flex">
                        <a href="<?php echo URL ?>View/EtapaEditar.php?cod_etapa=<?php echo $value['cod_etapa'] ?>" 
                          class="btn btn-warning mr-1">
                          Editar
                        </a>
                          <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarEtapa.php?cod_etapa=<?php echo $value['cod_etapa'] ?>')" class="btn btn-danger">Excluir</button> 
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
    <div class="modal fade cadastrar-etapa-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myEtapaModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myEtapaModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Etapa
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleEtapa.php" method="post">

            <div class="modal-body">

                <!-- Input cod_ibge -->
                <div class="form-row">
               

                  <div class="form-group col-md-12">
                    <label for="recipient-descricao" class="col-form-label">Descrição:</label>
                    <input 
                      name="descricao"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45"
                      id="recipient-descricao">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-duracao" class="col-form-label">Duração:</label>
                    <input 
                      name="duracao"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength=""
                      id="recipient-duracao">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-depende" class="col-form-label">Depende:</label>
                    <input 
                      name="depende"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength=""
                      id="recipient-depende">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-delay" class="col-form-label">Delay:</label>
                    <input 
                      name="delay"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-delay">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-setor_resp" class="col-form-label">Setor Responsável:</label>
                    <input 
                      name="setor_resp"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45" 
                      id="recipient-setor_resp">
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