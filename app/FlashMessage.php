<?php


namespace Main;

use Twig_Extension;

class FlashMessage extends Twig_Extension {

	/**
	 * @var \Slim\Flash\Messages
	 */

	private $flash;

	public function __construct($flash){

		$this->flash = $flash;

	}

	public function flashMessages(){

		$message = $this->flash->getMessages();

		return $message;
	}

}