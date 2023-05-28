<?php
require_once('../config/ReturnHeader.php');
require_once('../config/ReturnClasses.php');

// $seed = new Seed($pdo);
// $seed->dropSeeders();
// $seed->executeSeeders();


$route = new Route($pdo);


echo json_encode($route::$result);
exit;