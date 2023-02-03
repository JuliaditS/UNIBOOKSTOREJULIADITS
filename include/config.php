<?php 
	//fungsi Koneksi
	function dbConnect(){
		//variable Koneksi
		$host = "localhost";
		$user = "root";
		$password = "";
		$database = "data";
		//Koneksi
		$conn = mysqli_connect($host, $user, $password, $database);
		//Check koneksi
		if ($conn === false) {
			die("Koneksi Gagal karena : " . mysqli_connect_error());
		}
		return $conn;
	}	

	//fungsi format angka ke uang
	function formatUang($angka='')
	{
		$hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
		return $hasil_rupiah;
	}

	//fungsi view table
	function getData($table="")
	{
		$db = dbConnect();
		if ($db->connect_errno == 0) {
			$sql = "SELECT * FROM $table"; 
			$res = $db->query($sql);
			if ($res) {
				$data = $res->fetch_all(MYSQLI_ASSOC);
				$res->free();
				return $data;
			} else
				return FALSE;
		} else
			return FALSE;
	}
?>