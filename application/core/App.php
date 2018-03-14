<?php
	
class App {

	private $url;
	private $functionToCall;

	public function __construct()
	{
		session_start();
		require '../application/core/Controller.php';
		require '../application/core/Security.php';

		$this->url = explode('/', filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL));
		$this->url[1] = (empty($this->url[1]) ? 'Pokemon' : $this->url[1] );

		if (file_exists('../application/controllers/'.$this->url[1].'Controller.php')) {
			$this->functionToCall = (empty($this->url[2]) ? 'index' : $this->url[2] );

			require '../application/controllers/'.$this->url[1].'Controller.php';

			$this->url[1] .= 'Controller';

			$controller = new $this->url[1]($this->url);

			if (is_callable(array($controller, $this->functionToCall))) {
				$controller->{$this->functionToCall}();
				exit;
			}
		}

		require '../application/controllers/ErrorController.php';
		$controller = new ErrorController;
		$controller->pageNotFound();
	}
}