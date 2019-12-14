<?php 

if(!isset($_GET['name']) || (!isset($_GET['city']))|| (!isset($_GET['email'])) || (!isset($_GET['message'])))

die('failur');

require_once 'prog_db.php';
require_once 'contactsAPI.php';

$result = prog_contacts_add(trim($_GET['name']),trim($_GET['city']),trim($_GET['email']),trim($_GET['message']));

echo $result;

 
?>