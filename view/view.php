
<!DOCTYPE html>
<html lang="es-VE" ng-app="postApp">
  <title>Ver Ticket!!</title>
<link rel="stylesheet" href="/QTelecom/static/css/chat.css" media="screen" title="no title" charset="utf-8">

<link rel="stylesheet" type="text/css" href="/QTelecom/static/css/prism.css">
<link rel="stylesheet" type="text/css" href="/QTelecom/static/css/chosen.css">
  <?php include_once 'templates/header.php' ?>

<body ng-controller="postController">

  <script type="text/javascript">
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
  })
  </script>
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

                  <section>
                    <div class="chat">
                      <ul>
                        <?php if ($perfil->data()[0]->nombre == $value->nombre): ?>
                          <li class="you">
                        <?php else: ?>
                          <li class="other">
                        <?php endif; ?>

                              <a class="user" href="#"><img alt="" src="/QTelecom/static/img/perfil/<?php  echo $value->img; ?>" /></a>
                              <div class="date">

                                <?php echo $value->fecha ?>
                              </div>
                              <?php if ($hiden): ?>
                                <div class="message blur">
                              <?php else: ?>
                                <div class="message">
                              <?php endif; ?>





                                <div class="hider">
                                  <span><button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">
                                    Solicitar ver el ticket
                                  </button>
                                    </span><!-- futura version -->
                                </div>
                                <p>
                                  <span>Nombre: <?php echo $value->nombre ?></span><br>
                                  <span>Departamento: <?php echo $value->departamento ?></span><br>
                                  <span>Cargo: <?php echo $value->cargo ?></span><br>
                                  <span>Ext: <?php echo $value->extencion ?></span><br>
                                <?php echo $value->mensaje ?>
                                </p>
                              </div>
                            </li>
                      </ul>
                    </div>
                  </section>




                <?php endforeach; ?>
              <?php else: ?>
                <div class="well">
                    <p>
                      Nadie a Comentado este Ticket ..

                    </p>
                    <?php if ($hiden): ?>
                      <div class="col-md-9 col-md-offset-4">
                        <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">
                          Solicitar Unirme al Ticket
                        </button>
                      </div>
                    <?php endif; ?>
                </div>
              <?php endif; ?>


            </div>


        <?php if (!$hiden): ?>
            <center><button type="button" class="btn btn-default" ng-click="ShowForm()" ng-hide="FormVisibility">Responder</button></center>
        <?php endif; ?>

          <div class="row" ng-show="FormVisibility">
            <form action="" method="POST" class="form-horizontal" role="form" ng-submit="submitForm()">
              <label for="email">Email:</label><br>
              <select data-placeholder="Usuarios a involucrar en el ticket" style="width:650px;" id="email" name="email[]" class="chosen-select" multiple="multiple" >
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
              <br>
              <br>

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
          <div class="sidebar-module sidebar-module-inset" style="position: fixed">
            <?php #var_dump($perfil) ?>
            <div class="well">

              <?php if ($perfilInfo): ?>
                <div class="row">
                    <div class="col-md-12"><span class="pull-right"><img src="/QTelecom/static/img/perfil/<?php echo $perfil->data()[0]->img; ?>" alt="" class="img-circle"  width="40" height="40"/></span></div>
                </div>

              <h4>Autor: <?php echo $perfil->data()[0]->nombre;  ?></h4>

              <p>Departamento: <em><?php echo $perfil->data()[0]->departamento;?></em>.</p>
              <p>Cargo: <em><?php echo $perfil->data()[0]->cargo;?></em>.</p>
              <p>Extencion: <em><?php echo $perfil->data()[0]->extencion; ?></em></p>

              <?php else: ?>
                  <p>
                    No hay datos del perfil
                  </p>
              <?php endif; ?>

              <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">

                  <?php if (!$hiden): ?>
                    <?php if ($requestVal[0]->id_status == 1): ?>
                        <a href="?accion=status&valor=<?php echo $requestVal[0]->uuid ?>" type="submit" class="btn btn-danger" name="button" href="someplace.php">Cerrar</a>
                    <?php else: ?>
                          <a href="?accion=status&valor=<?php echo $requestVal[0]->uuid ?>" type="submit" class="btn btn-info" name="button">Abrir</a>
                    <?php endif; ?>
                  <?php endif; ?>


                </div>
              </div>



            </div>
          </div>

        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Solicitud para unirme al ticket</h4>
            </div>
            <div class="modal-body">
              Mediante a esta solicitud se le enviara un correo electronico al autor del ticket en la cual puede aceptar o rechazar tu solicitud<br>
              <br>
               Titulo:  <?php echo $requestVal[0]->titulo ?> <br>
               Autor: <?php echo $perfil->data()[0]->nombre;  ?><br>
               Departamento: <em><?php echo $perfil->data()[0]->departamento;?></em>.<br>
               Cargo: <em><?php echo $perfil->data()[0]->cargo;?></em>.<br>
               Extencion: <em><?php echo $perfil->data()[0]->extencion; ?></em>

            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-danger" data-dismiss="modal">No gracias!!</a>
              <a href="#" class="btn btn-primary">Enviar la Solicitud</a>

            </div>
          </div>
        </div>
      </div>



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
