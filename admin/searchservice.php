<?php
require_once 'session.php'; 
if($_SESSION['user_info'] == false)
header('Location: logout.php');

require_once 'prog_db.php';
require_once 'servicesAPI.php';


if(!isset($_POST['title']))
{
	prog_db_close();
header("Location: services.php");
}


$serv = prog_servs_get_by_title(trim($_POST['title']));
prog_db_close();

if ($serv != NULL)
header("Location: servdetails.php?p=$serv->serv_id");

else
header("Location:services.php");	





















?>