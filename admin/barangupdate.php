<?php
include'../koneksi/koneksi.php';

$id=$_POST['id'];

$namabarang=$_POST['namabarang'];
$kategori=$_POST['kategori'];
$merk=$_POST['aa'];
$fotoo=$_FILES['foto']['name'];
move_uploaded_file($_FILES['foto']['tmp_name'],"../gambar_produk/".$fotoo);
$harga=$_POST['harga'];
$keterangan=$_POST['keterangan'];
$berat=$_POST['berat'];
$stok=$_POST['stok'];


if (empty($fotoo))
{


$update=mysql_query("update barang set 
									nama_barang='$namabarang',
									id_kategori='$kategori',
									id_merk='$merk',
									keterangan='$keterangan',
									hrg_barang='$harga',
									berat='$berat',
									stok='$stok'

								where kd_barang='$id'") or die ("error edit".mysql_error());
}		
else
{
$update=mysql_query("update barang set 
									nama_barang='$namabarang',
									id_kategori='$kategori',
									id_merk='$merk',
									foto='$fotoo',
									keterangan='$keterangan',
									hrg_barang='$harga',
									berat='$berat',
									stok='$stok'

								where kd_barang='$id'") or die ("error edit".mysql_error());

	


}
	echo"<script>alert('Data Berhasil Dirubah'); location.href='index.php?hal=barang';</script>";

?>
