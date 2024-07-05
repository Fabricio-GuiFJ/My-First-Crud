<?php

use Model\StudentRepository;

    require __DIR__.'\autoload.php';


    $id = filter_input(INPUT_POST,'id');
    $newName = filter_input(INPUT_POST,'name');

    if($id && $newName){
        $sRep = new StudentRepository();
        $sRep->updateStudentName($id,$newName);
    }else{
        header("location : index.php");
    }

?>