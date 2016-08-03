

<!DOCTYPE html>
<html lang="es-VE">
	<?php include_once 'templates/header.php' ?>
	<script  type="text/javascript"src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
  
	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
      $('#example').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ Tickets por pagina",
            "sSearch":         "Buscar:",
            "zeroRecords": "Upps .. no hay resultados - lo sentimos :(",
            "info": "Mostrando pagina _PAGE_ of _PAGES_",
            "infoEmpty": "No hay Tickets Disponibles",
            "infoFiltered": "(filtrado para _MAX_ resultados en total )"
        }
    } );
} );
	</script>
	<body>

  <?php 

   /*foreach ($tickets->data() as $key => $value) {
     # code...
      var_dump($value->numero);
   };*/


   ?>

		<div class="container">

	      <?php include_once 'templates/nav-bar.php'; ?>

	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	        <!-- <h1>Navbar example</h1>
	        <p>This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
	        <p>
	          <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
	        </p>
	        	      </div> -->

	       <table id="example" class="display" cellspacing="0" width="100%"><thead>
      
        
          
        
      <tr>
        <th>Numero Ticket</th>
        <th>Asunto</th>
        <th>Status</th>
        <th>Autor</th>
        <th>Servicio</th>
        <th>Creado</th>
        <th>Actualizado</th>
      </tr>
    </thead>
    <tbody>
      
        <?php foreach ($tickets->data() as $key => $value): ?>
        <tr>

        <td><?php echo $value->numero ?>  
        <a class="btn btn-default btn-xs" href="/QTelecom/q-ver/v-<?php echo $value->numero ?>" role="button">Ingresar</a>
        </td>
        <td><?php echo $value->titulo ?></td>
        <td><?php echo $value->estatus ?></td>
        <td><?php echo $value->autor ?></td>
        <td><?php echo $value->servicios ?></td>
        <td><?php echo $value->creado ?></td>
        <td><?php echo $value->actualizado ?></td>
        </tr>
        <?php endforeach ?>
      
      
  </table>
	

	    </div> <!-- /container -->

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>
	    <?php include_once 'templates/footer.php' ?>

 		</body>
</html>
