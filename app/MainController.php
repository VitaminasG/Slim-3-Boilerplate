<?php


namespace Main;

use Slim\Views\Twig;
use Slim\Router;
use Slim\Flash\Messages;
//use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;



final class MainController {

	private $view;
	private $router;
	private $flash;

	public function __constructor(Twig $view, Router $router, Messages $flash){

		$this->view = $view;
		$this->router = $router;
		$this->flash = $flash;

	}

	public function index($request, $response, $args){

		$message = 'What now?';

		return $this->view->render($response, 'extended/index.twig', [
			'text' => $message
		]);

	}

}