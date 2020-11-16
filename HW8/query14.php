<?php
//Деактивировать клиента номер 3
require_once 'connect.php';

$query = "UPDATE clients SET is_active = 0 WHERE id = 3";

$data = $dbh->query($query);

