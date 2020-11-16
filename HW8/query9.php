<?php
// Получить и отсортировать всех клиентов по имени
require_once 'connect.php';

$query = "SELECT * FROM clients ORDER BY name DESC";

$data = $dbh->query($query);

$clients = $data->fetchAll();

foreach($clients as $client) {
    echo $client['name'].PHP_EOL;
}