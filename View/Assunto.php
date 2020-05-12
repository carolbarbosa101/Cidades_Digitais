<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarAssunto.php");
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
            <h3 class="mb-0">Assunto</h3>
            <small>Descrição</small>
            </span>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-assunto-modal-lg">
                <i class="far fa-plus-square"></i>
                Cadastrar
                </button>
            </div>
        </div>

          <!-- FILTRO DE PESQUISA -->
          <div class="row mt-2 mb-3">
              <div class="col-12">
                  <form action="" method="get" class="d-flex align-items-center">
                      <label for="idPesquisaInput" class="m-0">
                        <input
                            type="text"
                            name="pesquisa"
                            class="form-control"
                            id="idPesquisaInput"
                            placeholder="Digite aqui..."
                            value="<?= isset($_GET['pesquisa']) && !empty($_GET['pesquisa']) ? $_GET['pesquisa'] : '' ?>"
                            required
                        >
                      </label>
                      <button
                          type="submit"
                          class="btn btn-secondary ml-1">
                          Pesquisar
                      </button>
                      <a href="<?= URL . 'View/'?>Assunto.php" class="btn btn-warning ml-1">Limpar</a>
                  </form>
              </div>
          </div>
          <!-- #END FILTRO DE PESQUISA -->

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
                      <th scope="col">Codigo Assunto</th>
                      <th scope="col">Descrição</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  //var_dump($array_dados);
                  //die();
                    foreach($array_dados as $key => $value) {
                        ?>
                        <tr>
                          <td><?php echo $value['cod_assunto'] ?></td>
                          <td><?php echo $value['descricao'] ?></td>
                          <td> 
                            <span class="d-flex">
                            <a href="<?php echo URL ?>View/AssuntoEditar.php?cod_assunto=<?php echo $value['cod_assunto'] ?>" 
                                class="btn btn-warning mr-1">
                                Editar
                          </a>
                              <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarAssunto.php?cod_assunto=<?php echo $value['cod_assunto'] ?>')" class="btn btn-danger">Excluir</button> 
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
    <div class="modal fade cadastrar-assunto-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myAssuntoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myAssuntoModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Assunto
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleAssunto.php" method="post">

            <div class="modal-body">

                <!-- Input cod_assunto -->
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