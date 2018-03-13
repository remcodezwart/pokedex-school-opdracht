<?php
class Pokemon extends controller {

	public function __construct($userInput)
	{
		parent::__construct($userInput);
	}

	public function index()
	{
		$this->render('pokemon/index');
	}
}