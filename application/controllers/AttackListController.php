 <?php
class AttackListController extends controller {

	public function __construct($userInput)
	{
		parent::__construct($userInput);
		$this->loadModel('PokedexModel');
		$this->security = new security;
	}

	public function index()
	{
		$pokemons = $this->PokedexModel->getPokemons();

		$this->render('attacklist/index', array('pokemon' => $pokemons));
	}

	public function create()
	{
		$this->render('attacklist/create', array('crsf_token' => $this->security->getCsrfToken()));
	}

	public function edit()
	{
		$this->render('attacklist/edit', array('crsf_token' => $this->security->getCsrfToken()));
	}

	public function delete()
	{
		$this->render('attacklist/delete', array('crsf_token' => $this->security->getCsrfToken()));
	}
}