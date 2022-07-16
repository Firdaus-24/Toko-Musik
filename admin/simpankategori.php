<?php

include "../koneksi/koneksi.php";

$nama_kategori=$_POST['nama_kategori'];


$cekuser=mysql_query("select * from kategori where nama_kategori='$nama_kategori'");
$sama=mysql_num_rows($cekuser);
if($sama)
{	
	echo"<script>alert('kategori sudah ada'); location.href='index.php?hal=tambahkategori';</script>";
	
}
else
{
	
if(empty($nama_kategori))
 
	{
		echo"<script>alert('harap isi nama_kategori'); location.href='index.php?hal=tambahkategori';</script>";	
		
	}
	else
	{
		
		$simpan=mysql_query("insert into kategori values('','$nama_kategori')") or die ("Error".mysql_error());
		if($simpan)
		{
			echo"<script>alert('berhasil menyimpan kategori $nama_kategori'); location.href='index.php?hal=kategori';</script>";
		}
			else
			{		
			echo"proses gagal";
			
		}
	}
}
?>