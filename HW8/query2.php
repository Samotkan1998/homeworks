<?php
// Список клиентов который активны (поле is_active)
require_once 'connect.php';

$query = "SELECT * FROM clients WHERE is_active = 1";

$data = $dbh->query($query);

$clients = $data->fetchAll();

foreach($clients as $client) {
    echo $client['name'].PHP_EOL;
}