<?php
//define("URL", "http://localhost:83/Cidades_Digitais/");
define("URL", "http://172.25.116.2:83/Cidades_Digitais/");
//define("URL", "http://localhost/Cidades_Digitais/");
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="<?php echo URL ?>View/css/estilos.css">

    <!-- Icones CSS -->
    <link rel="stylesheet" href="<?php echo URL ?>View/css/icones.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo URL ?>View/css/bootstrap.css">

    <title>Cidades Digitais</title>
    <style>
      iframe {
      width: 100% !important;
      height: 90vh !important;
      }
    </style>
  </head>
  <body>

  <div class="w-100">

    <!-- Cabeçalho -->
    <header id="header">
      <!-- Menu de navegação -->
      <?php include_once("_menu.php"); ?>
    </header>