
<!DOCTYPE html>
<html lang="es-VE" ng-app="postApp">
  <title>Ver Ticket</title>
  <?php include_once 'templates/header.php' ?>

<body ng-controller="postController">


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
           <h2 class="blog-post-title"><?php echo $requestVal[0]->titulo ?></h2>
           <p class="blog-post-meta"><?php echo strftime("%A, %d de %B de %Y %H:%M",strtotime($requestVal[0]->date_update)) ?><a href="#"> <?php echo $perfil->data()[0]->nombre;  ?></a></p>
  <?php  ?>

              <?php echo $requestVal[0]->msg ?>

          <br>
              <br>
            <div class="row">

              <?php if ($respuestas): ?>
                <?php foreach ($resp->data() as $key => $value): ?>

                  <div class="well well-sm">
                    <span>Nombre: <?php echo $value->nombre ?></span><br>
                    <span>Departamento: <?php echo $value->departamento ?></span><br>
                    <span>Cargo: <?php echo $value->cargo ?></span><br>
                    <span>Ext: <?php echo $value->extencion ?></span><br>
                    <span>Fecha: <?php echo $value->fecha ?></span><br>

                    
                    <p>
                      <?php echo $value->mensaje ?>
                    </p>
                  </div>

                <?php endforeach; ?>
              <?php else: ?>
                <div class="well">
                    <p>
                      Nadie a Comentado este Ticket ..
                    </p>
                </div>
              <?php endif; ?>


            </div>


          <center><button type="button" class="btn btn-default" ng-click="ShowForm()" ng-hide="FormVisibility">Responder</button></center>

          <div class="row" ng-show="FormVisibility">
            <form action="" method="POST" class="form-horizontal" role="form" ng-submit="submitForm()">

            <label for="msg">Texto</label>
                <textarea class="form-control" name="msg" id="msg" rows="10" cols="80" wrap="hard">

                </textarea>
                <script>
                    // Instancia para el CKEditor
                    CKEDITOR.replace( 'msg', {

                    language: 'es',
                    uiColor: '#9AB8F3',
                    customConfig: '/QTelecom/static/js/ckeditor_config.js',


                });
                </script>

          <input type="hidden" name="token" id="inputToken" class="form-control" value="<?php echo $token ?>">
              <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-lg btn-primary btn-block" type="submit" value="Entrar">
                    Responder</button>
                  </div>
              </div>
          </form>

          </div>

            </div><!-- /.blog-post -->



        </div><!-- /.blog-main -->

       <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <?php #var_dump($perfil) ?>
            <div class="well">
              <?php if ($perfilInfo): ?>


              <h4>Autor: <?php echo $perfil->data()[0]->nombre;  ?></h4>
              <p>Departamento: <em><?php echo $perfil->data()[0]->departamento;?></em>.</p>
              <p>Cargo: <em><?php echo $perfil->data()[0]->cargo;?></em>.</p>
              <p>Extencion: <em><?php echo $perfil->data()[0]->extencion; ?></em></p>

              <?php else: ?>
                  <p>
                    No hay datos del perfil
                  </p>
              <?php endif; ?>
            </div>
          </div>

        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->





  </div>
  <!-- /.container-fluid -->


</body>
<?php include_once 'templates/footer.php' ?>
</html>
