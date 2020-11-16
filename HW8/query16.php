<?php
// Удалить всех созданных вами клиентов
require_once 'connect.php';

$query = "DELETE FROM clients";

$data = $dbh->query($query);

