<?php
include'../koneksi/koneksi.php';

$id=$_GET['id'];

$bayar=mysql_query("update konfirmasi set status_konfirmasi='Lunas' where id_transaksi='$id'") or die ("Erorr Bayar".mysql_error());

if($bayar)
{
	$pesan=mysql_query("update transaksi set status_transaksi='Lunas' where id_transaksi='$id'") or die ("Error Pesan".mysql_error());
	
	echo"<script>alert('Data Berhasil Dirubah'); location.href='index.php?hal=transaksi-detail&id=$id';</script>";
}


?>