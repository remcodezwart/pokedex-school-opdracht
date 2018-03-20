<?php
class EnergyController extends controller {

	public function __construct($userInput)
	{
		parent::__construct($userInput);
		$this->loadModel('EnergyModel');
		$this->security = new security;
	}

	public function index()
	{
		$energy = $this->EnergyModel->getAllEnergy();

		$this->render('energy/index', array('energy' => $energy));
	}

	public function create()
	{
		$this->render('energy/create', array('crsf_token' => $this->security->getCsrfToken()));
	}

	public function edit()
	{
		$input = $this->getUserInput();

		$energy = $this->EnergyModel->getEnergyById($input['get'][2]);
		
		if (!$energy) {
			$this->redirect('/energy');
		}

		$this->render('energy/edit', array(
			'crsf_token' => $this->security->getCsrfToken(),
			'energy' => $energy
		));
	}

	public function delete()
	{
		$input = $this->getUserInput();

		$energy = $this->EnergyModel->getEnergyById($input['get'][2]);
		
		if (!$energy) {
			$this->redirect('/energy');
		}

		$this->render('energy/delete', array(
			'crsf_token' => $this->security->getCsrfToken(),
			'energy' => $energy
		));
	}

	public function createAction()
	{
		if (!$this->security->validateToken()) {
			$this->redirect('/energy/create');
		}
		$input = $this->getUserInput();

		$this->EnergyModel->createNewEnergy($input['post']['type']);
		$this->redirect('/energy');
	}

	public function editAction()
	{
		if (!$this->security->validateToken()) {
			$this->redirect('/energy');
		}

		$input = $this->getUserInput();

		if (!isset($input['get']['2']) || !isset($input['post']['type'])) {
			$this->redirect('/energy');
		}

		$this->EnergyModel->editEnergy($input['get']['2'], $input['post']['type']);
		$this->redirect('/energy');
	}

	public function deleteAction()
	{
		if (!$this->security->validateToken()) {
			$this->redirect('/energy');
		}

		$input = $this->getUserInput();

		if (!isset($input['get']['2'])) {
			$this->redirect('/energy');
		}

		$this->EnergyModel->deleteEnergy($input['get']['2']);
		$this->redirect('/energy');
	}
}