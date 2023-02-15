<?php

$host =  'localhost';
$user = 'root';
$password = '';
$db_name = 'WSK2018_TP17_Module_B_ServerSide';

$conn = new mysqli($host, $user, $password, $db_name);

$status = 'work';

if ($conn->connect_error) {
   die('Error when u connected db :<' . $conn->connect_error);
}

$login = 'false';