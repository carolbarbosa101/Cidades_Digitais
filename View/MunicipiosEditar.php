<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleMunicipioVisualizar.php");
    // $array_dados
    ?>
    
    <!-- Conteudo -->
    <main id="main_conteudo">

        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
            <i class="fas fa-globe-asia"></i>
            </span>
            <span>
              <h3 class="mb-0">Editar Município</h3>
              <small>Descrição</small>
            </span>
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

          <?php 
            if(!empty($array_dados)){

              extract($array_dados);
          ?>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleMunicipioEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="cod_ibge" type="hidden" value="<?php echo $cod_ibge ?>"/>

                  <div class="form-group col-md-12">
                    <label for="recipient-nome_municipio" class="col-form-label">Nome Município:</label>
                    <input 
                      value="<?php echo $nome_municipio ?>"
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
                      value="<?php echo $populacao ?>"
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
                      value="<?php echo $uf ?>"
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
                      value="<?php echo $regiao ?>"
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
                      value="<?php echo $cnpj ?>"
                      name="cnpj"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="14" 
                      id="recipient-cnpj">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-dist_capital" class="col-form-label">Distância Capital:</label>
                    <input 
                      value="<?php echo $dist_capital ?>"
                      name="dist_capital"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="11"
                      id="recipient-dist_capital">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-endereco" class="col-form-label">Endereço:</label>
                    <input 
                      value="<?php echo $endereco ?>"
                      name="endereco"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="100" 
                      id="recipient-endereco">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-numero" class="col-form-label">Número:</label>
                    <input 
                      value="<?php echo $numero ?>"
                      name="numero"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-numero">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-complemento" class="col-form-label">Complemento:</label>
                    <input 
                      value="<?php echo $complemento ?>"
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
                      value="<?php echo $bairro ?>"
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
                      value="<?php echo $idhm ?>"
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
                      value="<?php echo $latitude ?>"
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
                      value="<?php echo $longitude ?>"
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
              <a href="<?php echo URL ?>View/Municipios.php" class="btn btn-secondary">Cancelar</a>
              <button type="submit" class="btn btn-primary">
                Salvar
              </button>
            </div>

          </form>

          <?php 
            } // fim do if para verificar se existe dados para editar
          ?>

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
          <form action="../Controller/ControleMunicipioEditar.php" method="post">

            <div class="modal-body">

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
                      type="number" 
                      class="form-control"
                      maxlength="11"
                      id="recipient-dist_capital">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-endereco" class="col-form-label">Endereço:</label>
                    <input 
                      name="endereco"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="100" 
                      id="recipient-endereco">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-numero" class="col-form-label">Número:</label>
                    <input 
                      name="numero"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
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