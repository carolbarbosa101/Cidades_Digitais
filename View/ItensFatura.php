<?php
  include_once("_cabecalho.php");

  // Buscar todos os cadastros no banco
  require_once("../Controller/ControleListarItensFatura.php");
  require_once("../Controller/ControleFaturaSelect.php");
  require_once("../Controller/ControleEmpenhoSelect.php");
  require_once("../Controller/ControleItensSelect.php");
  require_once("../Controller/ControleTipoItemSelect.php");
  require_once("../Controller/ControleQuantidadeFaturaSelect.php");
  // var_dump($array_selectAjuda);
  // die();
  ?>

  <!-- Conteudo -->
  <main id="main">

      <div class="row mb-5">
        <div id="mainHeader" class="col-md-6 d-flex align-items-center">
          <span id="mainHeaderIcon">
          <i class="fas fa-globe-asia"></i>
          </span>
          <span>
            <h3 class="mb-0">Itens Fatura</h3>
            <small>Descrição</small>
          </span>
        </div>
        <div class="col-md-6 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cadastrar-itensfatura-modal-lg">
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
                      <a href="<?= URL . 'View/'?>ItensFatura.php" class="btn btn-warning ml-1">Limpar</a>
                  </form>
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
                    <th scope="col">Nota Fiscal</th>
                    <th scope="col">Municipio - IBGE</th>
                    <th scope="col">Cód. Empenho</th>
                    <th scope="col">Item</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                //var_dump($array_dados);
                //die();
                if($pgs > 1 ) {
                  foreach ($array_dados as $key => $value) {
                      ?>
                      <tr>
                        <td><?php echo $value['num_nf'] ?></td>
                        <td><?php echo $value['municipioIbge'] ?></td>
                        <td><?php echo $value['cod_empenho'] ?></td>
                        <td><?php echo $value['descricaoItem'] ?></td>
                        <td><?php echo $value['valor'] ?></td>
                        <td><?php echo $value['quantidade'] ?></td>
                        <td> 
                          <span class="d-flex">
                          <a href="<?php echo URL ?>View/ItensFaturaEditar.php?num_nf=<?php echo $value['num_nf'] ?>&cod_ibge=<?php echo $value['cod_ibge'] ?>&id_empenho=<?php echo $value['id_empenho'] ?>&cod_item=<?php echo $value['cod_item'] ?>&cod_tipo_item=<?php echo $value['cod_tipo_item'] ?>" class="btn btn-warning mr-1"> Editar
                          </a>
                          <button onclick="apagarDados('<?php echo URL ?>Controller/ControleApagarItensFatura.php?num_nf=<?php echo $value['num_nf'] ?>&cod_ibge=<?php echo $value['cod_ibge'] ?>&id_empenho=<?php echo $value['id_empenho'] ?>&cod_item=<?php echo $value['cod_item'] ?>&cod_tipo_item=<?php echo $value['cod_tipo_item'] ?>')" class="btn btn-danger">Excluir</button> 
                          </span>
                        </td>

                      </tr>
                      <?php
                    }
                  }
                  echo "<center>";
                  // Mostragem de pagina
                  if($menos > 0) {
                    echo "<a href=".$_SERVER['PHP_SELF']."?pagina=$menos>Anterior</a> |  ";
                  }
                  // Listando as paginas
                  for($i=1;$i <= $pgs;$i++) {
                      if($i != $pagina) {
                          echo " <a style='text-align:center' href=".$_SERVER['PHP_SELF']."?pagina=".($i).">$i</a> | ";
                      } else {
                          echo " <strong>".$i."</strong> | ";
                      }
                  }
                  if($mais <= $pgs) {
                      echo " <a href=".$_SERVER['PHP_SELF']."?pagina=$mais>Próxima</a>";
                  }

                  echo "</center>";  
                  echo "<br>";  
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

  </main>

  <!-- Modal de Cadastro -->
  <div class="modal fade cadastrar-itensfatura-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myItensFaturaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="myItensFaturaModalLabel">
            <i class="far fa-plus-square"></i>
            Cadastrar Itens da Fatura
          </h5>
        </div>

        <!-- FORMULARIO -->
        <form action="../Controller/ControleItensFatura.php" method="post">

          <div class="modal-body">

            <!-- Input cod_lote -->
            <div class="form-row">

            <!-- <div class="form-group col-md-12">
                <label for="recipient-ajuda" class="col-form-label">Ajuda:</label>
                      <select name="ajuda" class="form-control" id="recipient-ajuda">
                      <option value="">Selecionar Ajuda</option>
                      <?php 
                        foreach($array_selectAjuda as $chave => $valor){
                          
                        ?>
                        <option value="<?= $valor['ajuda'] ?>"></option>
                        <?php 
                        }
                        
                      ?>
                      
                    </select>
              </div> -->
              
            <div class="form-group col-md-12">
                <label for="recipient-ajuda" class="col-form-label">Ajuda:</label>
                  <?php
                    echo "<select name='ajuda' class='form-control' id='recipient-ajuda'>";
                    foreach($array_selectFaturaAjuda as $chave => $valor){
                      $empenho = $valor[0];
                      $tipo = $valor[1];
                      $quantidade = $valor[2];
                    echo "<option>" . $empenho. " | ".$tipo. " | ".$quantidade. " Disponível" ."</option>";
                    }
                    echo "</select>";

                  ?>
              </div>

              <div class="form-group col-md-12">
                <label for="recipient-num_nf" class="col-form-label">Nota Fiscal:</label>
                      <select name="num_nf" class="form-control" id="recipient-num_nf">
                      <option value="">Selecionar Nota Fiscal</option>
                      <?php 
                        foreach($array_selectFatura as $chave => $valor){
                        ?>
                        <option value="<?= $valor['num_nf'] ?>"><?= $valor['num_nf'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
              </div>


              <div class="form-group col-md-12">
                <label for="recipient-cod_ibge" class="col-form-label">IBGE:</label>
                      <select name="cod_ibge" class="form-control" id="recipient-cod_ibge">
                      <option value="">Selecionar Código IBGE</option>
                      <?php 
                        foreach($array_selectFatura as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_ibge'] ?>"><?= $valor['itens'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
              </div>

           
              <div class="form-group col-md-12">
                <label for="recipient-id_empenho" class="col-form-label">Cód. Empenho:</label>
                      <select name="id_empenho" class="form-control" id="recipient-id_empenho">
                      <option value="">Selecionar Código do Empenho</option>
                      <?php 
                        foreach($array_selectEmpenho as $chave => $valor){
                        ?>
                        <option value="<?= $valor['id_empenho'] ?>"><?= $valor['cod_empenho'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
              </div>

              <div class="form-group col-md-12">
                <label for="recipient-cod_tipo_item" class="col-form-label">Cód. Tipo Item:</label>
                      <select name="cod_tipo_item" class="form-control" id="recipient-cod_tipo_item">
                      <option value="">Selecionar Tipo do Item</option>
                      <?php 
                        foreach($selectTipoItem as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_tipo_item'] ?>"><?= $valor['tipo'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
              </div>
             
              <div class="form-group col-md-12">
                <label for="recipient-cod_item" class="col-form-label">Cód. Item:</label>
                      <select name="cod_item" class="form-control" id="recipient-cod_item">
                      <option value="">Selecionar Item</option>
                      <?php 
                        foreach($array_selectItens as $chave => $valor){
                        ?>
                        <option value="<?= $valor['cod_item'] ?>"><?= $valor['item'] ?></option>
                        <?php 
                        }
                      ?>
                    </select>
              </div>
<!--            
              <div class="form-group col-md-12">
                <label for="recipient-valor" class="col-form-label">Valor:</label>
                <input
                name="valor"
                placeholder=""
                type="float"
                class="form-control"
                maxlength="12"
                id="recipient-valor">
              </div>

              <div class="form-group col-md-12">
                <label for="recipient-quantidade" class="col-form-label">Quantidade:</label>
                <input
                name="quantidade"
                placeholder=""
                type="number"
                class="form-control"
                maxlength=""
                id="recipient-quantidade">
              </div>
 -->
            </div>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">
                Cadastrar
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php
    // Rodape
    include_once('_rodape.php');
?>