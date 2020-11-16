<?php
// Удалить всех не активных клиентов
require_once 'connect.php';

$query = "DELETE FROM clients WHERE is_active = 0";

$data = $dbh->query($query);

