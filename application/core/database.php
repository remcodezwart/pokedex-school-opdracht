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
		    echo "Connected successfully";
		} catch(PDOException $e) {
		    echo "Connection failed: " . $e->getMessage();
		}
	}

	public function getConnection()
	{
		return self::$conn;
	}
}
