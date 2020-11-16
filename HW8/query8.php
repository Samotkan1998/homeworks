<?php
// Получить и отсортировать всех клиентов по возрасту
require_once 'connect.php';

$query = "SELECT * FROM clients ORDER BY age ASC";

$data = $dbh->query($query);

$clients = $data->fetchAll();

foreach($clients as $client) {
    echo $client['name'].PHP_EOL;
}