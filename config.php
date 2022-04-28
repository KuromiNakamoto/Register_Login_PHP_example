<?php
$db_info = [
	"HOST" => "localhost",
	"USER" => "root",
	"PASS" => "",
	"DB_NAME" => "data_user"
];

class _db {
	public function connect() {
		global $db_info;
		$connection = mysqli_connect($db_info['HOST'], $db_info['USER'], $db_info['PASS'], $db_info['DB_NAME']);
		return $connection;
	}

	public function __construct() {
		$this->connect();
	}

	public function query($sql) {
		$query = mysqli_query($this->connect(), $sql);
		return $query;
	}

	public function fetch_assoc($sql) {
		$query = mysqli_query($this->connect(), $sql);
		$result = mysqli_fetch_assoc($query);

		return $result;
	}

	public function row_counts($sql) {
		$query = mysqli_query($this->connect(), $sql);
		$result = mysqli_num_rows($query);

		return $result;
	}
}

class _app {
	public function validateSender($arrayPost) {
		foreach ($arrayPost as $name) {
			if (empty($_POST[$name])) {
				die("<script> alert('Vui lòng điền đầy đủ thông tin !'); window.location.href = '/index.php'; </script>");
			}
		}

		return true;
	}
}