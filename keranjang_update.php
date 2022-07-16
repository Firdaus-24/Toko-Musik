<?php

include './koneksi/koneksi.php';

$id_keranjang=$_POST['kdkantong'];
$jumlah_beli=$_POST['jumlah'];

$cari=mysql_query("select a.*, b.* from keranjang a, barang b where a.id_keranjang='$id_keranjang' and b.kd_barang=a.kd_barang");
$querycari=mysql_fetch_array($cari);

$stock=$querycari['stok']+$querycari['jumlah_beli'];

if (empty($jumlah_beli))
	{
		echo"<script>alert('Jumlah Barang tidak boleh kosong atau nol (0)');location.href='index.php?hal=keranjang';</script>";
	}
else if (!is_numeric($jumlah_beli)) 
	{
		echo"<script>alert('Jumlah Barang Tidak dapat diinput Selain Angka');location.href='index.php?hal=keranjang';</script>";
	}
else if ($jumlah_beli>$stock) 
	{
		echo"<script>alert('Jumlah Barang Melebihi Stock Barang');location.href='index.php?hal=keranjang';</script>";
	}
else
	{
		if($jumlah_beli<=$querycari['jumlah_beli'])
			{
				$sisastok=$querycari['jumlah_beli']-$jumlah_beli;
				$stokqty=$querycari['stok']+$sisastok;
				
				$updatekeranjang=mysql_query("update keranjang set jumlah_beli='$jumlah_beli' where id_keranjang='$id_keranjang'")
								or die("whyupdate ".mysql_error());
	
				if($updatekeranjang)
				{		
					mysql_query("update barang set stok='$stokqty' where kd_barang='$querycari[kd_barang]'")or die("whyupdate ".mysql_error());	
					echo"<script>alert('Jumlah Barang Telah di Update');location.href='index.php?hal=keranjang';</script>";
				}
			}
			
		if($jumlah_beli>=$querycari['jumlah_beli'])
			{
				$sisastok=$jumlah_beli-$querycari['jumlah_beli'];
				$stokqty=$querycari['stok']-$sisastok;
				
				$updatekeranjang=mysql_query("update keranjang set jumlah_beli='$jumlah_beli' where id_keranjang='$id_keranjang'")
								or die("whyupdate ".mysql_error());
	
				if($updatekeranjang)
				{		
					mysql_query("update barang set stok='$stokqty' where kd_barang='$querycari[kd_barang]'")or die("whyupdate ".mysql_error());	
					echo"<script>alert('Jumlah Barang Telah di Update');location.href='index.php?hal=keranjang';</script>";
				}
			}
	}	
	
?>