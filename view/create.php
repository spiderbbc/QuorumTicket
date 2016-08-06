
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

            <form action="" method="POST" class="form-horizontal" role="form">
              <div class="form-group">
                <?php if (isset($errores)): ?>
                  <?php foreach ($errores as $error): ?>
                      <legend><?php echo $error ?></legend>
                  <?php endforeach ?>
                <?php endif ?>
                 
               </div> 

               <label for="titulo">Asunto</label>
               <input type="text" name="titulo" id="titulo" class="form-control" value="" required="required" title="">

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

                <label for="email">Email:</label>
                <input class="form-control" type="text" placeholder="emails" id="email" name="email">

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
                <input type="hidden" name="token" value="<?php echo Token::generate() ?>">
                
            
                
            
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