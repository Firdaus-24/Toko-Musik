<?php

include "../koneksi/koneksi.php";

$namakota=$_POST['namakota'];
$ongkoskrim=$_POST['ongkoskrim'];


$cekuser=mysql_query("select * from kota where nama_kota='$namakota'");
$sama=mysql_num_rows($cekuser);
if($sama)
{	
	echo"<script>alert('kota sudah ada'); location.href='index.php?hal=kotatambah';</script>";
	
}
else
{
	
if(empty($namakota))
 
	{
		echo"<script>alert('harap isi nama kota'); location.href='index.php?hal=kotatambah';</script>";	
		
	}
	else
	{
		
		$simpan=mysql_query("insert into kota values('','$namakota','$ongkoskrim')") or die ("Error".mysql_error());
		if($simpan)
		{
			echo"<script>alert('berhasil menyimpan kota $namakota'); location.href='index.php?hal=kota';</script>";
		}
			else
			{		
			echo"proses gagal";
			
		}
	}
}
?>