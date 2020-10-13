<?php
$user = 'root';
$pass = '';
$host = 'localhost';
$db = 'cafeimetrodb';

$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn, 'utf8');
