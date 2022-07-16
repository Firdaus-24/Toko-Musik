<?php
error_reporting('e_all');
session_start();

include'validasi.php';
include'../koneksi/koneksi.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Halaman Admin</title>

<link href="../css/reset.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/warna.css" rel="stylesheet" type="text/css" />
<link href="../css/input.css" rel="stylesheet" type="text/css" />
<link href="../css/font.css" rel="stylesheet" type="text/css" />
<link href="../css/menu.css" rel="stylesheet" type="text/css" />
<link href="../css/validasi.css" rel="stylesheet" type="text/css" />

<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/jquery-1.4.js" type="text/javascript"></script>

</head>

<?php
$admin=mysql_query("select *from admin where id_admin='$_SESSION[idadmin]'");
$data=mysql_fetch_array($admin);
?>

<body class="hitamfull" style="background-image: url('../img/bg3.jpg');background-size: cover">

<div id="head-model-1" >
    <div id="nav-model-2" class="padding-bawah-1persen">
    	
       
        <div class="lebar-30persen jarak-kanan-4persen kanan font1 font-bold">
        	<span class="kiri padding-atas-4persen font-hitam jarak-atas-1persen font-besar">Hallo Firdaus [<?php echo $data ['nama']; ?>]</span>
            <span class="kiri padding-atas-3persen jarak-kiri-3persen jarak-kanan-3persen font-abu jarak-atas-1persen"> </span>
            
            <a href="keluar.php" onclick="return confirm('Anda Ingin Keluar?'); return false" 
            	class="kiri padding-atas-4persen font-merah jarak-atas-1persen keluar font-besar">
                Keluar
            </a>
        </div>
    </div>
    
    <div id="nav-model-1" class="">
    	<div class="kanan lebar-85persen">
            <a href="index.php?hal=beranda">
                <div class="menu-list-4A font-putih font-bold ">
                    BERANDA
                </div>
            </a>
            <a href="index.php?hal=kategori">
                <div class="menu-list-4B font-putih font-bold">
                   KATEGORI
                </div>
            </a>
            <a href="index.php?hal=barang">
                <div class="menu-list-4B font-putih font-bold">
                  BARANG
                </div>
            </a>
            <a href="index.php?hal=merk">
                <div class="menu-list-4B font-putih font-bold">
                   MERK
                </div>
            </a>
            <a href="index.php?hal=kota">
                <div class="menu-list-4B font-putih font-bold">
                   KOTA
                </div>
            </a>    
            <a href="index.php?hal=pelanggan">
                <div class="menu-list-4B font-putih font-bold">
                   PELANGGAN
                </div>
            </a>       
            <a href="index.php?hal=transaksi">
                <div class="menu-list-4B font-putih font-bold">
                   TRANSAKSI
                </div>
            </a>
            
            <a href="index.php?hal=laporan">
                 <div class="menu-list-4C  font-putih font-bold">    
                 	LAPORAN
                </div>
            </a>
        </div>
    </div>
</div>

<div style="clear:both"></div>

<div id="konten-model-4" class="jarak-atas-1persen">
	<!--img src="../img/bg-home.png" class="jarak-atas-3persen jarak-bawah-3persen jarak-kiri-10persen" -->
    <?php include'konten.php'; ?>
</div>

</body>
</html>