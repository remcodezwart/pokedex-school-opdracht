<?php
	
class App {

	private $url;
	private $functionToCall;

	public function __construct()
	{
		session_start();
		require '../application/core/controller.php';
		require '../application/core/security.php';

		$this->url = array_filter(explode('/', filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL)));
		$this->url[1] = (empty($this->url[1]) ? 'pokemon' : $this->url[1] );

		if (file_exists('../application/controllers/'.$this->url[1].'.php')) {
			$this->functionToCall = (empty($this->url[2]) ? 'index' : $this->url[2] );

			require '../application/controllers/'.$this->url[1].'.php';

			$controller = new $this->url[1]($this->url);

			if (is_callable(array($controller, $this->functionToCall))) {
				$controller->{$this->functionToCall}();
				exit;
			}
		}

		require '../application/controllers/errorController.php';
		$controller = new errorController;
		$controller->pageNotFound();
	}
}