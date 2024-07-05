<?php

use Model\Student;
use Model\StudentRepository;

require_once __DIR__."\autoload.php";


    $student = new Student(null,
    filter_input(INPUT_POST, 'nome'),
    filter_input(INPUT_POST , 'birth_date')
    );

    $s_rep = new StudentRepository();


    $s_rep->createStudent($student);

    header("location : index.php");
?>
