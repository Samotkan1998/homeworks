<?php
// Сколько у вас активных клиентов
require_once 'connect.php';

$query = "SELECT COUNT(id) FROM clients WHERE is_active = 1";

$data = $dbh->query($query);

$count = $data->fetch();

echo $count[0];