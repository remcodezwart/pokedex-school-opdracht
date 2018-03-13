<?php

class database {

	private static $conn;

	public function __construct()
	{
		require '../application/core/config.php';

		$servername = $config['server'];
		$username = $config['username'];
		$password = $config['password'];

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=pokedex", $username, $password);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
		    
		}
	}

	public function getQueryBuilder()
	{
		require '../application/core/queryBuilder.php';
		return new queryBuilder(self::$conn);
	}
}
