<?php
// Изменить возраст на 45 для клиента номер 2
require_once 'connect.php';

$query = "UPDATE clients SET age = 45 WHERE id = 2";

$data = $dbh->query($query);

