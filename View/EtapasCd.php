<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
     require_once("../Controller/ControleListarEtapas.php");
    
      // Listar cd na opção de select
    require_once("../Controller/ControleCdSelect.php");
    require_once("../Controller/ControleEtapaSelect.php");
    ?>
    
    <!-- Conteudo -->
    <main id="main">

        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
              <i class="fas fa-list-ol"></i>
            </span>
            <span>
              <h3 class="mb-0">Etapas Cidades Digitais</h3>
              <small>Descrição</small>
            </span>
          </div>
          <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-etapas-modal-lg">
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
                    <th scope="col">Código Etapa</th>
                    <th scope="col">Data de Início</th>
                    <th scope="col">Data de Fim</th>
                    <th scope="col">Responsável</th>
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

                        <td><?php echo $value['cod_ibge'] ?></td>
                        <td><?php echo $value['cod_etapa'] ?></td>
                        <td><?php echo $value['dt_inicio'] ?></td>
                        <td><?php echo $value['dt_fim'] ?></td>
                        <td><?php echo $value['responsavel'] ?></td>
                        <td> 
                          <span class="d-flex">
                          <a href="<?php echo URL ?>View/EtapasCdEditar.php?cod_ibge=<?php echo $value['cod_ibge'] ?>&cod_etapa=<?php echo $value['cod_etapa'] ?>" 
                          class="btn btn-warning mr-1">
                          Editar
                        </a>
                            <button type="button" class="btn btn-danger">Excluir</button> 
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
    <div class="modal fade cadastrar-etapas-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myEtapasModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myEtapasModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Etapas
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleEtapas.php" method="post">

            <div class="modal-body">

                <!-- Input cod_ibge -->
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_ibge" class="col-form-label">Código IBGE:</label>
                    <select name="cod_ibge" class="form-control" id="recipient-cod_ibge">
                      <option value="">Selecionar Município</option>
                      <?php 
                        foreach($array_selectCd as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_ibge'] ?>"><?= $valor['nome_municipio'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                  </div>

                  <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_etapa" class="col-form-label">Código Etapa:</label>
                    <select name="cod_etapa" class="form-control" id="recipient-cod_etapa">
                      <option value="">Selecionar Etapa</option>
                      <?php 
                        foreach($array_selectEtapa as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_etapa'] ?>"><?= $valor['cod_etapa'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-dt_inicio" class="col-form-label">Data de Início:</label>
                    <input 
                      name="dt_inicio"
                      placeholder=""
                      type="date" 
                      class="form-control"
                      maxlength=""
                      id="recipient-dt_inicio">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-dt_fim" class="col-form-label">Data de Fim:</label>
                    <input 
                      name="dt_fim"
                      placeholder=""
                      type="date" 
                      class="form-control"
                      maxlength=""
                      id="recipient-dt_fim">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-responsavel" class="col-form-label">Responsável:</label>
                    <input 
                      name="responsavel"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45" 
                      id="recipient-responsavel">
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