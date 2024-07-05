<?php
use Model\StudentRepository;

 require __DIR__.'\autoload.php';

 $id = filter_input(INPUT_GET , "id");

 if($id){
    $sRep = new StudentRepository();
    $aluno = $sRep->getById($id);
 }
 


?>

<h1> Informações do aluno :</h1>


<table border = "3">
    <tr>
        <th> ID </th>
        <th> Nome </th>
        <th> Data de Nascimento </th>
    </tr>

    <tr>
        <th><?=$aluno->id();?></th>
        <th><?=$aluno->name();?></th>
        <th><?=$aluno->birthDate()->format("Y-m-d");?></th>
    </tr>
</table><br>

    <form method = "post" action ="atualizar_action.php">
        <input type = "hidden" name ="id" value ="<?= $id?>" >
        <label>
                    Novo Nome : <input type = "text" name = "name">
        </label>
        <label>
                 <input type="submit" value = "Atualizar">
        </label>
    </form>