<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarUsuario.php");
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
              <h3 class="mb-0">Usuários</h3>
              <small>Descrição</small>
            </span>
          </div>
          <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-usuario-modal-lg">
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
                      <th scope="col">Código Usuário</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Email</th>
                      <th scope="col">Status</th>
                      <th scope="col">Login</th>
                      <th scope="col">Senha</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  //var_dump($array_dados);
                    foreach ($array_dados as $key => $value) {
                        ?>
                        <tr>

                          <td><?php echo $value['cod_usuario'] ?></td>
                          <td><?php echo $value['nome'] ?></td>
                          <td><?php echo $value['email'] ?></td>
                          <td><?php echo $value['status'] ?></td>
                          <td><?php echo $value['login'] ?></td>
                          <td><?php echo $value['senha'] ?></td>
                          <td> 
                            <span class="d-flex">
                            <a href="<?php echo URL ?>View/UsuarioEditar.php?cod_usuario=<?php echo $value['cod_usuario'] ?>" 
                                class="btn btn-warning mr-1">
                                Editar
                              </a> 
                              
                              <a href="<?php echo URL ?>Controller/ControleApagarUsuario.php?cod_usuario=<?php echo $value['cod_usuario'] ?>" class="btn btn-danger">Excluir</a> 
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
    <div class="modal fade cadastrar-usuario-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myUsuarioModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myUsuarioModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Usuário
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleUsuario.php" method="post">

            <div class="modal-body">

                <!-- Input cod_usuario -->
                <div class="form-row">
            

                  <div class="form-group col-md-12">
                    <label for="recipient-nome" class="col-form-label">Nome:</label>
                    <input 
                      name="nome"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="100" 
                      id="recipient-nome">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-email" class="col-form-label">Email:</label>
                    <input 
                      name="email"
                      placeholder=""
                      type="text" 
                      class="form-control"
					  maxlength="45" 
                      id="recipient-email">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-status" class="col-form-label">Status:</label>
                    <input 
                      name="status"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="1" 
                      id="recipient-status">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-login" class="col-form-label">Login:</label>
                    <input 
                      name="login"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45" 
                      id="recipient-login">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-cnpj" class="col-form-label">Senha:</label>
                    <input 
                      name="senha"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45" 
                      id="recipient-senha">
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
    </div>
    </div>

    <?php
    // Rodape
    include_once('_rodape.php');
?>