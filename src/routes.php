<?php

// Routes

$app->get('/', Main\MainController::class . ':index')->setName('message');