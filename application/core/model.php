 <?php
 
class Model {

	public $db;

	public function __construct()
	{
		require '../application/core/database.php';
		$this->db = new Database;
		$this->db = $this->db->getQueryBuilder();
	}
}