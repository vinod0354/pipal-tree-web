<?php
ob_start();
session_start();
if(!isset($_SESSION['cur_type'])){
    $_SESSION['cur_type'] = "INR";
}
if(!isset($_SESSION['cur_val'])){
    $id = $_SESSION['cur_type'];
    $apikey = 'aba009fc2844198a559e';
  
    $from_Currency = "INR";
    $to_Currency = $id;
    $query =  "{$from_Currency}_{$to_Currency}";

    $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
    $obj = json_decode($json, true);

    $val = floatval($obj["$query"]);
    $_SESSION['cur_val'] = $val;
}

$servername = "localhost";
$username = "dba_pt";
$password = "Pipaltree@2020";
$dbname = "pipal_tree";
$conn = new mysqli($servername, $username, $password, $dbname);
//echo"successully connected";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require_once "function.php";
require_once "cart-function.php";
 
?>
