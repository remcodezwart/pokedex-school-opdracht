<?php

class Controller {

	private static $userInput = [];

	public function __construct($userInput = "")
	{
		if (!empty($userInput)) $this->setUserInputData($userInput);	
	}

	public function setUserInputData($data)
	{
		self::$userInput = $data;
	}

	protected function getUserInput()
	{
		return self::$userInput;
	}

	public function loadModel($model)
	{
		require '../application/core/Model.php';
		require '../application/model/'.$model.'.php';
		$this->model = new $model;
	}

	public function render($page, $data = null)
	{
		if ($data) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }
        
		require '../application/views/header.php';
		require '../application/views/'.$page.'.php';
		require '../application/views/footer.php';
	}
}