    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
    <script>
  swal("<?php echo $_SESSION['status']?>", "", "<?php echo $_SESSION['status_code']?>");

</script>

    <?php
  Unset($_SESSION['status']);
}
 
 ?>
  
  
  </body>
</html>