<?php
class queryBuilder extends database {

	private $table = '';


	public function table($table)
	{
		$this->table = $table;
	}
}