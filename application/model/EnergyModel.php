<?php
class EnergyModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->security = new security;
	}

	public function getAllEnergy()
	{
		return $this->security->filter($this->db->table('types')->get()->result());
	}

	public function createNewEnergy($type)
	{
		return $this->db->table('types')->create(array('type' => $type));
	}

	public function editEnergy($id, $name)
	{
		return $this->db->table('types')->where('id', $id)->edit(array('type' => $name));
	}

	public function getEnergyById($id)
	{
		return $this->security->filter($this->db->table('types')->where('id', $id)->get()->result());
	}

	public function deleteEnergy($id)
	{
		return $this->db->table('types')->where('id', $id)->delete();
	}
}