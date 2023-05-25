<?php
$db_host = "container-mysql";
$db_port = "3306";
$db_name = "apischedule";
$db_user = "root";
$db_password = "123456";
$pdo = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", $db_user, $db_password);
