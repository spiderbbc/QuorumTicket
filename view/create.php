
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
            <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>
             -->

            <form action="" method="POST" class="form-horizontal" role="form">
               <!-- <div class="form-group">
                 <legend>Form title</legend>
               </div> -->

               <label for="titulo">Asunto</label>
               <input type="text" name="titulo" id="titulo" class="form-control" value="" required="required" pattern="" title="">

               <br>
                                <label for="servicios">Servicios</label>
                               
                                <select  class="form-control" name="servicios" id="servicios">
                                    <option value="0">Internet/Redes</option>
                                    <option value="1">Telefonia/Mensajeria</option>
                        
                                </select>
                <br>  

                <label for="">Gravedad</label>
                               
                                <select  class="form-control" name="gravedad">
                                    <option value="0">Un problema menor</option>
                                    <option value="1">Algunos servicios no estan disponibles</option>

                                    <option value="2">No hay Servicios</option>
                        
                                </select>
                <br>    
                                 <label for="">Impacto(Afectados)</label>
                               
                                <select  class="form-control" name="impacto">
                                    <option value="0">No hay usuarios afectados</option>
                                    <option value="1">Algunos usuarios(sistema/finales)</option>

                                    <option value="2">Todos los Usuarios</option>
                        
                                </select>
                <br>

                                <label for="inputEmail">Email:</label>
                <input class="form-control" type="text" placeholder="emails" id="email_field_id" name="email_field">

                <label for="inputText">Texto</label>
                <textarea class="form-control" name="msg" id="crear" rows="10" cols="80" wrap="hard" >
                    
                </textarea>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    
                    CKEDITOR.replace( 'msg', {
                    language: 'es',
                    uiColor: '#9AB8F3',
                    customConfig: '/QTelecom/static/js/ckeditor_config.js'

                   
                });

                



                </script>
                <input type="hidden" name="responder" value="si">
                
            
                
            
                <div class="form-group">
                  <div class="col-sm-12">
                    <button class="btn btn-lg btn-primary btn-block" type="submit" value="Entrar">
                    Crear Ticket</button>
                  </div>
                </div>
            </form>



            
          </div><!-- /.blog-post -->

          
          
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">

            <div class="well">
              <h4>Autor: <?php echo $perfil->data()[0]->nombre;  ?></h4>
            <p>Departamento: <em><?php echo $perfil->data()[0]->departamento;?></em>.</p>
            <p>Cargo: <em><?php echo $perfil->data()[0]->cargo;?></em>.</p>
            <p>Extencion: <em><?php echo $perfil->data()[0]->extencion; ?></em></p>
         
            </div>
          </div>
          
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->




		
  </div>
  <!-- /.container-fluid -->
       

</body>
<?php include_once 'templates/footer.php' ?>
</html>