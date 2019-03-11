<?php

// DIC configuration

$container = $app->getContainer();

/**
 * @param object $c Add Database to SlimFramework DIC
 *
 * @return object $capsule
 */

$container['capsule'] = function ($c){

	$capsule = new Illuminate\Database\Capsule\Manager;
	$capsule->addConnection($c['settings']['db']);

	return $capsule;

};

/**
 * @param object $c Add Logger to SlimFramework DIC
 *
 * @return object $logger
 */

$container['logger'] = function ($c){

	$logger = new Monolog\Logger($c['settings']['logger']['name']);
	$logger->pushProcessor(new Monolog\Processor\UidProcessor());
	$file_handler = new Monolog\Handler\StreamHandler($c['settings']['logger']['path'], Monolog\Logger::DEBUG);
	$logger->pushHandler($file_handler);

	return $logger;
};

/**
 * @param object $c Add Twig to SlimFramework DIC
 *
 * @return object $view
 */

$container['view'] = function ($c){

	$view = new Slim\Views\Twig($c['settings']['view']['template_path'], $c['settings']['view']['twig']);

	//Extensions
	$view->addExtension(new Slim\Views\TwigExtension($c['router'], $c['request']->getUri()));
	$view->addExtension(new Twig_Extension_Debug());

	return $view;

};

/**
 * @param object $c Add FlashMessage to SlimFramework DIC
 *
 * @return object $flash
 */

$container['flash'] = function ($c) {

	return new Slim\Flash\Messages;

};

/**
 * @param object $c Add Controller to SlimFramework DIC
 *
 * @return Main\MainController
 */

$container[Main\MainController::class] = function ($c){

	return new Main\MainController($c['view'], $c['router'], $c['flash'], $c['logger']);

};