<?php
  $arrayMenu = [
    "Home" => '<i class="fas fa-columns"></i>',
    "Assunto" =>'<i class="fas fa-book-open"></i>',
    "Categoria" => '<i class="fas fa-globe-asia"></i>',
    "Cd" =>'<i class="fas fa-wifi"></i>',
    "CdItens"=> '<i class="fas fa-sliders-h"></i>',
    "Contato" => '<i class="far fa-address-book"></i>',
    "Entidade" => '<i class="fas fa-boxes"></i>',
    "Etapa" => '<i class="fas fa-align-justify"></i>',
    "Lote" =>'<i class="fas fa-clone"></i>',
    "LoteItens" =>'<i class="fas fa-clone"></i>',
    "Municipios" => '<i class="fas fa-globe-asia"></i>',
    "Pid"=> '<i class="fas fa-sliders-h"></i>',
    "Prefeitos"=> '<i class="fas fa-sliders-h"></i>',
    "PrevisaoEmpenho"=> '<i class="fas fa-sliders-h"></i>',
    "Processo"=> '<i class="fas fa-sliders-h"></i>',
    "Reajuste"=> '<i class="fas fa-sliders-h"></i>',
    "Telefone"=> '<i class="fas fa-sliders-h"></i>',
    "Tipologia"=> '<i class="fas fa-sliders-h"></i>',
    "TipologiaPid"=> '<i class="fas fa-sliders-h"></i>',
    "Tipologia"=> '<i class="fas fa-sliders-h"></i>',
    "Uacom"=> '<i class="fas fa-sliders-h"></i>',
    "Usuario"=> '<i class="fas fa-sliders-h"></i>'

  ];

  //echo $_SERVER['REQUEST_URI'];
  $url = explode('/', $_SERVER['REQUEST_URI']);
  //var_dump($url);
  $paginaAtual = $url[count($url)-1];
  $paginaAtual = str_replace('.php', '', $paginaAtual);
  //echo $paginaAtual;
?>

<nav>

  <?php
    // Laço de repetição para exibir menu
    foreach($arrayMenu as $menu => $icone) {
      // verificar qual a página atual e selecionar menu como ativo
      if (strtoupper($menu) == strtoupper($paginaAtual)){
        $active = "active";
      } else {
        $active = "";
      }
      ?>

      <a href="<?php echo URL . "View/{$menu}.php" ?>" class="<?php echo $active ?>">
        <span>
          <?php echo $icone ?>
        </span>
        <strong>
          <?php echo $menu ?>
        </strong>
      </a>

      <?php
    }
  ?>

</nav>