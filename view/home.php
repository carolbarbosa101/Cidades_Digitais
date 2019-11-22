<?php
    // cabeçalho
    include_once("_cabecalho.php");
    ?>
    
   
    <main id="main">

        <div class="row mb-2">
          <div id="mainHeader" class="col-md-6 d-flex align-items-center">
            <span id="mainHeaderIcon">
              <i class="fas fa-columns"></i>
            </span>
            <span>
              <h3 class="mb-0">Painel de Controle</h3>
            </span>
          </div>
        </div>

        <div class="row">
        
          <p onclick="carregar('')"></p>
        </div>
        <div>
    <iframe src="https://app.powerbi.com/view?r=eyJrIjoiYjVlMmZmZmEtYmExOS00NTlmLWIxMjYtYjMxMzFmZWJiZDY0IiwidCI6Ijg4MGRkN2YxLWQwMmMtNGUxOS04MTVmLTQ2NDlkMzNmNWM2MyJ9" scrolling="no" frameborder="no"></iframe>
    </div>

    </main>

    <?php
    // Rodape
    include_once('_rodape.php');
    
?>
<script>
  function carregar(pagina){
    $('#conteudoExterno').load(pagina)
  }
</script>