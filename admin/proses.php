<?php
session_start();

include"../koneksi/koneksi.php";

	$user=$_POST['user'];
	$password=md5($_POST['password']);

	$masuk=mysql_query("select*from admin where username='$user' and password='$password'") or die ("error".mysql_error());
	
	$cekData=mysql_num_rows($masuk);

if($cekData)
{
	$data=mysql_fetch_array($masuk);
	$_SESSION['idadmin']=$data['id_admin'];
	
	echo"<script>alert('Selamat Anda Berhasil Masuk');location.href='index.php';</script>";
}
else
{
	echo"<script>alert('Username dan Password Tidak Falid');location.href='login.php';</script>";
}

?>