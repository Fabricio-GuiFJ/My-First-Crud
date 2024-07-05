<?php

namespace Model;

use Persistence\ConnectionCreator;
use Model\Student;


class StudentRepository
{
    private \PDO $conn;

    public function __construct(){
        $this->conn = ConnectionCreator::Create();
    }

    public function createStudent(Student $student){        //Recebe um objeto do tipo Student e o insere na tabela
        $query ='INSERT INTO students(name,birth_date) VALUES (:name,:birth_date);';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':name',$student->name());
        $stmt->bindValue(':birth_date',$student->birthDate()->format('Y-m-d'));
        try{
            $stmt->execute();
            echo 'estudante inserido'.PHP_EOL;
        }catch(\Exception $e){
            echo "erro :",$e->getMessage().PHP_EOL;
        }
    }

    

    public function getById(int $id) : Student          //Procura um aluno na tabela por seu id e retorna um objeto do tipo Student
    {
        $query = 'SELECT * FROM students WHERE ID = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id',$id);
        $stmt->execute();

        $studentData = $stmt->fetch(\PDO::FETCH_ASSOC);

        $hydStudent = new Student(
            $studentData['ID'],
            $studentData['name'],
            $studentData['birth_date']
        );
        return $hydStudent;
    }
    private function getByName(string $name) : array{          //Recebe o nome de um aluno e retorna um array de alunos com aquele nome N/I

        return $search_query;
    }
    private function getByAge(int $Age) : array {                  //Recebe um inteiro de idade e retorna um array de alunos com aquela idade  N/I
        
        return $search_query;
    }

    private function hydrateStudentList(\PDOStatement $stmt) : array{           //Recebe um statement e retorna um array de Students
        $studentDataList = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $studentList = [];
        foreach ($studentDataList as $studentData) {
            $studentList[] = $student = new Student(
                $studentData['ID'],
                $studentData['name'],
                $studentData['birth_date']
            );
        }

        return $studentList;
    }

    public function allStudents() : array{                  //Retorna um array de Students com todos os alunos da tabela
        $query = 'SELECT * FROM students';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $dataList = $this->hydrateStudentList($stmt);
        return $dataList;

    }
    public function updateStudentName(int $id,string $newName){             //Recebe o id de um aluno e um novo nome e atualiza a tabela
        $query = "UPDATE students SET name = :name WHERE ID = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id',$id);
        $stmt->bindValue(':name',$newName);
        $stmt->execute();

        echo "Cadastro Atualizado";
    }

    public function removeStudent(int $id){                 //Recebe o id de um aluno e o remove da tabela
        $query = "DELETE FROM students WHERE ID = :id;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id',$id,\PDO::PARAM_INT);
        $stmt->execute();
        echo "Estudante Removido";
    }

}
