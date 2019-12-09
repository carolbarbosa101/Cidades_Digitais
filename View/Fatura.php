<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarFatura.php");
    require_once("../Controller/ControleCdSelect.php");
    // $array_dados
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
              <h3 class="mb-0">Fatura</h3>
              <small>Descrição</small>
            </span>
          </div>
          <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-fatura-modal-lg">
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
                        <th scope="col">Número da Nota Fiscal</th>
                        <th scope="col">Código IBGE</th>
                        <th scope="col">Data da Nota Fiscal</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  //var_dump($array_dados);
                  //die();
                    foreach ($array_dados as $key => $value) {
                        ?>
                        <tr>

                          <td><?php echo $value['num_nf'] ?></td>
                          <td><?php echo $value['cod_ibge'] ?></td>
                          <td><?php echo date('d/m/Y', strtotime($value['dt_nf']))?> </td>
                          <td> 
                            <span class="d-flex">
                             
                            <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarFatura.php?num_nf=<?php echo $value['num_nf'] ?>&cod_ibge=<?php echo $value['cod_ibge'] ?>')" class="btn btn-danger">
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
    <div class="modal fade cadastrar-fatura-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myFaturaModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myFaturaModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Fatura
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleFatura.php" method="post">

            <div class="modal-body">

              <!-- Qual o tamanho do maxlenght da chave primaria "num_nf"? -->
            <div class="form-group col-md-12">
                    <label for="recipient-num_nf" class="col-form-label">Número da Nota Fiscal:</label>
                    <input 
                      name="num_nf"
                      placeholder=""
                      type="number" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-num_nf">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_ibge" class="col-form-label">Cód. IBGE:</label>
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
                 
                    

                  <div class="form-group col-md-12">
                    <label for="recipient-dt_nf" class="col-form-label">Data da Nota Fiscal:</label>
                    <input 
                      name="dt_nf"
                      placeholder=""
                      type="date" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-dt_nf">
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