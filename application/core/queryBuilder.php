<?php
class QueryBuilder extends database {

	private $conn;
	private $table = '';
	private $where = array();
	private $limit;
	private $result;

	public function __construct($conn)
	{
		$this->conn = $conn;
	}

	public function table($table)
	{
		$this->table = $table;

		return $this;
	}

	public function limit($amount, $offset = 0)
	{
		$this->limit['amount'] = $amount;
		$this->limit['offset'] = $offset;
		return $this;
	}

	public function where($key, $value, $operator = '=') {
		$this->where[] = (object)array('key' => $key, 'value' => $value, 'operator' => $operator, 'mode'=> 'AND');
		return $this;
	}

	public function orWhere($key, $value, $operator = '=') {
		$this->where[] = (object)array('key' => $key, 'value' => $value, 'operator' => $operator, 'mode'=> 'OR');
		return $this;
	}

	public function create($paramaters)
	{
		$fields = '';
		$values = '';
		$i = 1;
		$len = count($paramaters);
		foreach ($paramaters as $key => $value) {
			if ($i === $len) {
				$fields .= $key;
				$values .= ':'.$key;
			} else {
				$fields .= $key.','; 
				$values .= ':'.$key.',';
			}
			$i++;
		}
		$query =  'INSERT INTO '.$this->table.'('.$fields.') VALUES ('.$values.')';
		$this->run($query, $paramaters);
	}

	public function delete()
	{
		$query =  'DELETE FROM '.$this->table.$this->addWhere();
		$this->run($query, $this->addWhereParamaters());
	}

	public function edit($paramaters)
	{
		$query = 'UPDATE '.$this->table.' SET ';
		$setParamaters = array();
		foreach ($paramaters as $key => $value) {
			$setParamaters[] .= $key.'=:'.$key;
		}
		$query .= implode(' ,', $setParamaters).$this->addWhere();
		$paramaters = $this->addWhereParamaters($paramaters);
		$this->run($query, $paramaters);
	}

	public function get()
	{
		$query .= 'SELECT * FROM '.$this->table.$this->addWhere($query).$this->addLimit($query);

		$prepared = $this->run($query, $this->addWhereParamaters());
	}

	private function run($query, $paramaters = array())
	{
		$this->prepare = $this->conn->prepare($query);
		$this->prepare->execute($paramaters);
	}

	private function addWhere()
	{
		$where = '';
		if (!empty($this->where)) {
			$where = ' WHERE ';
			foreach($this->where as $key => $value) {
				if ($key !== 0) $where .= ' '.$value->mode.' ';
				
				$where .= $value->key.$value->operator.':'.$value->key;
			}
		} 
		return $where;
	}

	private function addLimit()
	{
		$limit = '';
		if (!empty($this->limit)) {
			$limit = ' LIMIT ' . $this->limit['offset'] .', '. $this->limit['amount'];
		}
		return $limit;
	}
	private function addWhereParamaters($paramaters = array())
	{
		foreach ($this->where as $key => $value) {
			$paramaters[$value->key] = $value->value;
		}
		return $paramaters;
	}

	public function result()
	{
		if (empty($this->result)) $this->result = $this->prepared->fetchAll(PDO::FETCH_ASSOC);
		return $this->result;
	}

}