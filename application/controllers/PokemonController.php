<?php
class PokemonController extends controller {

	public function __construct($userInput)
	{
		parent::__construct($userInput);
		$this->loadModel('PokedexModel');
		$this->security = new security;
	}

	public function index()
	{
		$pokemons = $this->PokedexModel->getPokemons();

		$this->render('pokemon/index', array('pokemon' => $pokemons));
	}

	public function create()
	{
		$this->render('pokemon/create', array('crsf_token' => $this->security->getCsrfToken()));
	}

	public function edit()
	{
		$this->render('pokemon/edit', array('crsf_token' => $this->security->getCsrfToken()));
	}

	public function delete()
	{
		$this->render('pokemon/delete', array('crsf_token' => $this->security->getCsrfToken()));
	}
}