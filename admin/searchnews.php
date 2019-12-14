<?php
require_once 'session.php'; 
if($_SESSION['user_info'] == false)
header('Location: logout.php');

require_once 'prog_db.php';
require_once 'newsAPI.php';


if(!isset($_POST['title']))
{
	prog_db_close();
header("Location: news.php");
}


$news = prog_news_get_by_title(trim($_POST['title']));
prog_db_close();

if ($news != NULL)
header("Location: newsdetails.php?p=$news->news_id");

else
header("Location:news.php");	





















?>