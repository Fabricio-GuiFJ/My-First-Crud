<?php

require_once __DIR__.'\autoload.php';

use Persistence\ConnectionCreator;

$conn = ConnectionCreator::Create();


$query1 ='DROP TABLE Students';

$query2 = 'CREATE TABLE Students(
id INTEGER PRIMARY KEY AUTOINCREMENT,
name TEXT,
birth_date DATE);';


$conn->exec($query2);