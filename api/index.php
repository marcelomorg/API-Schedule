<?php
require_once('../config/ReturnHeader.php');
require_once('../config/ReturnClasses.php');

class Index{

    private $varRoute;
    private $varMethod;
    public static $result;


    function __construct(){
  
        $this->varRoute = $_GET['r'];
        $this->varMethod = $_SERVER['REQUEST_METHOD'];
        $this->setRoute();

    }

    public function setRoute(){
        
        if($this->varRoute == "ping"){
            $ping = new Ping();
            Index::$result = $ping->test();
        }
    }
    
};

$seed = new Seed($pdo);
$seed->dropSeeders();
$seed->executeSeeders();


$index = new Index();
echo json_encode($index::$result);

exit;