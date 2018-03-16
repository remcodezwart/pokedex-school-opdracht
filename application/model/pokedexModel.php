<?php
class pokedexModel extends Model
{
	public function getPokemons()
	{
		$data = $this->db->table('pokemon')->get()->result();

		foreach ($data as &$value) {
			foreach ($value as $key => &$effects) {
				if ($key === 'weakness_id' || $key === 'resistance_id' || $key === 'EnergyType') {
				
					$temp = $this->db->table('types')->where('id', $value[$key])->get('type')->result();
					$effects = $temp[0]['type'];
				}
			}
		}
		return $data;
	}
}