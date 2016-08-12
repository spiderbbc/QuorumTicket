

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="/QTelecom/bower_components/sweetalert/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/QTelecom/bower_components/sweetalert/dist/sweetalert.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<h1 class="text-center"></h1>


		<div class="container">
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<form action="" method="POST" class="form-horizontal" role="form">
						<div class="form-group">
							<legend>Formulario de Registro</legend>
						</div>
				
						<?php # echo Input::get('token') ?>
						<?php if (!empty($errores)): ?>
						<?php $set = '';  ?>	
						<?php foreach ($errores as $error): ?>
							

						<?php $set .= "<li>{$error}</li> " ?>
							
			<!-- <div class="alert alert-info" role="alert"><?php echo $error ?></div> -->
							
						

						<?php endforeach ?>

						<script type="text/javascript">


						swal({
						  title: "Upps...",
						  text: "<ul><?php echo $set; ?></ul>",
						  html: true
						});

						</script>
						
						<?php endif ?>
				
						<div class="form-group">
							<div class="form-group">
								<label for="username" class="col-sm-4 control-label">Username:</label>
								<div class="col-sm-12">
									<input type="text" name="username" id="username" class="form-control" value="<?php echo Input::get('username') ?>" title="" autocomplete="off">
									
									

									<label for="email" class="control-label">Email:</label>
									<input type="email" name="email" id="email" class="form-control" value="" title="">

									<label for="password" class="control-label">Password:</label>
									<input type="password" name="password" id="password" class="form-control" title="">


									<label for="password_again" class=" control-label">Password de nuevo:</label>
									<input type="password" name="password_again" id="password" class="form-control"  title="">

									<input type="hidden" name="token" id="input" class="form-control" value="<?php echo Token::generate() ?>">

								</div>

								

							</div>
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</div>
				</form>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"></div>
		</div>
			</div>
			

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		
	</body>
</html>