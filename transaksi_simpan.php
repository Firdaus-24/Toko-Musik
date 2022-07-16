<?php
session_start();

include './koneksi/koneksi.php'; 

$kdplg=$_SESSION['pelanggan'];
$tohar=$_POST['tohar'];
$totongkir=$_POST['totongkos_kirim'];
$kota=$_POST['kota'];
$totitem=$_POST['totitem'];
$alamat=$_POST['alamat'];


if($alamat=="")
{
	echo "<script>alert('Maaf, Anda Harus Mengisi Alamat Pengiriman');location.href='index.php?hal=pengiriman'</script>";
	exit;
}

$tgl_skrng=date("Y-m-d");

/*membuat id transaksi otomatis*/

$tgl=date("d");
$bln=date("m");
$thn=date("Y");

$po_nomat="T$thn$bln$tgl";

$querypo="select max(id_transaksi) as last from transaksi where id_transaksi like '$po_nomat%'";
$data_idpo=mysql_query($querypo);
$hasilnomatpo = mysql_fetch_array($data_idpo);
$last_idpo = $hasilnomatpo['last'];

$last_nomatpo=substr($last_idpo, 9,3);
$next_nomatpo=$last_nomatpo+1;

$nomat_po=$po_nomat.sprintf('%03s',$next_nomatpo);

/*sampai sini*/


$simpantransaksi=mysql_query("insert into transaksi values(
												 '$nomat_po',
												 '$kdplg',
												 '$kota',
												 '$tgl_skrng',
												 'Proses',
												 '$tohar',
												 '$totitem',
												 '$alamat',
												 '$totongkir'
												 
												)")or die ("why ".mysql_error());
												
if($simpantransaksi)
  {
	  
	  
	  $sql=mysql_query("select
							  a.*,
							  b.*,
							  c.*
						 from 
							  keranjang a,
							  barang b,
							  transaksi c
						  where 
							  a.id_pelanggan='$kdplg' and
							  b.kd_barang=a.kd_barang and
							  c.id_transaksi='$nomat_po'")or die("whybarang ".mysql_error());
							  
	  while($data=mysql_fetch_array($sql))
		  {
			  $simpandetail=mysql_query("insert into detail_transaksi values(
															  '$data[id_transaksi]',
															  '$data[kd_barang]',
															  '$data[hrg_barang]',
															  '$data[jumlah_beli]'
															  
										 )")or die("whysimpan ".mysql_error());
			  
		
		  }
		  
		
		mysql_query("delete from keranjang where id_pelanggan='$kdplg'")or die('whyhapus '.mysql_error());
		
		echo"<script>alert('Transaksi Anda Telah di Proses');location.href='index.php?hal=faktur&id=$nomat_po';</script>";		
				 
		  
  }
?>