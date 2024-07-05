<?php
use Model\StudentRepository;
   require __DIR__.'\autoload.php';

   $sRep = new StudentRepository();

   $lista = $sRep->allStudents();
?>

<h1> Listagem de alunos </h1>

<table border = "3">

    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Data de Nascimento</th>
        <th>Ações</th>
    </tr>
        <?php foreach($lista as $aluno): ?>

            <tr>
                <th><?= $aluno->id()?></th>
                <th><?= $aluno->name()?></th>
                <th><?= $aluno->birthDate()->format("Y-m-d")?></th>
                <th>
                    <a href = "atualizar.php?id=<?= $aluno->id();?>">[Atualizar] </a>
                    <a href = "excluir.php?id=<?= $aluno->id();?>">[Remover]</a>
                </th>
            </tr>

        <?php endforeach; ?>

    
</table>

<a href = "cadastrar.php">Cadastrar Usuário</a>