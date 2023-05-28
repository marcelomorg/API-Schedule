<?php

class PersonRepository{

    private PDO $connection;

    function __construct(PDO $pdo){
        $this->connection = $pdo;
    }

    Public function selectPersonAll(): array{

        try{
            $sql = $this->connection->prepare("SELECT * FROM persons");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e){
            echo $e->getMessage();
            return $array=["erro"];
        }

    }
    Public function selectPersonId($id): array{

        try{
            $sql = $this->connection->prepare("SELECT * FROM persons WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e){
            echo $e->getMessage();
            return $array=["erro"];
        }

    }

    public function insertPerson(Person $person): bool{
        try{
            $sql = $this->connection->prepare("INSERT INTO persons (fist_name, surname, nick_name, birth) VALUES (?,?,?,?)");
            $sql->execute([$person->getFistName(), $person->getSurname(), $person->getNickName(), $person->getBirth()]);
            return true;
        } catch (Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    Public function updatePerson(Person $person): bool{

        try{
            $sql = $this->connection->prepare(
               "UPDATE persons 
                SET fist_name = ?, surname = ?, nick_name = ?, birth = ? 
                WHERE id = ?"
            );
            $sql->execute([
                $person->getFistName(), 
                $person->getSurname(), 
                $person->getNickName(), 
                $person->getBirth(), 
                $person->getId()
            ]);

            return true;
        } catch (Exception $e){
            echo $e->getMessage();
            return false;
        }

    }

    public function deletePerson($id): bool{
        try{
            $sql = $this->connection->prepare("DELETE FROM persons WHERE id = ?");
            $sql->execute([$id]);
            return true;
        } catch (Exception $e){
            echo $e->getMessage();
            return false;
        }
    }
}