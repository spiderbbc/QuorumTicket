

<!DOCTYPE html>
<html lang="es-VE">
  <title>Mi Perfil</title>
  <?php include_once 'templates/header.php' ?>
  <link rel="stylesheet" href="/QTelecom/static/css/card.css" media="screen" title="no title" charset="utf-8">
<body>
  <div class="container">
   <?php include_once 'templates/nav-bar.php'; ?>
 </div>
<style media="screen">

</style>

 <div class="row center">

   <div class="col-sm-2"></div>
       <div class="col-sm-6 ">

         <div class="col-sm-8">
           <!-- <h2 class="blog-post-title">Sample blog post</h2>
           <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p> -->

  <div class="card">
   <img class="img-circle foto" src="/QTelecom/static/img/perfil/T.png" alt="Card image cap">
  <div class="card-block">
    <!-- <h4 class="card-title"><label for="username">Username:</label></h4> -->


      <label for="username" class="col-sm control-label">Username:</label>
      <div class="well well-sm">
        <?php echo $user->data()->username ?>
      </div>

      <label for="nombre" class="col-sm control-label">Nombre:</label>
      <div class="well well-sm">
        <?php echo $perfil->data()[0]->nombre ?>
      </div>


      <label for="contraseña" class="col-sm control-label">Contraseña Actual:</label>
      <div class="well well-sm">
        ************
      </div>

      <label for="departamento" class="col-sm control-label">Departamento:</label>
      <div class="well well-sm">
        <?php echo $perfil->data()[0]->departamento;?>
      </div>
      <label for="cargo" class="col-sm control-label">Cargo:</label>
      <div class="well well-sm">
        <?php echo $perfil->data()[0]->cargo;?>
      </div>
      <label for="extencion" class="col-sm control-label">Extencion:</label>
      <div class="well well-sm">
        <?php echo $perfil->data()[0]->extencion;?>
      </div>
      <br>
      <a href="?accion=perfilupdate" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>



    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->

  </div>
</div>


         </div><!-- /.blog-post -->



       </div><!-- /.blog-main -->



     </div><!-- /.row -->





  </body>
</html>
