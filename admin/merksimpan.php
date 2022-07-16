<?php

include "../koneksi/koneksi.php";

$nama_merk=$_POST['nama_merk'];


$cekuser=mysql_query("select * from merk where nama_merk='$nama_merk'");
$sama=mysql_num_rows($cekuser);
if($sama)
{	
	echo"<script>alert('merk sudah ada'); location.href='index.php?hal=merktambah';</script>";
	
}
else
{
	
if(empty($nama_merk))
 
	{
		echo"<script>alert('harap isi nama merk'); location.href='index.php?hal=merktambah';</script>";	
		
	}
	else
	{
		
		$simpan=mysql_query("insert into merk values('','$nama_merk')") or die ("Error".mysql_error());
		if($simpan)
		{
			echo"<script>alert('berhasil menyimpan merk $nama_merk'); location.href='index.php?hal=merk';</script>";
		}
			else
			{		
			echo"proses gagal";
			
		}
	}
}
?>