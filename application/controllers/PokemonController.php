<?php
class PokemonController extends controller {

	public function __construct($userInput)
	{
		parent::__construct($userInput);
		$this->security = new security;
	}

	public function index()
	{
		$this->loadModel('pokedexModel');

		$this->render('pokemon/index', array(
			'crsf_token' => $this->security->getCsrfToken()
		));
	}
}