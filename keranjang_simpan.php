<?php
error_reporting("e_all");
session_start();

include "./koneksi/koneksi.php";

/* deklarasi variable id barang */
$kdbrg=$_GET['id'];

/* deklarasi variable jumlah beli barang yang dibeli */
$jumbl=1;

/* deklarasi variable tanggal beli */
$tgl=date("Y-m-d");


/* query cek status transaksi */
$sqltrx=mysql_query("select count(*) as cnt from transaksi where id_pelanggan='$_SESSION[pelanggan]' and status_transaksi='Proses'");


/* query cek jumlah barang yang sama di tabel keranjang */
$sqljml=mysql_query("select count(*) as jumlah_beli from keranjang where id_pelanggan='$_SESSION[pelanggan]' and kd_barang='$kdbrg'");


/* query melihat data barang di tabel keranjang */
$sqlkantong=mysql_query("select*from keranjang where id_pelanggan='$_SESSION[pelanggan]' and kd_barang='$kdbrg'");


/* query melihat stok barang di tabel barang */
$sqlstok=mysql_query("select*from barang where kd_barang='$kdbrg'");


/* memproses query cek status transaksi */
$datartx=mysql_fetch_array($sqltrx);


/* memproses melihat stok barang di tabel barang */
$datastok=mysql_fetch_array($sqlstok);


/* validasi jika pelanggan belum login */
if (!isset($_SESSION['pelanggan']))
	{	
	  echo "<script>
	  			alert('Silahkan Login Terlebih Dahulu');
				location='index.php?hal=masuk'
			</script>";
		exit;
	}

/* validasi jika pelanggan belum melunasi transaksi sebelumnya (cek status transaksi) */
else if ($datartx['cnt']==1)
	{	
	  echo "<script>
				alert('Maaf Anda Tidak Dapat Melanjutkan Transaksi, Karena Transaksi Sebelumnya Belum Lunas');
				location.href='index.php?hal=riwayat';
			</script>";
		exit;
	}


/* validasi jika stok barang kosong */
else if ($datastok['stok']==0)
	{	
	  echo "<script>alert('Maaf Produk $datastok[nama_barang] Stoknya Kosong');
			document.location.href='index.php?hal=detailproduk&id=$kdbrg';
			</script>";
			exit;
	}

/* proses penyimpanan data ke keranjang jika semua validasi terpenuhi */	
else
	{
		
		/* memproses query cek jumlah barang yang sama di tabel keranjang */
		$datajml=mysql_fetch_array($sqljml);
		
		/* memproses query melihat data barang di tabel keranjang */
		$datakantong=mysql_fetch_array($sqlkantong);
		
		
		/* validasi jika barang yang di beli sudah ada di data keranjang, maka barang di tambahkan jumlah belinya  */
		if ($datajml['jumlah_beli']==1)
		{
		
			/* menghitung jumlah beli di keranjang dengan variabel jumlah beli baru  */
			$jmlkantong=$datakantong['jumlah_beli']+$jumbl;
			
			
			/* mengupdate jumlah beli di tabel keranjang  */
			$updatekantong=mysql_query("update keranjang 
														set 
															jumlah_beli='$jmlkantong' 
														where 
															id_pelanggan='$_SESSION[pelanggan]' and
															kd_barang='$kdbrg'
									    ");
			
			/* validasi jika update berhasil  */
			if($updatekantong)
			{
				
				/* query mencocokan data barang di tabel keranjang dan tabel barang  */
				$sql=mysql_query("select
										a.*,
										b.*
								   from 
										keranjang a,
										barang b
									where 
										a.id_pelanggan='$_SESSION[pelanggan]' and
										a.kd_barang='$kdbrg' and
										b.kd_barang='$kdbrg'
								  ")or die("whybarang ".mysql_error());
				
				/* memproses query mencocokan data barang di tabel keranjang dan tabel barang  */
				$data=mysql_fetch_array($sql);
				
				
				/* mengurangi stok barang di tabel barang dengan jumlah beli jika sudah berhasil dibeli  */
				$stok=$data['stok']-$jumbl;
				
				/* mengupdate stok di tabel barang  */
				$updatestock=mysql_query("update barang set stok='$stok' where kd_barang='$kdbrg'")or die("whyupdate ".mysql_error());	
			}	
		
		}
		
		/* validasi jika barang yang di beli belum ada di data keranjang  */
		else
		{	
			
			/* menambahkan atau menyimpan data barang, tanggal beli dan jumlah beli di tabel keranjang  */				
			$simpandetail=mysql_query("insert into keranjang values(
													'',
													'$kdbrg',
													'$_SESSION[pelanggan]',
													'$jumbl',
													'$tgl'
													)")or die('why'.mysql_error());
			
			
			/* validasi jika proses simpan berhasil  */
			if($simpandetail)
			{
				
				/* query mencocokan data barang di tabel keranjang dan tabel barang  */
				$sql=mysql_query("select
										a.*,
										b.*
								   from 
										keranjang a,
										barang b
									where 
										a.id_pelanggan='$_SESSION[pelanggan]' and
										a.kd_barang='$kdbrg' and
										b.kd_barang='$kdbrg'")or die("whybarang ".mysql_error());
				
				/* memproses query mencocokan data barang di tabel keranjang dan tabel barang  */
				$data=mysql_fetch_array($sql);
				
				/* mengurangi stok barang di tabel barang dengan jumlah beli di keranjang jika sudah berhasil dibeli  */
				$stok=$data['stok']-$data['jumlah_beli'];
				
				
				/* mengupdate stok di tabel barang  */
				$updatestock=mysql_query("update barang set stok='$stok' where kd_barang='$kdbrg'")or die("whyupdate ".mysql_error());	
			}									
		}
		
		/* pesan atau notifikasi jika proses menambahkan pembelian barang ke keranjang berhasil  */
		echo "<script>alert('Barang Sudah Masuk Keranjang');document.location.href='index.php?hal=keranjang';</script>";
	
	}
?>