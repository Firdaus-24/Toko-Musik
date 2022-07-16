<?php

$halaman= $_GET['hal'];
	switch($halaman)
	{
		default;
		include'home.php';
		break;
		
		case'barang';
		include'produk.php';
		break;
		
		case'cari';
		include'cari.php';
		break;
		
		
		case'detailproduk';
		include'produk_detail.php';
		break;
		
		case'daftar';
		include'daftar.php';
		break;
		
		case'masuk';
		include'masuk.php';
		break;
		
		case'keranjang';
		include'keranjang.php';
		break;
		
		case'eror';
		include'eror.php';
		break;
		
		case'pengiriman';
		include'konfirmasi_pengiriman.php';
		break;
		
		case'transaksi_simpan';
		include'transaksi_simpan.php';
		break;
		
		case'faktur';
		include'faktur.php';
		break;
		
		case'riwayat';
		include'riwayat.php';
		break;
		
		case'konfirmasipembayaran';
		include'konfirmasipembayaran.php';
		break;
		
		case'carabeli';
		include'carabeli.php';
		break;
		
		case'carabayar';
		include'carabayar.php';
		break;
	}
?>
