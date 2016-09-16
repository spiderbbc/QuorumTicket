

<!DOCTYPE html>
<html lang="es-VE">
  <title>Mi Perfil</title>
  <?php include_once 'templates/header.php' ?>
  <link rel="stylesheet" href="/QTelecom/static/css/card.css" media="screen" title="no title" charset="utf-8">
  <script src="/QTelecom/bower_components/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/QTelecom/bower_components/sweetalert/dist/sweetalert.css">
<body>
  <div class="container">
   <?php include_once 'templates/nav-bar.php'; ?>
 </div>
<style media="screen">

</style>

 <div class="row center">

   <div class="msg-error">
     <?php #print_r($errors); ?>
     <?php if (isset($errors)): ?>
           <?php $set = '';  ?>
           <?php foreach ($errors as $msg => $error): ?>

              <?php $set.= "<li>{$error}</li> " ?>

           <?php endforeach; ?>

           <script type="text/javascript">


           swal({
             title: "Upps...",
             text: "<ul><?php echo $set; ?></ul>",
             html: true
           });

           </script>


     <?php endif; ?>
   </div>

   <div class="col-sm-2"></div>

       <div class="col-sm-6 ">

         <div class="col-sm-8">
           <!-- <h2 class="blog-post-title">Sample blog post</h2>
           <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p> -->

  <div class="card">
   <img class="img-circle foto" src="/QTelecom/static/img/perfil/<?php echo $perfil->data()[0]->img  ?>" alt="Card image cap">
  <div class="card-block">
    <!-- <h4 class="card-title"><label for="username">Username:</label></h4> -->


    <form class="" action="?accion=perfilupdate" method="post">

    <!--  <label for="username" class="col-sm control-label">Username:</label>
      <input type="text" name="username" value="<?php # echo $user->data()->username ?>" placeholder="Ingrese su Username">
 -->
      <label for="nombre" class="col-sm control-label">Nombre:</label>
      <input type="text" name="nombre" value="<?php echo $perfil->data()[0]->nombre ?>" placeholder="Ingrese su nombre">

      <label for="contraseña" class="col-sm control-label">Contraseña Actual:</label>
      <input type="password" name="contraseña" value="">

      <label for="password" class="col-sm control-label">Nueva Contraseña:</label>
      <input type="password" name="password" value="">

      <label for="password_again" class="col-sm control-label">Confirmar Contraseña:</label>
      <input type="password" name="password_again" value="">

      <label for="id_departamento" class="col-sm control-label">Departamento:</label>
      <select  class="form-control" name="id_departamento">
        <!-- departamentos -->

       <?php foreach ($datos['departamentos'] as $key => $value): ?>

         <option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>

       <?php endforeach ?>
     </select>
      <label for="cargo" class="col-sm control-label">Cargo:</label>
      <input type="text" name="cargo" value="<?php echo $perfil->data()[0]->cargo;?>" placeholder="Ingresa tu cargo o ocupacion">
      <label for="extencion" class="col-sm control-label">Extencion:</label>
      <input type="text" name="extencion" value="<?php echo $perfil->data()[0]->extencion;?>" placeholder="Ingresa tu extencion ...">
      <br>
      <input type="hidden" name="token" value="<?php echo $token ?>">
      <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span></button>


    </form>


    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->

  </div>
</div>


         </div><!-- /.blog-post -->



       </div><!-- /.blog-main -->



     </div><!-- /.row -->





  </body>
</html>
