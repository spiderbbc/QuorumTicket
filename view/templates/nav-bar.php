<!-- Static navbar -->
	      <nav class="navbar navbar-default">
	        <div class="container-fluid">
	          <div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	              <span class="sr-only">Toggle navigation</span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="#">Quorum Ticket</a>
	          </div>
	          <div id="navbar" class="navbar-collapse collapse">
	            <ul class="nav navbar-nav">
	              <li class="active"><a href="?accion=home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	              <li><a href="?accion=crear"><span class="glyphicon glyphicon-edit"></span> Crear Ticket</a></li>
	              <li><a href="?accion=tickets"><span class="glyphicon glyphicon-folder-open"></span>  Mis Tickets</a></li>
	              <li class="dropdown">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-user"></span> <?php echo $user->data()->username; ?></a>
	                <ul class="dropdown-menu">
	                  <!-- <li><a href="#">Action</a></li>
	                  <li><a href="#">Another action</a></li> -->
	                  <li><a href="?accion=perfil">Mi Perfil</a></li>
	                  <li role="separator" class="divider"></li>
	                  <li class="dropdown-header">Accion</li>
	                  <li><a href="q-admin/">Entrar Como Administrador</a></li>
	                  <li><a href="q-logout/">Salir</a></li>
	                </ul>
	              </li>
	            </ul>
	            <!-- <ul class="nav navbar-nav navbar-right">
	              <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
	              <li><a href="../navbar-static-top/">Static top</a></li>
	              <li><a href="?accion=logout">Fixed top</a></li>
	            </ul> -->
	          </div><!--/.nav-collapse -->
	        </div><!--/.container-fluid -->
	      </nav>
