<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarCd.php");
    // $array_dados
    require_once("../Controller/ControleMunicipioSelect.php");
    require_once("../Controller/ControleLoteSelect.php");
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
            <h3 class="mb-0">Cidades Digitais</h3>
            <small>Descrição</small>
            </span>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-Cd-modal-lg">
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
                      <th scope="col">Codigo IBGE</th>
                      <th scope="col">Código Lote</th>
                      <th scope="col">Ordem de Serviço P.E </th>
                      <th scope="col">Data P.E</th>
                      <th scope="col">Ordem Serviço Implantação</th>
                      <th scope="col">Data implatação</th>
                      <th scope="col">Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  //var_dump($array_dados);
                  //die();
                    foreach($array_dados as $key => $value) {
                        ?>
                        <tr>
                          <td><?php echo $value['ibge'] ?></td>
                          <td><?php echo $value['cod_lote'] ?></td>
                          <td><?php echo $value['os_pe'] ?></td>
                          <td><?php echo date('d/m/Y', strtotime($value['data_pe']))?> </td>
                          <td><?php echo $value['os_imp'] ?></td>
                          <td><?php echo date('d/m/Y', strtotime($value['data_imp']))?> </td>
                          <td> 
                            <span class="d-flex">
                            <a href="<?php echo URL ?>View/CdEditar.php?cod_ibge=<?php echo $value['cod_ibge'] ?>" 
                                class="btn btn-warning mr-1">
                                Editar
                              </a>
                              <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarCd.php?cod_ibge=<?php echo $value['cod_ibge'] ?>')" class="btn btn-danger">Excluir</button> 
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
    <div class="modal fade cadastrar-Cd-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myCdModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myCdModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar CD
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleCd.php" method="post">

            <div class="modal-body">

                <!-- Input cod_Cd -->
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_ibge" class="col-form-label">Código IBGE:</label>
                    <select name="cod_ibge" class="form-control" id="recipient-cod_ibge">
                      <option value="">Municipio</option>
                      <?php 
                        foreach($array_selectMunicipios as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_ibge'] ?>"><?= $valor['nome_municipio'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                    
                  </div>
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_lote" class="col-form-label">Código Lote:</label>
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
                    <label for="recipient-os_pe" class="col-form-label">Ordem de Serviço P.E:</label>
                    <input
                    name="os_pe"
                    placeholder=""
                    type="text"
                    class="form-control"
                    maxlength="10"
                    id="recipient-os_pe">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-data_pe" class="col-form-label">Data P.E:</label>
                    <input
                    name="data_pe"
                    placeholder=""
                    type="date"
                    class="form-control"
                    maxlength=""
                    id="recipient-data_pe">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-os_imp" class="col-form-label">Ordem de Serviço Implantação:</label>
                    <input
                    name="os_imp"
                    placeholder=""
                    type="text"
                    class="form-control"
                    maxlength="10"
                    id="recipient-os_imp">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-data_imp" class="col-form-label">Data Implantação:</label>
                    <input 
                      name="data_imp"
                      placeholder=""
                      type="date" 
                      class="form-control"
                      ]maxlength=""
                      id="recipient-data_imp">
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