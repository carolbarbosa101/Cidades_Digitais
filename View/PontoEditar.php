<?php
    // Cabeçalho
    include_once("_cabecalho.php");
    // Buscar todos os cadastros no banco
    require_once("../Controller/ControlePontoVisualizar.php");
    require_once("../Controller/ControleCdSelect.php");
    require_once("../Controller/ControlePidSelect.php");
    require_once("../Controller/ControleCategoriaSelect.php");
    ?>
    
    <!-- Conteudo -->
    <main id="main_conteudo">

        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
            <i class="fas fa-globe-asia"></i>
            </span>
            <span>
              <h3 class="mb-0">Editar Ponto</h3>
             
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
          <form action="../Controller/ControlePontoEditar.php" method="post">

            <div class="modal-body">


                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="cod_ponto" type="hidden" value="<?php echo $cod_ponto ?>"/>
                  <input name="cod_ibge" type="hidden" value="<?php echo $cod_ibge ?>"/>
                  <input name="cod_categoria" type="hidden" value="<?php echo $cod_categoria ?>"/>
                  <input name="cod_pid" type="hidden" value="<?php echo $cod_pid ?>"/>
                  
                  <div class="form-group col-md-4">
                    <label for="recipient-cod_ibge" class="col-form-label">Municipio:</label>
                    <input disabled 
                      value="<?php echo $nome_municipio ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-cod_ibge">
                  </div>

                 
                  <div class="form-group col-md-4">
                    <label for="recipient-descricao" class="col-form-label">Cód Categoria:</label>
                    <input disabled 
                      value="<?php echo $descricao ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-descricao">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-cod_pid" class="col-form-label">Cód Pid:</label>
                    <input disabled 
                      value="<?php echo $nome ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-cod_pid">
                  </div>
                  

                  <div class="form-group col-md-12">
                    <label for="recipient-endereco" class="col-form-label">Endereco:</label>
                    <input 
                      value="<?php echo $endereco ?>"
                      name="endereco"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-endereco">
                  </div>

               
                  <div class="form-group col-md-12">
                    <label for="recipient-numero" class="col-form-label">numero:</label>
                    <input 
                      value="<?php echo $numero ?>"
                      name="numero"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45"
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
                      maxlength="255" 
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
                      maxlength="255" 
                      id="recipient-bairro">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cep" class="col-form-label">CEP:</label>
                    <input 
                      value="<?php echo $cep ?>"
                      name="cep"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-cep">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-latitude" class="col-form-label">Latitude:</label>
                    <input 
                      value="<?php echo $latitude ?>"
                      name="latitude"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
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
                      maxlength="255" 
                      id="recipient-longitude">
                  </div>

                </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/Ponto.php" class="btn btn-secondary">Cancelar</a>
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
    <div class="modal fade cadastrar-ponto-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myPontoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myPontoModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Ponto
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControlePontoEditar.php" method="post">

            <div class="modal-body">

              

                <div class="form-group col-md-12">
                    <label for="recipient-endereco" class="col-form-label">Endereco:</label>
                    <input 
                      name="endereco"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="255"
                      id="recipient-endereco">
                  </div>
                  
                
                <div class="form-group col-md-12">
                    <label for="recipient-numero" class="col-form-label">Número:</label>
                    <input 
                      name="numero"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="45"
                      id="recipient-numero">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-complemento" class="col-form-label">Complemento:</label>
                    <input 
                      name="complemento"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="1000"
                      id="recipient-complemento">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-bairro" class="col-form-label">Bairro:</label>
                    <input 
                      name="bairro"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="100"
                      id="recipient-bairro">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cep" class="col-form-label">CEP:</label>
                    <input 
                      name="cep"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="8"
                      id="recipient-cep">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-latitude" class="col-form-label">Latitude:</label>
                    <input 
                      name="latitude"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="10"
                      id="recipient-latitude">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-longitude" class="col-form-label">Longitude:</label>
                    <input 
                      name="longitude"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="10"
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