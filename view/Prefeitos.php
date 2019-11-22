<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarPrefeitos.php");
    // $array_dados

    // Listar municipios na opção de select
    require_once("../Controller/ControleMunicipioSelect.php");

    ?>
    
    <!-- Conteudo -->
    <main id="main">

        <div class="row mb-5">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
            <i class="fas fa-globe-asia"></i>
            </span>
            <span>
              <h3 class="mb-0">Prefeitos</h3>
              <small>Descrição</small>
            </span>
          </div>
          <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-prefeitos-modal-lg">
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
                      <th scope="col">Codígo Prefeito</th>
                      <th scope="col">Codígo IBGE</th>
                      <th scope="col">Nome</th>
                      <th scope="col">CPF</th>
                      <th scope="col">RG</th>
                      <th scope="col">Partido</th>
                      <th scope="col">Exercício</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  //var_dump($array_dados);
                    foreach($array_dados as $key => $value) {
                        ?>
                        <tr>
                          <td><?php echo $value['cod_prefeito'] ?></td>
                          <td><?php echo $value['cod_ibge'] ?></td>
                          <td><?php echo $value['nome'] ?></td>
                          <td><?php echo $value['cpf'] ?></td>
                          <td><?php echo $value['rg'] ?></td>
                          <td><?php echo $value['partido'] ?></td>
                          <td><?php echo $value['exercicio'] ?></td>
                          <td> 
                            <span class="d-flex">
                            <a href="<?php echo URL ?>View/PrefeitosEditar.php?cod_prefeito=<?php echo $value['cod_prefeito'] ?>&cod_ibge=<?php echo $value['cod_ibge'] ?>" 
                                class="btn btn-warning mr-1">
                                Editar
                              </a>
                              <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarPrefeitos.php?cod_prefeito=<?php echo $value['cod_prefeito'] ?>&cod_ibge=<?php echo $value['cod_ibge'] ?>')" class="btn btn-danger">Excluir</button> 
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
    <div class="modal fade cadastrar-prefeitos-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myPrefeitosModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myPrefeitosModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Prefeitos
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControlePrefeitos.php" method="post">

            <div class="modal-body">

                <!-- Input cod_prefeito -->
                <div class="form-row">

                  <!-- Codigo ibge é o codigo do Municipio -->
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_ibge" class="col-form-label">Código IBGE:</label>
                    <select name="cod_ibge" class="form-control" id="recipient-cod_ibge">
                      <option value="">Selecionar municipio</option>
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
                    <label for="recipient-nome" class="col-form-label">Nome:</label>
                    <input 
                      name="nome"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength=""
                      id="recipient-nome">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cpf" class="col-form-label">CPF:</label>
                    <input 
                      name="cpf"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-uf">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-rg" class="col-form-label">RG:</label>
                    <input 
                      name="rg"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-rg">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-partido" class="col-form-label">Partido:</label>
                    <input 
                      name="partido"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-partido">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-exercicio" class="col-form-label">Exercicio:</label>
                    <input 
                      name="exercicio"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="" 
                      id="recipient-exercicio">
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