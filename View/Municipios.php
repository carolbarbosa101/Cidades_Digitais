<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarMunicipio.php");
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
              <h3 class="mb-0">Municípios</h3>
              <small>Descrição</small>
            </span>
          </div>
          <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-municipios-modal-lg">
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
                      <th scope="col">Código IBGE</th>
                      <th scope="col">Nome Município</th>
                      <th scope="col">População</th>
                      <th scope="col">UF</th>
                      <th scope="col">Região</th>
                      <th scope="col">CNPJ</th>
                      <th scope="col">Distancia Capital</th>
                      <th scope="col">Endereço</th>
                      <th scope="col">Número</th>
                      <th scope="col">Complemento</th>
                      <th scope="col">Bairro</th>
                      <th scope="col">IDHM</th>
                      <th scope="col">Latitude</th>
                      <th scope="col">Longitude</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  //var_dump($array_dados);
                  //die();
                    foreach ($array_dados as $key => $value) {
                        ?>
                        <tr>

                          <td><?php echo $value['cod_ibge'] ?></td>
                          <td><?php echo $value['nome_municipio'] ?></td>
                          <td><?php echo $value['populacao'] ?></td>
                          <td><?php echo $value['uf'] ?></td>
                          <td><?php echo $value['regiao'] ?></td>
                          <td><?php echo $value['cnpj'] ?></td>
                          <td><?php echo $value['dist_capital'] ?></td>
                          <td><?php echo $value['endereco'] ?></td>
                          <td><?php echo $value['numero'] ?></td>
                          <td><?php echo $value['complemento'] ?></td>
                          <td><?php echo $value['bairro'] ?></td>
                          <td><?php echo $value['idhm'] ?></td>
                          <td><?php echo $value['latitude'] ?></td>
                          <td><?php echo $value['longitude'] ?></td>
                          <td> 
                            <span class="d-flex">
                              <a href="<?php echo URL ?>View/MunicipiosEditar.php?cod_ibge=<?php echo $value['cod_ibge'] ?>" 
                                class="btn btn-warning mr-1">
                                Editar
                              </a> 
                              <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarMunicipio.php?cod_ibge=<?php echo $value['cod_ibge'] ?>')" class="btn btn-danger">
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
    <div class="modal fade cadastrar-municipios-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myMunicipiosModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myMunicipiosModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Municípios
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleMunicipio.php" method="post">

            <div class="modal-body">

                <!-- Input cod_ibge -->
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_ibge" class="col-form-label">Código IBGE:</label>
                    <input 
                      name="cod_ibge"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="7" 
                      id="recipient-cod_ibge">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-nome_municipio" class="col-form-label">Nome Município:</label>
                    <input 
                      name="nome_municipio"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="50" 
                      id="recipient-nome_municipio">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-populacao" class="col-form-label">População:</label>
                    <input 
                      name="populacao"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength=""
                      id="recipient-populacao">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-uf" class="col-form-label">UF:</label>
                    <input 
                      name="uf"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="2" 
                      id="recipient-uf">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-regiao" class="col-form-label">Região:</label>
                    <input 
                      name="regiao"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="15" 
                      id="recipient-regiao">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cnpj" class="col-form-label">CNPJ:</label>
                    <input 
                      name="cnpj"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="14" 
                      id="recipient-cnpj">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-dist_capital" class="col-form-label">Distancia Capital:</label>
                    <input 
                      name="dist_capital"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength=""
                      id="recipient-dist_capital">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-endereco" class="col-form-label">Endereço:</label>
                    <input 
                      name="endereco"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45" 
                      id="recipient-endereco">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-numero" class="col-form-label">Número:</label>
                    <input 
                      name="numero"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="10" 
                      id="recipient-numero">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-complemento" class="col-form-label">Complemento:</label>
                    <input 
                      name="complemento"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="250" 
                      id="recipient-complemento">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-bairro" class="col-form-label">Bairro:</label>
                    <input 
                      name="bairro"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45" 
                      id="recipient-bairro">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-idhm" class="col-form-label">IDHM:</label>
                    <input 
                      name="idhm"
                      placeholder=""
                      type="number"
                      class="form-control"
                      maxlength="" 
                      id="recipient-idhm">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-latitude" class="col-form-label">Latitude:</label>
                    <input 
                      name="latitude"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="10" 
                      id="recipient-latitude">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-longitude" class="col-form-label">Longitude:</label>
                    <input 
                      name="longitude"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="10" 
                      id="recipient-longitude">
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