<?php
// Сколько клиентов у вас в базе всего
require_once 'connect.php';

$query = "SELECT COUNT(id) FROM clients";

$data = $dbh->query($query);

$count = $data->fetch();

echo $count[0];