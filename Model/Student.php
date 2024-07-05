<?php

namespace Model;

use Stringable;

class Student
{

    private ?int $id;

    private string $name;

    private \DateTimeImmutable $birth_date;

    public function __construct(?int $id,string $name,String $birth_date){

        $this->id = $id;
        $this->name = $name;
        $this->birth_date = new \DateTimeImmutable($birth_date);

    }

    public function id() : int
    {
        return $this->id;

    }

    public function name() : string
    {

        return $this->name;
    }

    public function birthDate() : \DateTimeImmutable
    {
        return $this->birth_date;
    }


}