<?php
session_start();
include './koneksi/koneksi.php';

$idkeranjang=$_GET['id'];
if(!empty($idkeranjang))
{

	$sql=mysql_query("select
										a.*,
										b.*
								   from 
										keranjang a,
										barang b
									where 
										a.id_keranjang='$idkeranjang' and
										a.id_pelanggan='$_SESSION[pelanggan]' and
										b.kd_barang=a.kd_barang")or die("whybarang ".mysql_error());
				
				$data=mysql_fetch_array($sql);
				
				$stok=$data['stok']+$data['jumlah_beli'];
				
				
				$updatestock=mysql_query("update barang set stok='$stok' where kd_barang='$data[kd_barang]'")or die("whyupdate ".mysql_error());	
	
	if($updatestock)
	{
	
		mysql_query("delete from keranjang where id_keranjang='$idkeranjang'");
	}


	echo"<script>alert('Produk telah di Hapus');location.href='index.php?hal=keranjang';</script>";
}
else
{


	$sql=mysql_query("select
										a.*,
										b.*
								   from 
										keranjang a,
										barang b
									where 
										a.id_keranjang='$idkeranjang' and
										a.id_pelanggan='$_SESSION[pelanggan]' and
										b.kd_barang=a.kd_barang")or die("whybarang ".mysql_error());
				
				$data=mysql_fetch_array($sql);
				
				$stok=$data['stok']+$data['jumlah_beli'];	
				$updatestock=mysql_query("update barang set stok='$stok' where kd_barang='$data[kd_barang]'")or die("whyupdate ".mysql_error());	
	
	if($updatestock)
	{
		mysql_query("delete from keranjang where id_pelanggan='$_SESSION[pelanggan]'")or die('why '.mysql_error());
	}

	echo"<script>alert('Semua Data Belanja Anda Telah di Hapus dan di Batalkan');location.href='index.php?hal=keranjang';</script>";
}
?>