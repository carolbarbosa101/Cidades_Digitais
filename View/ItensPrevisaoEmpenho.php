<?php
    // Cabeçalho
    include_once("_cabecalho.php");

    // Buscar todos os cadastros no banco
    require_once("../Controller/ControleListarItensPrevisaoEmpenho.php");
    require_once("../Controller/ControleEmpenhoSelect.php");
    require_once("../Controller/ControleItensSelect.php");
    require_once("../Controller/ControleTipoItemSelect.php");
    require_once("../Controller/ControlePrevisaoEmpenhoSelect.php");
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
              <h3 class="mb-0">ItensPrevisaoEmpenho</h3>
              <small>Descrição</small>
            </span>
          </div>
          <div class="col-md-6 text-right">
            
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
                        <th scope="col">Previsão de Empenho</th>
                        <th scope="col">Item</th>
                        <th scope="col">Lote</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Quantidade</th>
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
                          <td><?php echo $value['cod_previsao_empenho'] ?></td>
                          <td><?php echo $value['itemLista'] ?></td>
                          <td><?php echo $value['cod_lote'] ?></td>
                          <td><?php echo $value['valor'] ?></td>
                          <td><?php echo $value['quantidade'] ?></td>
                          <td> 
                            <span class="d-flex">
                              <a href="<?php echo URL ?>View/ItensPrevisaoEmpenhoEditar.php?cod_previsao_empenho=<?php echo $value['cod_previsao_empenho'] ?>&cod_item=<?php echo $value['cod_item'] ?>&cod_tipo_item=<?php echo $value['cod_tipo_item'] ?>&cod_lote=<?php echo $value['cod_lote'] ?>" class="btn btn-warning mr-1">
                              Editar
                            </a> 
                            
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

    <?php
    // Rodape
    include_once('_rodape.php');
?>