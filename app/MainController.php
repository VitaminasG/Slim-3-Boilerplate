<?php

namespace Main;

use Slim\Views\Twig;
use Slim\Router;
use Slim\Flash\Messages;

final class MainController {

	private $view;
	private $router;
	private $flash;

	public function __construct(Twig $view, Router $router, Messages $flash){

		$this->view = $view;
		$this->router = $router;
		$this->flash = $flash;

	}

	public function index($request, $response, $args){

		$message = 'What now?';

		return $this->view->render($response, 'views/index.twig', [
			'text' => $message
		]);

	}

}