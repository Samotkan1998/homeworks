<?php
// Теперь вам надо добавить три любых клиентов в базу данных
require_once 'connect.php';

$query = "INSERT INTO `clients` (`id`, `name`, `age`, `is_active`)
VALUES (NULL, 'Julia', '32', '1'), (NULL, 'John', '62', '0'), (NULL, 'Greg', '21', '1')";

$data = $dbh->query($query);
