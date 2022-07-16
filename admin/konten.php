<?php
$konten=$_GET['hal'];
switch($konten){
	default;
	include'beranda.php';
	break;

	
	case'kategori';
	include'kategori.php';
	break;
	
	case'editkategori';
	include'editkategori.php';
	break;
	
	case'tambahkategori';
	include'tambahkategori.php';
	break;
	
	case'beranda';
	include'beranda.php';
	break;
	
	case'barang';
	include'barang.php';
	break;
	
	case'barangtambah';
	include'barangtambah.php';
	break;
	
	case'baranghapus';
	include'baranghapus.php';
	break;
	
	case'barangedit';
	include'barangedit.php';
	break;
		
	case'merk';
	include'merk.php';
	break;
	
	case'merktambah';
	include'merktambah.php';
	break;
	
	case'merkedit';
	include'merkedit.php';
	break;
	
	case'kota';
	include'kota.php';
	break;
	
	case'kotatambah';
	include'kotatambah.php';
	break;

	case'kotaedit';
	include'kotaedit.php';
	break;
	
	case'pelanggan';
	include'pelanggan.php';
	break;
	
	case'transaksi';
	include'transaksi.php';
	break;
	
	case'transaksi-detail';
	include'transaksi-detail.php';
	break;
	
	case'laporan';
	include'laporan.php';
	break;
	

}
?>