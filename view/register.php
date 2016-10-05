

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		-->
		<link rel="stylesheet" href="/QTelecom/static/css/login.css" media="screen" title="no title">
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



		<div class="container">
		<div id="login" class="signin-card">
		  <div class="logo-image">
		  <img src="/QTelecom/static/img/avatar.gif" alt="Logo" title="Logo" width="138">
		  </div>
		  <h1 class="display1">Quorum Ticket</h1>
		  <p class="subhead">Registrarme</p>
		  <form action="" method="POST"  role="form">

				<div id="form-login-username" class="form-group">
		      <input id="nombre" class="form-control" name="nombre" type="text" size="18" alt="register" required />
		      <span class="form-highlight"></span>
		      <span class="form-bar"></span>
		      <label for="nombre" class="float-label">nombre</label>
		    </div>



				<div id="form-login-username" class="form-group">
		      <input id="username" class="form-control" name="username" type="text" size="18" alt="register" required />
		      <span class="form-highlight"></span>
		      <span class="form-bar"></span>
		      <label for="username" class="float-label">username</label>
		    </div>

				<div id="form-login-username" class="form-group">
		      <input id="email" class="form-control" name="email" type="email" size="18" alt="register" required />
		      <span class="form-highlight"></span>
		      <span class="form-bar"></span>
		      <label for="email" class="float-label">email</label>
		    </div>



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
					<input type="hidden" name="token" id="input" class="form-control" value="<?php echo Token::generate() ?>">

		      <button class="btn btn-block btn-info ripple-effect" type="submit" name="Submit" alt="sign in">Guardar</button>

				</div>

		    </div>
		  </form>
		</div>
		</div>



		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

	</body>
</html>
