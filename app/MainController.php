<?php

namespace Main;

use Slim\Views\Twig;
use Slim\Router;
use Slim\Flash\Messages;
use Psr\Log\LoggerInterface as Logger;

final class MainController {

	private $view;
	private $router;
	private $flash;
	private $logger;

	public function __construct(Twig $view, Router $router, Messages $flash, Logger $logger){

		$this->view = $view;
		$this->router = $router;
		$this->flash = $flash;
		$this->logger = $logger;

	}

	public function index($request, $response, $args){

		$this->logger->info('MainController with method index was dispatched');

		$message = 'What now?';

		return $this->view->render($response, 'views/index.twig', [
			'text' => $message
		]);

	}

}