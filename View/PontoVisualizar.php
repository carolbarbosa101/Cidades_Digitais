<?php
    include_once("_cabecalho.php");
    require_once("../Controller/ControlePidVisualizar.php");
    
    ?>
    
    <main id="main_conteudo">

        <div class="row mb-5 mt-3 pl-3">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
          
            </span>
            <span>
              <h3 class="mb-0">Detalhes do Ponto </h3>
            </span>
          </div>
 
        </div>

        <div class="container">

            <?php
                if(isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>

          <?php 
          
            if(!empty($array_dados)){
              extract($array_dados);
            }
            ?>
            
            <div class="form-row">

                  <div class="form-group col-md-4">
                    <label for="recipient-cod_pid" class="col-form-label">Código Pid:</label>
                    <input disabled 
                      value="<?php echo $cod_pid ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-cod_pid">
                  </div>
                  
                  <div class="form-group col-md-4">
                    <label for="recipient-cod_ponto" class="col-form-label">Cód. Ponto:</label>
                    <input disabled
                      value="<?php echo $cod_ponto ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-cod_ponto">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-inep" class="col-form-label">INEP:</label>
                    <input disabled
                      value="<?php echo $inep ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-inep">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-cod_ibge" class="col-form-label">Município:</label>
                    <input disabled
                      value="<?php echo $nome_municipio ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-cod_ibge">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-nome" class="col-form-label">Nome PID:</label>
                    <input disabled
                      value="<?php echo $nome ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-nome">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-cod_categoria" class="col-form-label">Cód. Categoria:</label>
                    <input disabled
                      value="<?php echo $cod_categoria ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-cod_categoria">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-descricao" class="col-form-label">Descrição:</label>
                    <input disabled
                      value="<?php echo $descricao ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-descricao">
                  </div>

               
                  <div class="form-group col-md-4">
                    <label for="recipient-endereco" class="col-form-label">Endereço:</label>
                    <input disabled
                      value="<?php echo $endereco ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-endereco">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-numero" class="col-form-label">Número:</label>
                    <input disabled
                      value="<?php echo $numero ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-numero">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-complemento" class="col-form-label">Complemento:</label>
                    <input disabled
                      value="<?php echo $complemento ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-complemento">
                  </div>
                  
                  <div class="form-group col-md-4">
                    <label for="recipient-bairro " class="col-form-label">Número:</label>
                    <input disabled
                      value="<?php echo $bairro ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-bairro ">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="recipient-cep" class="col-form-label">CEP:</label>
                    <input disabled
                      value="<?php echo $cep ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-cep">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="recipient-latitude" class="col-form-label">Latitude:</label>
                    <input disabled
                      value="<?php echo $latitude ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-latitude">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="recipient-longitude" class="col-form-label">Longitude:</label>
                    <input disabled
                      value="<?php echo $longitude ?>"
                      type="text" 
                      class="form-control"
                      id="recipient-longitude">
                  </div>
                  
                </div>
            <?php 

          ?>

        </div>

    </main>

    <?php
    // Rodape
    include_once('_rodape.php');
?>