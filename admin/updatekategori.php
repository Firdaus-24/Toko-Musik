<?php
include'../koneksi/koneksi.php';

$id=$_POST['id'];

$nama_kategori=$_POST['namakategori'];


$update=mysql_query("update kategori set 
									nama_kategori='$nama_kategori'
									
								where id_kategori='$id'") or die ("error edit".mysql_error());
		
			echo"<script>alert('Data Berhasil Dirubah'); location.href='index.php?hal=kategori';</script>";
?>
