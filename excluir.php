<?php
use Model\StudentRepository;
    require __DIR__.'\autoload.php';

    $id = filter_input(INPUT_GET , "id");
    if($id){
        $sRep = new StudentRepository();
        $sRep->removeStudent($id);
    }else{
        header("location : index.php");
        exit;
    }

    header("location : index.php");

?>