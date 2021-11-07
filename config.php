<?php 
// General Config
error_reporting(0);
ini_set('display_errors', 0);
// session_start();
$site_name="Plan2Plant";
$google_maps_api="AIzaSyC3HSSW38iMq7x_abVoB52F10FZCNe1NRA";
$jsonfilelocation = "/var/www/html/p2pfinal/lib/stagesData.json";
// == DataBase Config ==
$servername = "localhost";
$username = "zero";
$password = "";
$dbname = "plan2plant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// $mysqli -> set_charset("utf8");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// ==== DEBUG ====
if (isset($_GET['getcwd'])) {
	die(getcwd());
}
// ==== DEBUG ====
?>