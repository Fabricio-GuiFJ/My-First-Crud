<?php

namespace Persistence;

use PDO;

class ConnectionCreator
{

    public static function Create() : PDO
    {
        
        $dbname = 'dbname=student_management;';
        $dbhost = 'host=localhost:3306';
        $dsn = 'mysql:';

        $connection = new PDO($dsn.$dbname.$dbhost,"root","");



        return $connection;

    }
}