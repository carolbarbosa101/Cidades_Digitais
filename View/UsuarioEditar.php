<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleUsuarioVizualizar.php");
    //require_once("../Controller/ControleEntidadeSelect.php");
    //require_once("../Controller/ControleCdSelect.php");
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
              <h3 class="mb-0">Editar Usuario</h3>
            </span>
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

          <?php 
            if(!empty($array_dados)){

              extract($array_dados);
          ?>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleUsuarioEditar.php" method="post">

            <div class="modal-body">

                  <!-- Chave primaria para saber qual registro editar do banco | input hidden para que o usuario não visualize -->
                  <input name="cod_usuario" type="hidden" value="<?php echo $cod_usuario ?>"/>

                  <div class="form-group col-md-12">
                    <label for="recipient-cod_usuario" class="col-form-label">Codigo Usuário:</label>
                    <input disabled 
                      value="<?php echo $cod_usuario ?>"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="255" 
                      id="recipient-cod_usuario">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-nome" class="col-form-label">Nome:</label>
                    <input 
                      value="<?php echo $nome ?>"
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
                      value="<?php echo $email ?>"
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
                      value="<?php echo $status ?>"
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
                      value="<?php echo $login ?>"
                      name="login"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45" 
                      id="recipient-login">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="recipient-senha" class="col-form-label">Senha:</label>
                    <input 
                      value="<?php echo $senha ?>"
                      name="senha"
                      placeholder=""
                      type="text" 
                      class="form-control"
                      maxlength="45" 
                      id="recipient-senha">
                  </div>
                </div>

            </div>

            <div class="modal-footer">
              <a href="<?php echo URL ?>View/Usuario.php" class="btn btn-secondary">Cancelar</a>
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
    <div class="modal fade cadastrar-contato-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myUsuarioModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="myUsuarioModalLabel">
              <i class="far fa-plus-square"></i>
              Cadastrar Usuario
            </h5>
          </div>

          <!-- FORMULARIO -->
          <form action="../Controller/ControleUsuarioEditar.php" method="post">

            <div class="modal-body">
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