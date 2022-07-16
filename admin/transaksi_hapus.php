<?php
	include'../koneksi/koneksi.php'; 
	$id=$_GET['id'];
	
	mysql_query("delete from konfirmasi where id_transaksi='$id'") or die ("Gagal Hapus".mysql_error());
	mysql_query("delete from detail_transaksi where id_transaksi='$id'") or die ("Gagal Hapus".mysql_error());
	mysql_query("delete from transaksi where id_transaksi='$id'") or die ("Gagal Hapus".mysql_error());
	
	echo"<script>alert('Data Transaksi Berhasil di Hapus'); location.href='index.php?hal=transaksi';</script>";
	
?>