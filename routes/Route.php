<?php
class Route{


    private $getRoute;
    private $getOption;
    private $method; 
    private PDO $pdo;
    public static $result;


    function __construct(PDO $pdo){
        
        $this->pdo = $pdo;
        $this->getRoute = $_GET['r'];
        $this->getOption = $_GET['opt'] ?? null;
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->setRoute();
    }

    public function setRoute(){
        
        if($this->getRoute == "ping" && $this->method == "get"){
            $ping = new Ping();
            Route::$result = $ping->test();
        }


        if($this->getRoute == 'selpersonall' && $this->method == 'get'){

            $personController = new PersonController($this->pdo);
            Route::$result = $personController->selPersonAll();
        }
        if($this->getRoute == 'selperson' && $this->method == 'get'){

            $personController = new PersonController($this->pdo);
            Route::$result = $personController->selPersonId($this->getOption);
        }
        if($this->getRoute == 'setperson' && $this->method == 'post'){
            
            $personController = new PersonController($this->pdo);
            Route::$result = $personController->setPerson();

        }
        if($this->getRoute == 'updperson' && $this->method == 'post'){

            $personController = new PersonController($this->pdo);
            Route::$result = $personController->updPerson();
        }
        if($this->getRoute == 'delperson' && $this->method == 'get'){

            $personController = new PersonController($this->pdo);
            Route::$result = $personController->delPersonId($this->getOption);
        }
        
    }

};;