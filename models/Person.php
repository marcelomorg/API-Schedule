<?php

class Person{

    private int $id;
    private string $fist_name;
    private string $surname;
    private string $nick_name;
    private string $birth;


    function __construct(){

    }

    public function getId():int{
        return $this->id;
    }

    public function setId(int $id):void{
        $this->id = $id;
    }

    public function getFistName():string{
        return $this->fist_name;
    }

    public function setFistName(string $fistname):void{
        $this->fist_name = $fistname;
    }
    
    public function getSurname():string{
        return $this->surname;
    }

    public function setSurname(string $surname):void{
        $this->surname = $surname;
    }

    public function getNickName():string{
        return $this->nick_name;
    }

    public function setNickName(string $nickName):void{
        $this->nick_name = $nickName;
    }

    public function getBirth():string{
        return $this->birth;
    }

    public function setBirth(string $birth):void{
        $this->birth = $birth;
    }

}