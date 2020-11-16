<?php
// Список клиентов имя которых начинается на В (Вася, Владимир)
require_once 'connect.php';

$query = "SELECT * FROM clients WHERE name LIKE 'V%'";

$data = $dbh->query($query);

$clients = $data->fetchAll();

foreach($clients as $client) {
    echo $client['name'].PHP_EOL;
}