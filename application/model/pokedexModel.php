<?php
class PokedexModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->security = new security;
	}

	public function getPokemons()
	{
		$data = $this->db->table('pokemon')->get()->result();

		$typesList = array_map(array($this, 'getType'), $this->db->table('types')->get()->result());
		$attackList = $this->db->table('attacks')->get()->result();
		$pokemonAttacks = $this->db->table('pokemonattacks')->get()->result();

		foreach ($data as &$value) {
			
			foreach ($pokemonAttacks as $attack) {
				if ($attack['pokemonId'] === $value['id']) {
					$value['attacks'][] = $attackList[$attack['attackId']-1];
				}
			}
			$value['weakness_id'] = $typesList[$value['weakness_id']-1];
			$value['resistance_id'] = $typesList[$value['resistance_id']-1];
			$value['EnergyType'] = $typesList[$value['EnergyType']-1];
		}

		return $this->security->filter($data);
	}

	private function getType($type)
	{
		return $type['type'];
	}


}