

<!DOCTYPE html>
<html lang="es-VE">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Recuperar la clave</title>
		<link rel="stylesheet" href="/QTelecom/static/css/login.css" media="screen" title="no title">
		<!-- Bootstrap CSS
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
-->
		<!-- SweetAlert -->
		<script src="/QTelecom/bower_components/sweetalert/dist/sweetalert.min.js"></script>


		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>








<div class="container">
<div id="login" class="signin-card">
  <div class="logo-image">
  <img src="/QTelecom/static/img/perfil/<?php echo $perfil->data()[0]->img ?>" alt="Logo" title="Logo" width="138">
  </div>
  <h1 class="display1">Hola!! <?php echo $perfil->data()[0]->nombre ?> </h1>
  <p class="subhead">Por favor</p>
  <p class="subhead">Ingrese la nueva Contraseña</p>
  <form action="" method="POST"  role="form">


    <div id="form-login-password" class="form-group">
      <input id="passwd" class="form-control" name="password" type="password" size="18" alt="password" required>
      <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="password" class="float-label">password</label>
    </div>

    <div id="form-login-password" class="form-group">
      <input id="passwd" class="form-control" name="password_again" type="password" size="18" alt="password" required>
      <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="password" class="float-label">repite el password</label>
    </div>


    <div>
			<input type="hidden" name="token" id="input" class="form-control" value="<?php echo $token ?>">

      <button class="btn btn-block btn-info ripple-effect" type="submit" name="Submit" alt="sign in">Restablecer</button>
      <a href="?accion=login" class="btn btn-block btn-info ripple-effect">Regresame al Login</a>

		</div>

    </div>
  </form>
</div>
</div>


		<!-- Sweet Alert -->
		<link rel="stylesheet" type="text/css" href="/QTelecom/bower_components/sweetalert/dist/sweetalert.css">

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	</body>
</html>
