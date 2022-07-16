<?php
session_start();

include "../koneksi/koneksi.php";

$namabarang=$_POST['namabarang'];
$kategori=$_POST['kategori'];
$merk=$_POST['aa'];
$foto=$_FILES['foto']['name'];
move_uploaded_file($_FILES['foto']['tmp_name'],"../gambar_produk/".$foto);

$harga=$_POST['harga'];
$keterangan=$_POST['keterangan'];
$stok=$_POST['stok'];
$berat=$_POST['berat'];

$cekuser=mysql_query("select * from barang where nama_barang='$namabarang'");
$sama=mysql_num_rows($cekuser);
if($sama)
{	
	echo"<script>alert('barang sudah ada'); location.href='index.php?hal=barangtambah';</script>";
	
}
else
{
	
if(empty($namabarang))
 
	{
		echo"<script>alert('harap isi nama barang'); location.href='index.php?hal=barangtambah';</script>";	
		
	}

	else
		{
		
		$simpan=mysql_query("insert into barang values('','$kategori','$merk','$namabarang','$harga','$foto','$keterangan','$stok','$berat')");
		if($simpan)
		{
			echo"<script>alert('berhasil menyimpan barang $namabarang'); location.href='index.php?hal=barang';</script>";
		}
	}
}
?>