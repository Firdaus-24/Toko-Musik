<?php
include'../koneksi/koneksi.php';

$id=$_POST['id'];

$nama_merk=$_POST['namamerk'];


$update=mysql_query("update merk set 
									nama_merk='$nama_merk'
									
								where id_merk='$id'") or die ("error edit".mysql_error());
		
			echo"<script>alert('Data Berhasil Dirubah'); location.href='index.php?hal=merk';</script>";
?>
