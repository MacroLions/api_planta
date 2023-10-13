<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// Aquí se declaran todas las rutas que se van a utilizar. 
// siendo http://localhost:8000/ el inicio, y la continuación lo que se declare abajo.

//Esta es la pagina que cargará de manera automatica cuando solo se ponga la dirección (http://localhost:8000/)
$router->get('/', function () use ($router) {
    //return $router->app->version();
    return "
    
    <!DOCTYPE html>
<html lang=\"es\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Pantalla de Inicio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .section {
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<h1>Hola api de plantas</h1>
<div class=\"section\">
    <h2>Sección 1: ¿Que es una api?</h2>
    <p>na API, que significa \"Interfaz de Programación de Aplicaciones\" en inglés, es como un camarero en un restaurante.</p>
    <p> Imagina que tienes un restaurante (tu videojuego) y quieres servir platos deliciosos (datos o funcionalidades) a tus clientes (usuarios del videojuego).</p>
    <ol>
        <li>GET Endpoint: Retorna datos específicos de la API.</li>
        <li>POST Endpoint: Permite agregar nuevos datos a la API.</li>
        <li>PUT Endpoint: Modifica datos existentes en la API.</li>
        <li>DELETE Endpoint: Elimina datos de la API.</li>
    </ol>

</div>

<div class=\"section\">
    <h2>Sección 2: ¿Que es un endpoint?</h2>
    <p>Es como un link donde se enviaran y recibiran datos en el formato json</p>
    <p>
    Aquí está un ejemplo de un objeto JSON:
    <pre>
        {
            \"nombre\": \"Juanito\",
            \"edad\": 25,
            \"ciudad\": \"San Salvador\"
        }
    </pre>
    </p>
</div>

<div class=\"section\">
    <h2>Sección 3: ¿Que es consumir una api?</h2>
    <p>Es utilizar los endpoints para recibir una respuesta</p>
    <p>Un buen ejemplo de varios endpoints de una api es la api de pokemon</p>
    <a href= https://pokeapi.co/> https://pokeapi.co/</a>
</div>

</body>
</html>
";
});


// Todas las plantas
$router->get('/plantas', 'PlantaController@getAll');

//Una planta
$router->get('/plantas/{id}', 'PlantaController@getById');

// Guardar o modificar planta, sin id, creará una nueva.
$router->post('/plantas/save/', 'PlantaController@agregarPlanta');

// Este puede ser PUT así como puede ser SAVE por la manera que está hecha la función.
$router->post('/plantas/save/{id}', 'PlantaController@agregarPlanta');
$router->put('/plantas/save/{id}', 'PlantaController@agregarPlanta');

// Borrar una planta
$router->delete('/plantas/delete/{id}', 'PlantaController@borrarPlanta');
