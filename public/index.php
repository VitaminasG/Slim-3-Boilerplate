<?php

// All file paths relative to root
chdir(dirname(__DIR__));

require 'vendor/autoload.php';

// Start PHP session
session_start();

$settings = require 'src/settings.php';

// Instantiate the app
$app = new Slim\App($settings);

// Bootstrap all files
require 'src/bootstrap.php';

// Register the database connection with Eloquent
$capsule = $app->getContainer()->get('capsule');
$capsule->bootEloquent();

$app->run();