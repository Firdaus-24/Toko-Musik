<?php
error_reporting('e_all');
session_start();

include'./koneksi/koneksi.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Toko Musik</title>

<link href="./css/reset.css" rel="stylesheet" type="text/css" />
<link href="./css/style.css" rel="stylesheet" type="text/css" />
<link href="./css/warna.css" rel="stylesheet" type="text/css" />
<link href="./css/input.css" rel="stylesheet" type="text/css" />
<link href="./css/font.css" rel="stylesheet" type="text/css" />
<link href="./css/menu.css" rel="stylesheet" type="text/css" />
<link href="./css/produk.css" rel="stylesheet" type="text/css" />
<link href="./css/validasi.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="./js/jquery-1.4.js"></script>
<script type="text/javascript" src="./js/slideshow.js"></script>
<script type="text/javascript" src="./js/utilities.js"></script>
<script type="text/javascript" src="./js/jquery.validate.js"></script>
<script type="text/javascript" src="./js/menu.js"></script>

<style>
	.hdr{
		color:#009ad7;	
	}
	
	.hdr:hover{
		color:white;	
	}
	
	.hdr2{
		color:white;	
	}
	
	.hdr2:hover{
		background-color:#64aedf;
	}

</style>
<script>
$(document).ready(function(){
	$(".cost").toggle(
		function(){
			$(".krjg").addClass("jarak-kanan-3persen");
			$(".krjg").removeClass("jarak-kanan-1persen");
			$(".krjg").removeClass("jarak-kiri-2persen");
			$(".cost-list").slideDown("slow",function(){
				
				
				$(".cost-ico").attr("src","./img/costumer2.png");
			});
		},
		function(){
				
			$(".cost-list").slideUp("slow",function(){
				$(".krjg").removeClass("jarak-kanan-3persen");
				$(".krjg").addClass("jarak-kanan-1persen");
				$(".krjg").addClass("jarak-kiri-2persen");
				$(".cost-ico").attr("src","./img/costumer.png");
				
			});
		});
	
	$(".burger").toggle(
		function(){
		
			$(".burger-list").slideDown("slow",function(){
				$(".burger-ico").attr("src","./img/burger2.png");
				
			});
		},
		function(){
			
				
			$(".burger-list").slideUp("slow",function(){
				$(".burger-ico").attr("src","./img/burger.png");
				
			});
		});
});
</script>
</head>

<body class="putih">

<div class="kiri lebar-100persen" style="position:fixed;z-index:1000;"	>

    <div class="lebar-100persen tinggi-45px kiri hitamfull" style="padding-top:1%"  >
        <a href="index.php">
            <div class=" kiri  jarak-atas-1persen jarak-kiri-2persen hdr">
                <div class="font-ukuran-18 tengah font7 font-bold  ">TOKO MUSIK</div>
            </div>
        </a>
        
       <a href="#" class="cost">    
           <div class="kanan  jarak-atas-05persen jarak-kanan-3persen">
                <div class="font-ukuran-14 tengah font1 font-bold">
                	<img src="./img/costumer.png" width="40" style="z-index:1000;position:relative" class="cost-ico" />
                </div>
            </div>
        </a>
        
       
        <?php
                if(empty($_SESSION['pelanggan']))
                {
        ?>
       
        
        
        <div style="position:fixed;top:0;right:1.1%;min-height:1px;z-index:999;display:none" class="biru cost-list">
        	 <a href="index.php?hal=daftar">    
                <div class="  jarak-atas-75persen hdr2" align="center" style="padding:15px">
                    <div class="font-ukuran-16  font1 font-bold ">DAFTAR</div>
                </div>
            </a>
            <a href="index.php?hal=masuk">    
                <div class="hdr2" align="center" style="padding:15px">
                    <div class="font-ukuran-16 font1 font-bold">MASUK</div>
                </div>
            </a>
        </div>
        <?php
            }
            else
            {
                $sqlpel=mysql_query("select*from pelanggan where id_pelanggan='$_SESSION[pelanggan]'");
                $datapel=mysql_fetch_array($sqlpel);
        ?>
                   
                    <div class=" kiri padding-kiri-1persen garis-kiri-2putih jarak-atas-1persen jarak-kiri-2persen hdr2">
                        <div class="font-ukuran-14 tengah font1 font-bold">Hallo <?php echo $datapel['nama_pelanggan'];?></div>
                    </div>
                
               <div style="position:fixed;top:0;right:0.5%;min-height:1px;z-index:999;display:none" class="biru cost-list">
                     <a href="index.php?hal=riwayat">    
                        <div class="  jarak-atas-60persen hdr2" align="center" style="padding:15px">
                            <div class="font-ukuran-16 font1 font-bold">RIWAYAT <BR /> PESANAN</div>
                        </div>
                    </a>
                     
                     <a href="keluar.php" onclick="return confirm('Anda Ingin Keluar?'); return false"> 
                        <div class="hdr2" align="center" style="padding:15px">
                            <div class="font-ukuran-16  font1 font-bold ">KELUAR</div>
                        </div>
                    </a>
                    
                </div>  
                
        
        <?Php
            }
        ?>
       
         <a href="index.php?hal=keranjang">    
            <div class="kanan  jarak-atas-05persen jarak-kanan-1persen jarak-kiri-2persen hdr krjg">
             
            <?php
                if(empty($_SESSION['pelanggan']))
                {
                    $jmlkeranjang="0";	
                }
                else
                {
                    $sqlkeranjang=mysql_query("select*from keranjang where id_pelanggan='$_SESSION[pelanggan]'");
                    $jmlkeranjang=mysql_num_rows($sqlkeranjang);	
                }
            
            ?> 
                 <span class="badge1 merah kiri font1 font-putih font-bold font-ukuran-12"><?php echo $jmlkeranjang;?></span>
            
                <div class="font-ukuran-14 tengah font1 font-bold kiri">
                    <img src="./img/cart.png" width="40" />
                 </div>
            </div>
        </a>
        
         <a href="#" class="burger">    
           <div class="kanan  jarak-atas-05persen" style="margin-right:4.5%;">
                <div class="font-ukuran-14 tengah font1 font-bold">
                	<img src="./img/burger.png" width="40" style="z-index:1000;position:relative" class="burger-ico" />
                </div>
            </div>
        </a>
    	<div style="position:fixed;top:0;right:14.1%;min-height:1px;z-index:999;display:none" class="biru burger-list">
        	 <a href="index.php?hal=barang">    
                <div class="  jarak-atas-50persen hdr2" align="center" style="padding:15px">
                    <div class="font-ukuran-16  font1 font-bold ">PRODUK</div>
                </div>
            </a>
            <a href="index.php?hal=carabeli">    
                <div class="hdr2" align="center" style="padding:15px">
                    <div class="font-ukuran-16 font1 font-bold">CARA BELI</div>
                </div>
            </a>
            <a href="index.php?hal=carabayar">    
                <div class="hdr2" align="center" style="padding:15px">
                    <div class="font-ukuran-16 font1 font-bold">CARA BAYAR</div>
                </div>
            </a>
            
        </div>
       
    
    </div>
    
    <div class="lebar-100persen tinggi-45px kiri hitamfull" style="padding-bottom:10px">
        
       <div class=" kiri garis-atas-1abu garis-kanan-1abu garis-kiri-1abu garis-bawah-1abu  lebar-20persen jarak-kiri-2persen " style="padding:0.5% 0 0.2% 0">
              <form action=""  method="get"> 
            	<input type="hidden" name="hal" value="cari"  />     
                <input type="text" placeholder="cari produk"  name="cari" class="lebar-60persen tinggi-25px jarak-kiri-3persen  " />
                <input type="submit" value="CARI" class="biru lebar-21persen" />
             </form>
       </div>
        
    </div>


