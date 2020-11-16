<?php
// Список всех клиентов
require_once 'connect.php';

$query = "SELECT * FROM clients";

$data = $dbh->query($query);

$clients = $data->fetchAll();

foreach($clients as $client) {
    echo $client['name'].PHP_EOL;
}