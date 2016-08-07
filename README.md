<img src="icon.png" align="right" />
# Sistema de Gestion de Tickets [![Awesome](https://cdn.rawgit.com/sindresorhus/awesome/d7305f38d29fed78fa85652e3a63e154dd8e8829/media/badge.svg)](https://github.com/sindresorhus/awesome)
> Version: LT




## Actualizaciones:

- 22/07/2016: Estructura: Diseño del proyecto MVC.

- 22/07/2016: Config.php: Clase envoltorio que retorna los valores del array config de core/init.

- 25/07/2016: DB.php: Clase envoltorio para la base de datos: create,update,query.

- 26/07/2016: Validate.php: Clase que valida mediante las reglas enviadas.

- 27/07/2016: Input.php: Clase envoltorio para el post o get.

- 29/07/2016: Token.php: Clase envoltorio añade un token en la variable de session y lo confirma.

- 29/07/2016: Ticket.php: Clase envoltorio y logica de negocio del ticket.

- 30/07/2016: User.php: Clase envoltorio y logica de negocio del usuario.

- 31/07/2016: controller: Clases controladoras para las vista.

- 01/08/2016: vistas y modelos: Clases modelos y vistas para mostrar datos.

- 02/08/2016: datatable: bower datatable para mostrar los datos.

- 03/08/2016: create vista: maquetacion y datos relacionados sobre quien apertura el ticket.

- 04/07/2016: se agrega ckeditor via bower y configuracion personal en static/js/ckeditor_config.js y se agrega clase well de bootrap en la seccion perfil-info.

- 05/08/2016: creado metodo class DB (getByName) para los combo-list, se intengran los validadores para el formulario con muestra de errores en el formulario

- 07/08/2016: persistencia de datos al momento de crear un ticket y caso contrario redireciona al 404 (Fallo en el mensaje de error 404), se solventan los errores al no tener informacion del perfil de un usuario al momento de crear, se solventa los errores en el home al no tener Tickets disponibles, include ticket en init ...


## License

[![CC0](https://licensebuttons.net/p/zero/1.0/88x31.png)](http://creativecommons.org/publicdomain/zero/1.0/)
