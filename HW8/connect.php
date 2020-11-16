<?php

$database = 'test';

try {
    $dbh = new PDO("mysql:host=localhost;dbname=$database", 'root', '');

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}