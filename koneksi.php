<?php

//koneksi database

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "readinglist";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Koneksi Anda Gagal! Silahkan coba lagi.";
}