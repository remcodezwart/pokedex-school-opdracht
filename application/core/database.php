<?php

class Database {

	private static $conn;

	public function __construct()
	{
		require '../application/core/config.php';

		$servername = $config['server'];
		$username = $config['username'];
		$password = $config['password'];

		try {
		    self::$conn = new PDO("mysql:host=$servername;dbname=pokedex", $username, $password);
		    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
		    
		}
	}

	public function getQueryBuilder()
	{
		require '../application/core/QueryBuilder.php';
		return new QueryBuilder(self::$conn);
	}
}
