<?php

class controller {

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