</div>

<div class="lebar-100persen  tinggi-1000px kiri jarak-atas-8persen">
	<?php
    	include'kontenuser.php';
    ?>
</div>

<div style="clear:both"></div>

<div id="footer-model-2" class="putihabu  tinggi-350px" style="border-bottom:3px solid #DDD;border-top:1px solid #DDD;">
	<div class="lebar-85persen  jarak-kiri-8persen">
    	<div class="lebar-30persen padding-kanan-1persen kiri tinggi-350px garis-kanan-1abu">
        	<div class="lebar-95persen kiri garis-bawah-1abu" style="padding:20px 0">
            	<br />
                <span class="font-ukuran-22 font1 font-bold kiri"  style="color:#222">100% PENJUAL <br />TERPERCAYA</span>
            	<img src="./img/icon-1.png" class="kanan" />
            </div>
                <p align="justify" style="font-family:Arial, Helvetica, sans-serif" class="jarak-atas-2persen kiri font-ukuran-14">
                    <br />
                    <span class="font-ukuran-18 font-bold">Tentang Kami</span>
                    <br /><br />
                    Toko Musik, Kami menawarkan produk alat musik dengan harga terjangkau namun kualitas dapat bersaing dengan 
                    produk lokal lainnya. Kami menawarkan berbagai macam alat musik seperti gitar, drum, dan soundsystem. 
                    Selain itu kami menerima pesanan dalam jumlah banyak dengan model yang anda inginkan. Selamat Berbelanja. 
                    Kepuasan konsumen adalah kepuasan kami.
                
                
            	</p>
                
            
        </div>
        <div class="lebar-30persen padding-kanan-1persen padding-kiri-2persen kiri tinggi-350px garis-kanan-1abu">
        	<div class="lebar-95persen kiri garis-bawah-1abu" style="padding:20px 0">
            	<br />
                <span class="font-ukuran-22 font1 font-bold kiri"  style="color:#222">PENGIRIMAN <br />INDONESIA</span>
            	<img src="./img/icon-2.png" class="kanan" />
            </div>
        	<img src="./img/bca.png" width="50%"  class="jarak-atas-25persen" />
            <img src="./img/jne.png" width="40%" class="jarak-atas-25persen"/>
        </div>
        <div class="lebar-30persen padding-kanan-1persen padding-kiri-2persen kiri tinggi-350px">
        	<div class="lebar-95persen kiri garis-bawah-1abu" style="padding:20px 0">
            	<br />
                <span class="font-ukuran-22 font1 font-bold kiri"  style="color:#222">24/7 DUKUNGAN <br />TEKNIS</span>
            	<img src="./img/icon-3.png" class="kanan" />
            </div>
            <p align="justify" style="font-family:Arial, Helvetica, sans-serif" class="jarak-atas-2persen kiri font-ukuran-14">
            	<br />
                <span class="font-ukuran-18 font-bold">Kontak Kami</span>
				<br /><br />
                <strong>Alamat </strong>: Jl. Raya Warung Borong km 12, Kecamatan Ciampea, Kabupaten Bogor  Indonesia <br />
				<strong>Handphone</strong> : (+62) 85773207247 <br />
				<strong>Telepone</strong> : (0251) 8312145 <br />
				<strong>Email</strong> : tokomusic@gmail.com
            
            </p>
        </div>
    </div>
</div>
<div class="lebar-100persen kiri hitamfull" style="padding:20px 0">
 <span style="color:#888;margin-left:5%">Copyright Toko Musik &copy; 2018</span>
</div>
</body>
</html>