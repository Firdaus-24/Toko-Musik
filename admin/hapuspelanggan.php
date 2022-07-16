<?php
include'../koneksi/koneksi.php';

$id=$_GET['id'];

$hapus=mysql_query("delete from pelanggan where id_pelanggan ='$id'") or die ("error hapus".mysql_error()); 

echo"<script>alert('Data Berhasil Dihapus'); location.href='index.php?hal=pelanggan';</script>";


?>