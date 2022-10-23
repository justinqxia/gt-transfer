<?php
// $servername = "localhost"; //used because i used localhost for online insert ip address
// $dBUsername = "root";
// $dBPassword = "root";
// $dBName = "GTTransfer";

$servername = "localhost"; //used because i used localhost for online insert ip address
$dBUsername = "btwobte1_tfer";
$dBPassword = "ax890^HZBZ1zd9J7y&U*MA3";
$dBName = "btwobte1_GTTransfer";
$conn = mysqli_connect( $servername, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
die("CONNECTION FAILED: " .mysqli_connect_error());  // check if connection is FAILED

}