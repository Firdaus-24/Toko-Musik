<?php
session_start();
unset($_SESSION['idadmin']);

echo"<script>alert('anda telah keluar');location.href='login.php';</script>";

?>