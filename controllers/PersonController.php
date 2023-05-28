<?php

class PersonController{

    private PDO $connection;

    function __construct(PDO $pdo){
    
        $this->connection = $pdo;
    }

    public function selPersonAll(): array{

        try{
            $personRepository = new PersonRepository($this->connection);
            $result = $personRepository->selectPersonAll();
            return $result;
        } catch (Exception $e){
            echo $e->getMessage();
            return $array=['erro'];
        }
    }
    public function selPersonId($id): array{

        try{
            $personRepository = new PersonRepository($this->connection);
            $result = $personRepository->selectPersonId($id);
            return $result;
        } catch (Exception $e){
            echo $e->getMessage();
            return $array=['erro'];
        }
    }
    public function setPerson(): bool{
        $person = new Person();
        $person->setFistName($_POST["name"]);
        $person->setSurname($_POST["surname"]);
        $person->setNickName($_POST["nickName"]);
        $person->setBirth($_POST["birth"]);

        try{
            $personRepository = new PersonRepository($this->connection);
            $result = $personRepository->insertPerson($person);
            return $result;
        } catch (Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function updPerson(): bool{

        $person = new Person();
        $person->setId($_POST['id']);
        $person->setFistName($_POST["name"]);
        $person->setSurname($_POST["surname"]);
        $person->setNickName($_POST["nickName"]);
        $person->setBirth($_POST["birth"]);

        $personRepository = new PersonRepository($this->connection);

        try{
            $result = $personRepository->selectPersonId($person->getId());
            if(count($result) >= 1){
                $result = $personRepository->updatePerson($person);
                return $result;
            }
            return false;
        } catch (Exception $e){
            $e->getMessage();
            return false;
        }
    }

    public function delPersonId($id): bool{

        $personRepository = new PersonRepository($this->connection);
        $result = $personRepository->deletePerson($id);

        if($result){
            return true;
        } else{
            return false;
        }        
    }
}