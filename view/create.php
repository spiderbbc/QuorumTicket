
<!DOCTYPE html>
<html lang="es-VE">
  <title>Crear Ticket</title>
  	<link rel="stylesheet" type="text/css" href="/QTelecom/static/css/style.css">
    <link rel="stylesheet" type="text/css" href="/QTelecom/static/css/prism.css">
    <link rel="stylesheet" type="text/css" href="/QTelecom/static/css/chosen.css">
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

            <form action="" method="POST" class="form-horizontal" role="form">
              <div class="form-group">
                <?php if (isset($errores)): ?>
                  <?php foreach ($errores as $error): ?>
                      <legend><?php echo $error ?></legend>
                  <?php endforeach ?>
                <?php endif ?>

               </div>

               <label for="titulo">Asunto</label>
               <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo Input::get('titulo') ?>" required="required" title="">

               <br>
                                <label for="servicios">Servicios</label>

                    <select  class="form-control" name="servicios" id="servicios">
                                                <!-- servicios -->
                                   <?php foreach ($datos['servicios'] as $key => $value): ?>

                                    <option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>


                                   <?php endforeach ?>


                    </select>
                <br>

                <label for="">Gravedad</label>

                    <select  class="form-control" name="gravedad">
                                            <!-- gravedad -->
                                  <?php foreach ($datos['gravedad'] as $key => $value): ?>

                                    <option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>

                                  <?php endforeach ?>

                    </select>
                <br>
                <label for="">Impacto(Afectados)</label>

                    <select  class="form-control" name="impacto">
                                         <!-- afectado -->
                                  <?php foreach ($datos['afectado'] as $key => $value): ?>

                                    <option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>

                                  <?php endforeach ?>

                    </select>
                <br>

                <label for="email">Email:</label><br>
                <!--
                <input class="form-control" type="text" placeholder="emails" id="email" name="email" value="<?php echo Input::get('email') ?>">
              -->

                <select data-placeholder="Usuarios a involucrar en el ticket" style="width:600px;" id="email" name="email[]" class="chosen-select" multiple="multiple" required>
                  <option value=""></option>
                  <optgroup label="Quorum Ticket Usuarios registrados:">

                    <?php for ($i = 0; $i < count($email_user_form); $i++): ?>
                      <option value="<?php echo $email_user_form[$i]->email ?>"><?php echo $email_user_form[$i]->nombre ?></option>
                    <?php endfor; ?>

                <!--    <option value="spiderbbc@gmail.com">Eduardo Morales</option>
                    <option value="Jhonathan@gmail.com">Jhonathan Herrera</option>
                    <option value="Thais@gmail.com">Thais Ravelo</option>
                    <option value="Yanethis@gmail.com">Yanethis Quintana</option> -->
                  </optgroup>

                </select>




                <label for="msg">Texto</label>
                <textarea class="form-control" name="msg" id="msg" rows="10" cols="80" wrap="hard" >

                </textarea>
                <script>
                    // Instancia para el CKEditor
                    CKEDITOR.replace( 'msg', {

                    language: 'es',
                    uiColor: '#9AB8F3',
                    customConfig: '/QTelecom/static/js/ckeditor_config.js',


                });
                </script>
                <input type="hidden" name="token" value="<?php echo $token ?>">




                <div class="form-group">
                  <div class="col-sm-12">
                    <button class="btn btn-lg btn-primary btn-block" type="submit" value="Entrar">
                    <span class="glyphicon glyphicon-send"></span> Enviar Ticket</button>
                  </div>
                </div>
            </form>




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


<!-- Chosen: para el cuadro email -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="/QTelecom/static/js/chosen.jquery.js" type="text/javascript"></script>
<script src="/QTelecom/static/js/prism.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
  var config = {
    '.chosen-select'           : {},
    '.chosen-select-deselect'  : {allow_single_deselect:true},
    '.chosen-select-no-single' : {disable_search_threshold:10},
    '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
    '.chosen-select-width'     : {width:"95%"}
  }
  for (var selector in config) {
    $(selector).chosen(config[selector]);
  }
</script>

</body>
<?php include_once 'templates/footer.php' ?>
</html>
