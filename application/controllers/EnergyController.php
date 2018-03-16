<?php
class EnergyController extends controller {

	public function __construct($userInput)
	{
		parent::__construct($userInput);
		$this->security = new security;
	}

	public function index()
	{
		$this->render('energyTypes/index', array(
			'crsf_token' => $this->security->getCsrfToken()
		));
	}

	public function edit()
	{
		
	} 
}