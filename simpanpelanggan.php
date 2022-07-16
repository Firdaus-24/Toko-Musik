<?php
session_start();

include "./koneksi/koneksi.php";

$nama=$_POST['nama'];
$telepon=$_POST['telepon'];
$email=$_POST['email'];
$password=$_POST['password'];
$alamat=$_POST['alamat'];

$cekuser=mysql_query("select * from pelanggan where email='$email'");
$sama=mysql_num_rows($cekuser);
if($sama)
{	
	echo"<script>alert('email sudah ada'); location.href='index.php?hal=daftar.php';</script>";
	
}
else
{
		
		$simpan=mysql_query("insert into pelanggan values('','$nama','$email','$password','$telepon','$alamat')");
		if($simpan)
		{
			echo"<script>alert('berhasil menyimpan pelanggan $nama'); location.href='index.php';</script>";
		}
		else
		{		
			echo"proses gagal";
			
		}
}
?>