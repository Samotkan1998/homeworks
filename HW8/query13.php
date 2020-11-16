<?php
// Изменить имя клиенту с номером 1
require_once 'connect.php';

$query = "UPDATE clients SET name = 'George' WHERE id = 1";

$data = $dbh->query($query);

