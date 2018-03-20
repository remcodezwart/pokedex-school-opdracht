<?php
	
class App {

	private $url;
	private $functionToCall;

	public function __construct()
	{
		session_start();
		require '../application/core/Controller.php';

		$this->url = explode('/', filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL));
		$this->url[1] = (empty($this->url[1]) ? 'PokemonController' : $this->url[1].'Controller' );
		$this->url[2] = (empty($this->url[2]) ? 'index' : $this->url[2] );

		if (file_exists('../application/controllers/'.$this->url[1].'.php')) {

			require '../application/controllers/'.$this->url[1].'.php';

			$controller = new $this->url[1](array(
				'url'  => array('controller' => $this->url[1], 'method' => $this->url[2]),
				'get'  => explode('/', $_GET['url']),
				'post' => $_POST
			));

			if (is_callable(array($controller, $this->url[2]))) {
				$controller->{$this->url[2]}();
				exit;
			}
		}

		require '../application/controllers/ErrorController.php';
		$controller = new ErrorController;
		$controller->pageNotFound();
	}
}