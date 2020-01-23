<html><br><br><br><br>
<style>
.cor-footer {
  position: fixed;
  background-color: #2362bd;
  left: 0;
  bottom: 0;
  width: 100%;
  color: white;
  text-align: center;
}
</style>

    <!-- Rodape -->
    <footer class="cor-footer page-footer font-small blue lighten-3 pt-4" id="footer">
      <!-- Footer Elements -->
  <div class="container">

<!--Grid row-->
<div class="row">

  <!--Grid column-->
  <div class="col-lg-4 ">

    <!--Image-->
    <div class="view overlay z-depth-1-half">
      <img src="http://www.mctic.gov.br/mctic/export/sites/institucional/arquivos/pictogramas/logo_mctic_horizontal_cor_gradiente_OLD.jpg" width="1000" height="1000" class="img-fluid"
        alt="">
      <a href="">
        <div class="mask rgba-white-light"></div>
      </a>
    </div>

  </div>
  <!--Grid column-->

</div>
<!--Grid row-->

</div>
<!-- Footer Elements -->

<!-- Copyright -->
<div class="footer-copyright py-3 col-lg-2"><font color="white">© 2019 Copyright</font></div>
<!-- Copyright -->
    </footer>
</div>
    <!-- JavaScript (Opcional) -->
    <script>
      function apagarDados(linkApagar) {
        var r = confirm("Deseja realmente excluir?");
        if (r == true) {
          window.location.href=linkApagar;
          console.log(linkApagar);
        }
      }
    </script>
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="<?php echo URL ?>View/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo URL ?>View/js/popper.min.js"></script>
    <script src="<?php echo URL ?>View/js/bootstrap.js"></script>
    
  </body>
  </div>

</html>