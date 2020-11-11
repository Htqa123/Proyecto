
  <script>
      const base_url ="<?= base_url(); ?>";
  </script>


    <script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= media(); ?>/js/popper.min.js"></script>
    <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/main.js"></script>
    <script src="<?= media(); ?>/js/functions_admin.js"></script>
   
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/bootstrap-select.min.js"></script>
    
    <script src = " https : // use.fontawesome . com / 27fb4cb076.js"></script>
    
    
    <?php if($data['page_name'] == "productos") { ?>
       <script src="<?= media(); ?>/js/functions_productos.js"></script>
       <?php } ?>
    
       <?php if($data['page_name'] == "roles") { ?>
        <script src="<?= media(); ?>/js/functions_roles.js"></script>
       <?php } ?>
    
    
    <script src="<?= media(); ?>/js/functions_categorias.js"></script>
    
    <script src="<?= media(); ?>/js/functions_usuarios.js"></script>
      
    
    

  </body>
</html>