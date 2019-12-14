<?php
require_once 'session.php'; 
if($_SESSION['user_info'] == false)
header('Location: logout.php');

require_once 'prog_db.php';
require_once 'productsAPI.php';


if(!isset($_POST['name']))
{
	prog_db_close();
header("Location: products.php");
}


$pro = prog_pros_get_by_name(trim($_POST['name']));
prog_db_close();

if ($pro != NULL)
header("Location: prodetails.php?p=$pro->prod_id");

else
header("Location:products.php");	





















?>