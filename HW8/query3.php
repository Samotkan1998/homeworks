<?php
// Список клиентов возраст которых больше или равно 30
require_once 'connect.php';

$query = "SELECT * FROM clients WHERE age >= 30";

$data = $dbh->query($query);

$clients = $data->fetchAll();

foreach($clients as $client) {
    echo $client['name'].PHP_EOL;
}