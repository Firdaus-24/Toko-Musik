<?php
session_start();
unset($_SESSION['pelanggan']);

echo"<script>alert('anda telah keluar');location.href='index.php';</script>";

?>