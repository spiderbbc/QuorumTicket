
<!DOCTYPE html>
<html lang="es-VE">
  <title>Crear Ticket</title>
  <?php include_once 'templates/header.php' ?>

<body>


   <div class="container">
    <?php include_once 'templates/nav-bar.php'; ?>
   </div>



  <div class="container-fluid">

		<div class="blog-header">


        <!-- <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
               -->

      </div>

  <div class="row">

		<div class="col-sm-2"></div>
        <div class="col-sm-6 ">

          <div class="">
            <!-- <h2 class="blog-post-title">Sample blog post</h2>
            <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p> -->

            



          </div><!-- /.blog-post -->



        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <?php #var_dump($perfil) ?>
            <div class="well">
              
              

              <h4>Autor: Algun Autor</h4>
              <p>Departamento: <em>Algun departamento</em>.</p>
              <p>Cargo: <em>Algun Cargo</em>.</p>
              <p>Extencion: <em>Alguna extencion</em></p>

              
                  <!-- <p>
                    No hay datos del perfil
                  </p>
               -->

            </div>
          </div>

        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->





  </div>
  <!-- /.container-fluid -->


</body>
<?php include_once 'templates/footer.php' ?>
</html>
