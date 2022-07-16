<?php
session_start();

include'./koneksi/koneksi.php';

$email=$_POST['email'];
$password=$_POST['password'];

$masuk=mysql_query("select * from pelanggan where email='$email' and password='$password'");
$cekData=mysql_num_rows($masuk);

if($cekData)
{
	$data=mysql_fetch_array($masuk);
	
	$_SESSION['pelanggan']=$data['id_pelanggan'];
	
	echo"<script>alert('Anda Berhasil Masuk'); location.href='index.php';</script>";
}
else
{
	echo"<script>alert('Anda Gagal Masuk'); location.href='index.php?hal=masuk';</script>";
}

?>