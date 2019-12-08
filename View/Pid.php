<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
     require_once("../Controller/ControleListarPid.php");
    // $array_dados

   // require_once("../Controller/ControleMunicipioSelect.php");
    require_once("../Controller/ControleCdSelect.php");
    
    ?>
    
 
    <main id="main">

        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
              <i class="fas fa-list-ol"></i>
            </span>
            <span>
              <h3 class="mb-0">PONTO - PID</h3>
              
            </span>
          </div>
          <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-pid-modal-lg">
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
                    <th scope="col">Cód. Ponto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Município</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Desc. Categoria</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($array_dados as $key => $value) {
                     ?>
                     <tr>
                        <td><?php echo $value['cod_ponto'] ?></td>
                        <td><?php echo $value['nome'] ?></td>
                        <td><?php echo $value['codigo_ibge'] ?></td>
                        <td><?php echo $value['endereco'] ?></td>
                        <td><?php echo $value['descricao'] ?></td>					
                        <td>
                          <span class="d-flex">
                          <a href="<?php echo URL ?>View/PidVisualizar.php?cod_pid=<?php echo $value['cod_pid'] ?>" 
                                class="btn btn-info mr-1">
                                Ver
                            </a> 
                          <a href="<?php echo URL ?>View/PidEditar.php?cod_pid=<?php echo $value['cod_pid'] ?>" 
                                class="btn btn-warning mr-1">
                                Editar Pid
                            </a>
                          <a href="<?php echo URL ?>View/PontoEditar.php?cod_ponto=<?php echo $value['cod_ponto'] ?>" 
                                class="btn btn-warning mr-1">
                                Editar Ponto
                          </a> 
                        
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
    <div class="modal fade cadastrar-pid-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myPidModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myPidModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Pid
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControlePid.php" method="post">


            <div class="modal-body">

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
                    <label for="recipient-nome" class="col-form-label">Nome:</label>
                    <input 
                      name="nome"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255"
                      id="recipient-nome">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-inep" class="col-form-label">Inep:</label>
                    <input 
                      name="inep"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="15"
                      id="recipient-inep">
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