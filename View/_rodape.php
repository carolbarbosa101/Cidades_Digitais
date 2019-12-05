
    <!-- Rodape -->
    <footer id="footer">
      <p>
        Cidades Digitais
      </p>
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
</html>