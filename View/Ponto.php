<?php
    if (!isset($_GET['cod_ibge'])){
      header('Location: ./Pid.php');
    }
    include_once("_cabecalho.php");
 //   require_once("../Controller/ControleListarPonto.php");
    require_once("../Controller/ControleCategoriaSelect.php");

    ?>
    <main id="main">
      <!-- FORMULARIO -->
      <form action="../Controller/ControlePonto.php" method="post">

        <div class="modal-body">

            <div class="form-row">

            <div class="form-group col-md-12">
                <label for="recipient-cod_ponto" class="col-form-label">Cód. Ponto:</label>
                <input 
                  name="cod_ponto"
                  placeholder=""
                  type="number" 
                  class="form-control"
                  maxlength="" 
                  id="recipient-cod_ponto">
              </div>

              <div class="form-group col-md-12">
                    <label for="recipient-cod_categoria" class="col-form-label">Categoria:</label>
                    <select name="cod_categoria" class="form-control" id="recipient-cod_categoria">
                      <option value="">Selecionar Categoria</option>
                      <?php 
                        foreach($array_selectCategoria as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_categoria'] ?>"><?= $valor['descricao'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                  </div>

              <div class="form-group col-md-12">
                <label for="recipient-cod_ibge" class="col-form-label">Cód. Ibge:</label>
                <input 
                    name="cod_ibge"
                  value="<?= $_GET['cod_ibge'] ?>"
                  type="text"
                  class="form-control "
                  id="recipient-cod_ibge">
              </div>

              <div class="form-group col-md-12">
                <label for="recipient-cod_pid" class="col-form-label">Cód. PID:</label>
                <input 
                name="cod_pid"
                  value="<?= $_GET['cod_pid'] ?>"
                  type="text" 
                  class="form-control "
                  id="recipient-cod_pid">
              </div>

              <div class="form-group col-md-12">
                <label for="recipient-endereco" class="col-form-label">Endereco:</label>
                <input 
                  name="endereco"
                  placeholder=""
                  type="text" 
                  class="form-control"
                  maxlength="255" 
                  id="recipient-endereco">
              </div>

              <div class="form-group col-md-12">
                <label for="recipient-numero" class="col-form-label">Número:</label>
                <input 
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
                  name="complemento"
                  placeholder=""
                  type="text" 
                  class="form-control"
                  maxlength="1000" 
                  id="recipient-complemento">
              </div>

              <div class="form-group col-md-12">
                <label for="recipient-bairro" class="col-form-label">Bairro:</label>
                <input 
                  name="bairro"
                  placeholder=""
                  type="text" 
                  class="form-control"
                  maxlength="100" 
                  id="recipient-bairro">
              </div>

              <div class="form-group col-md-12">
                <label for="recipient-cep" class="col-form-label">Cep:</label>
                <input 
                  name="cep"
                  placeholder=""
                  type="text" 
                  class="form-control"
                  maxlength="8" 
                  id="recipient-cep">
              </div>

              <div class="form-group col-md-12">
                    <label for="recipient-latitude" class="col-form-label">Latitude:</label>
                    <input 
                      name="latitude"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="11" 
                      id="recipient-latitude">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-longitude" class="col-form-label">Longitude:</label>
                    <input 
                      name="longitude"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="11" 
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
    </main>
    <?php
    // Rodape
    include_once('_rodape.php');
?>