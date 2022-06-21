CONOCE MAGINA
==============

Pasos a seguir para la instalación del proyecto en nuestro repositorio local:
------------------------------------------------------------------------------

Versiones de configuración:

 - PHP8.1
 - MySQL 5.7
 - Composer 2
 - Symfony 6.0


Instalación del proyecto

1) Clonamos el repositorio: `git clone https://github.com/Marta-555/conoce_magina.git`

2) Entramos en el directorio: `cd conoce_magina`

3) Seleccionamos la rama que nos interesa: `git checkout master`

4) Instalamos vendors del proyecto: `composer install -o`

5) Verificamos los requisitos de symfony e instalamos lo necesario para que funcione nuestro proyecto: `symfony check:requirements`

6) Importamos los assets `php bin/console assets:install`

7) Modificamos el archivo .env para configurar el envío de correos (línea 47):

    - Cambiar db_user, db_password y versión del servidor MySQL:
        DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/landingPage?serverVersion=5.7&charset=utf8mb4"

    - Añadir correo y contraseña desde donde enviaremos los email (Paso no necesario , ya que Google a denegado este servicio):
        MAILER_DSN=gmail+smtp://"CORREO":CONTRASEÑA@default

8) Importamos la base de datos a nuestro servidor

9) Iniciamos el servidor: `symfony server:start`


10) Todo listo!
