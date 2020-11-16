<?php
// Самого старого (по возрасту клиента)
require_once 'connect.php';

$query = "SELECT * FROM clients WHERE age = (SELECT MAX(age) FROM clients)";

$data = $dbh->query($query);

$clients = $data->fetchAll();

foreach($clients as $client) {
    echo $client['name'].PHP_EOL;
}