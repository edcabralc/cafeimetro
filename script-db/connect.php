<?php
$user = 'root';
$pass = '';
$host = 'localhost';
$db = 'cafeimetrodb';

$conn = new mysqli($host, $user, $pass, $db);
$conn->set_charset('utf8');

//temp
/*
INSERT INTO consumo (cafe_id, data, hora, dia_semana, preco, qtd) VALUES ('2','2020-05-25','10:35','Quarta','4.40','120');
INSERT INTO consumo (cafe_id, data, hora, dia_semana, preco, qtd) VALUES ('1','2020-08-11','08:35','Segunda','4.50','100');
INSERT INTO consumo (cafe_id, data, hora, dia_semana, preco, qtd) VALUES ('5','2020-09-18','09:35','Sexta','6.40','320');
*/
