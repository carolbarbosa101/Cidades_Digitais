<?php

define("URL", "http://172.25.117.58:88/Cidades_Digitais/");

  session_start();
  include_once("_menu.php");
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

    <!--Import materialize.css
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>-->


    <title>Cidades Digitais</title>
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #2362bd;">
      <div class="container">
        <div class="container">
          <div class="container">
            <div class="strong">
              <center><h1><strong><a href= "/Cidades_Digitais/View/Home.php" ><font color="white">Cidades Digitais&nbsp&nbsp</font><img style="width: 6%;" src="/Cidades_Digitais/View/css/mcticLogo.png" alt="MCTIC" class="center"></img></a></strong></h1></center>
            </div>
          </div>
        </div>
      </div>
    </nav>
    

    
    <style>
      iframe {
      width: 100% !important;
      height: 90vh !important;
      }
    </style>
  </head>
  <body>
  
    <!-- Cabeçalho <span class="glyphicon glyphicon-menu-hamburger" style="font-size:40px;cursor:pointer" onclick="openNav()">&nbsp&#9776; </span>-->
    <header id="header">
    <div>
        <button class="w3-button w3-white w3-xxlarge" onclick="w3_open()">&#9776;</button>
       </div>
      <!-- Menu de navegação -->
      <?php 
      
      //header("Content-Type: text/html; charset=ISO-8859-1",true);
      
      ?>
      
    </header>
    
    