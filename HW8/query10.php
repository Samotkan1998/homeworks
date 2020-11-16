<?php
// Посчитать сколько у вас активных клиентов старше 25
require_once 'connect.php';

$query = "SELECT COUNT(id) FROM clients WHERE (is_active = 1 AND age >= 25)";

$data = $dbh->query($query);

$count = $data->fetch();

echo $count[0];