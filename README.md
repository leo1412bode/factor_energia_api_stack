<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>

Proyecto API Query StackExchange

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

Estructura del directorio
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



Requerimientos
------------

El requerimiento minimo para este proyecto es PHP 7.4

En mi caso yo lo he ejecutado con PHP 8.1.


Instalacion
------------

~~~
 ==> git clone https://github.com/leo1412bode/factor_energia_api_stack.git
 ==> cd factor_energia_api_stack
 ==> composer install
 Les he adjuntado la BD , pero si quieren probar la app es solo ejecutar el comando de migrate

 ==> php yii migrate
~~~

### Base de Datos
Para la BD he utilizado una MariaDB.

Montarla es sencillo , acceder como super user.
~~~
 ==> sudo su
 ==> mysql
MariaDB [(none)]> create database factor_energia;
MariaDB [(none)]> GRANT ALL PRIVILEGES ON factor.* TO 'moodle'@localhost;
~~~

Ya con la base de datos instalada en el servidor, es solo cambiar la configuracion del proyecto para que apunte al server donde esta su BD.
~~~
Ruta : 
==> vim config/db.php


return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=factor_energia',
    'username' => 'moodle',
    'password' => 'pitufo',
    'charset' => 'utf8',
];
~~~

Con los pasos previos realizados, solo es levantar el proyecto.
~~~ 
==> php yii serve --port 8080
~~~


Pueden acceder a la app mediante:

    http://localhost:8080


### Analisis del codigo

- Se creo un MVC -> api-query

Mediante el acceso a api-query/questions se puede consultar la API https://api.stackexchange.com/2.2/questions  y obtener las utlimas preguntas que se han realizado o se han comentado.

- Utilice Guzzle ; este es un cliente PHP HTTP que facilita el envío de peticiones HTTP y hace trivial la integración con servicios web. Interfaz sencilla para crear cadenas de consulta, solicitudes POST, transmisión de grandes descargas de gran tamaño, uso de cookies HTTP, carga de datos JSON, etc.


Cree 3 rutas 

                1 - 'api-query/questions' => 'api-query/questions', 
                2 - 'api-query/history' => 'api-query/history',
                3 - 'api-query/question/<id:\d+>' => 'api-query/question',

- La *1* consulta preguntas realizadas en Stackoverflow segun un tag que se le envia, por defecto salen las ultimas 30 preguntas que se han realizado o han tenido actividad.

Guarda en BD los datos introducidos y el resultado del request, en caso de que el request no tenga datos , no se almacena. 


- La *2* consulta el historial de preguntas realizadas en api-query/questions y luego poder seleccionar alguna para recuperar la respuesta de la BD, no se almacenan las consultas que no retornen resultados.

- La *3* se utiliza para recuperar el resultado realizado de alguna consutla previa que se ejecuto en la vista *1*


Se realizaron control de excepciones para todas las llamadas a la base de datos previendo posibles errores.



