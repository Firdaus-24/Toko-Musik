<?php
error_reporting('e_all');
session_start();

if(empty($_SESSION['idadmin']))

{
include'login.php';
exit();
}
?>