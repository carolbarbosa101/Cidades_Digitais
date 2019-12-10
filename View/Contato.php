<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarContato.php");
    require_once("../Controller/ControleEntidadeSelect.php");
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
            <h3 class="mb-0">Contato</h3>
            <small>Descrição</small>
            </span>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-contato-modal-lg">
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
                      <th scope="col">Cód. Contato</th>
                      <th scope="col">CNPJ </th>
                      <th scope="col">Município </th>
                      <th scope="col">Nome </th>
                      <th scope="col">Email </th>
                      <th scope="col">Função </th>
                      <th scope="col">Ações </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                 //var_dump($array_dados);
                  //die();
                    foreach($array_dados as $key => $value) {
                        ?>
                        <tr>
                          <td><?php echo $value['cod_contato'] ?></td>
                          <td><?php echo $value['cnpj'] ?></td>
                          <td><?php echo $value['cod_ibge']?></td>
                          <td><?php echo $value['nome'] ?></td>
                          <td><?php echo $value['email'] ?></td>
                          <td><?php echo $value['funcao'] ?></td>
                          <td> 
                            <span class="d-flex">
                              <a href="<?php echo URL ?>View/ContatoEditar.php?cod_contato=<?php echo $value['cod_contato'] ?>" 
                                class="btn btn-warning mr-1">
                                Editar
                              </a>  
                              <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarContato.php?cod_contato=<?php echo $value['cod_contato'] ?>')" class="btn btn-danger">
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
    <div class="modal fade cadastrar-contato-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myContatoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myContatoModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Contato
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleContato.php" method="post">

            <div class="modal-body">

                <div class="form-row">

                  <div class="form-group col-md-12">
                    <label for="recipient-cnpj" class="col-form-label">CNPJ</label>
                    <select name="cnpj" class="form-control" id="recipient-cnpj">
                      <option value="">Selecionar Entidade</option>
                      <option value="0" selected >Em branco</option>
                      <?php 
                        foreach($array_selectEntidade as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cnpj'] ?>"><?= $valor['nome'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
                  </div>
                
                  <div class="form-group col-md-12">
                    <label for="recipient-cod_ibge" class="col-form-label">Código IBGE:</label>
                    <select name="cod_ibge" class="form-control" id="recipient-cod_ibge">
                      <option value="">Selecionar Município</option>
                      <option value="0" selected>Em branco</option>
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
                      ]maxlength="50"
                      id="recipient-nome">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-email" class="col-form-label">Email:</label>
                    <input 
                      name="email"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="100"
                      id="recipient-email">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-funcao" class="col-form-label">Função:</label>
                    <input 
                      name="funcao"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      ]maxlength="45"
                      id="recipient-funcao">
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