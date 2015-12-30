<?php

session_start();

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;  

$capsule = new Capsule; 

$capsule->addConnection(array(
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'YOUR_DATABASE',
    'username'  => 'YOUR_USERNAME',
    'password'  => 'YOUR_PASSWORD',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
));

$capsule->bootEloquent();

new controllers\Routes();

Flight::start();
