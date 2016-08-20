

<!DOCTYPE html>
<html lang="es-VE">
  <title>Title Page</title>
	<?php include_once 'templates/header.php' ?>


	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
      $('#example').DataTable( {

         "order": [[ 6, "desc" ]],

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

        <?php if (!$ticket->listar()->error()): ?>

          <!-- recorremos ticket -->
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

        <?php foreach ($ticket->listar()->data() as $key => $value): ?>
        <tr>

        <td><?php echo $value->numero ?>
        <a class="btn btn-default btn-xs" href="/QTelecom/?accion=ver&valor=<?php echo $value->uuid ?>" role="button">Ingresar</a>
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


        <?php else: ?>
          <div class="well">
            <p class="text text-central">No hay Tickets en estos momentos</p>
          </div>
        <?php endif ?>





	    </div> <!-- /container -->

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>


 		</body>
    <?php include_once 'templates/footer.php' ?>
</html>
