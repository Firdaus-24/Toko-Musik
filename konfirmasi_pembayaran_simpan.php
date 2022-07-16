<?php
error_reporting("e_all");
include "./koneksi/koneksi.php";

$idpesan=trim($_POST['idpesan']);
$bank=trim($_POST['bank']);
$atas_nama=trim($_POST['atas_nama']);
$banktrf=trim($_POST['banktrf']);
$nominal=trim($_POST['nominal']);
$tgl=trim($_POST['tgl']);
$sts="Belum Lunas";

$cek=mysql_query("select*from transaksi where id_transaksi='$idpesan'");
$sama=mysql_fetch_array($cek);
$sama2=mysql_num_rows($cek);

$cek2=mysql_query("select*from konfirmasi where id_transaksi='$idpesan'");
$sama3=mysql_num_rows($cek2);

$foto=$_FILES['bukti']['name'];

if (isset($_POST['simpan']))
    {	
		$tmpl="block";
		if(empty($bank))
		{
			$status='Maaf, Bank Anda Belum Dipilih';
		}
		else if(empty($atas_nama))
		{
			$status='Maaf, Nama Rekening Masih Kosong';
		}
		else if(empty($tgl))
		{
			$status='Maaf, Tanggal Pembayaran Masih Kosong';
		}
		else if(empty($foto))
		{
			$status='Maaf,Anda Belum Upload Bukti Struk Transfer';
		}
		else
		{
		
			move_uploaded_file($_FILES['bukti']['tmp_name'],"./bukti/".$foto);
			mysql_query("insert into konfirmasi value(	
														'',
														'$idpesan',
														'$tgl',
														'$bank',
														'$atas_nama',
														'$nominal',
														'Belum Lunas',
														'$foto')")or die ("Gagal Perintah SQL".mysql_error());
			
			
			echo"<script>alert('Konfirmasi Pembayaran Berhasil');
			document.location.href='index.php?hal=riwayat&id=$idpesan';
			</script>";
		}
	}
	else
	{
		$tmpl="none";		
	}
	
?>