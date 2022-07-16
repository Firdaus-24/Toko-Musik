<?php
include'../koneksi/koneksi.php';

$id=$_POST['id'];

$namakota=$_POST['namakota'];
$ongkoskrim=$_POST['ongkoskrim'];


$update=mysql_query("update kota set 
									nama_kota='$namakota',
									ongkos_kirim='$ongkoskrim'
									
								where id_kota='$id'") or die ("error edit".mysql_error());
		
			echo"<script>alert('Data Berhasil Dirubah'); location.href='index.php?hal=kota';</script>";
?>
