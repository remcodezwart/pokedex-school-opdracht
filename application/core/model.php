 <?php
 
class model {

	public $db;

	public function __construct()
	{
		require '../application/core/database.php';
		$this->db = new database;
		$this->db = $this->db->getQueryBuilder();
	}
}