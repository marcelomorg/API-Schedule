<?php

class Seed{

    private PDO $pdo;

    function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function executeSeeders(){
        $n1 = $this->tablePersons();        

        $seederTables = [$n1];
        $seederColumns =[];
        
        $cont = 0;
        while($cont < 10){
            array_push($seederColumns, $this->columnsPersons());
            $cont++;
        }
        
        for($i =0; $i < count($seederTables); $i++){
            try{
                $sql = $this->pdo->prepare($seederTables[$i]);
                $sql->execute();
            } catch (Exception $e){
               $e->getMessage();
            }
        }
        
        for($j = 0; $j < count($seederColumns); $j++){
            try{
                $sql = $this->pdo->prepare($seederColumns[$j]);
                $sql->execute();
            } catch(Exception $e){
                $e->getMessage();
            }
        }
    }

    public function dropSeeders():void{
        
        $sqlc = $this->pdo->prepare("DELETE FROM persons where id >= 0;");
        $sqlc->execute();
      
        $sqlt = $this->pdo->prepare("DROP TABLE persons;");
        $sqlt->execute();
     
    }

    private function tablePersons():string{       
            
        return "CREATE TABLE persons 
        (id bigint AUTO_INCREMENT PRIMARY KEY, 
        fist_name varchar(50) NOT NULL,
        surname varchar(100) NOT NULL,
        nick_name varchar(50),
        birth varchar(20));";

    }

    private function columnsPersons():string{
        $fist_name = "Name".rand(1, 100);
        $surname = "Surname".rand(1, 100);
        $nick_name = "Nickname".rand(1, 100);
        $dd = rand(1, 30);
        $mm = rand(1, 12);
        $yyyy = rand(1970, 2005);
        $birth = "$dd/$mm/$yyyy";
        return "INSERT INTO persons (fist_name, surname, nick_name, birth) VALUES ('{$fist_name}', '{$surname}', '{$nick_name}', '{$birth}');";
    }

}