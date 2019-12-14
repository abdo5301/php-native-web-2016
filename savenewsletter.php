<?php

if(!isset($_GET['email']))
die('failur');

if ($_GET['email'] == "Type Your Email Here")
die('empty email');


require_once 'prog_db.php';
require_once 'newslettersAPI.php';


$result = prog_newsletters_add(trim($_GET['email']));

prog_db_close();

echo $result;


?>