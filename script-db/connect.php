<?php
$user = 'root';
$pass = '';
$host = 'localhost';
$db = 'cafeimetrodb';

$conn = new mysqli($host, $user, $pass, $db);
$conn->set_charset('utf8');
