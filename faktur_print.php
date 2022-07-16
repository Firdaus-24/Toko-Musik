<?php
error_reporting('e_all');
session_start();


include'./koneksi/koneksi.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Faktur</title>

<link href="./css/reset.css" rel="stylesheet" type="text/css" />
<link href="./css/style.css" rel="stylesheet" type="text/css" />
<link href="./css/warna.css" rel="stylesheet" type="text/css" />
<link href="./css/input.css" rel="stylesheet" type="text/css" />
<link href="./css/font.css" rel="stylesheet" type="text/css" />
<link href="./css/menu.css" rel="stylesheet" type="text/css" />
<link href="./css/produk.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="./js/jquery-1.4.js"></script>
<script type="text/javascript" src="./js/utilities.js"></script>
<script type="text/javascript" src="./js/slideshow.js"></script>


</head>

<body onload="window.print()" class="hitam">

  <?php
                    
                $kd=$_GET['id'];
                $sqltrans=mysql_query("select
                                                a.*,
                                                b.*,
												c.*
                                           from 
                                                transaksi a,
                                                pelanggan b,
												kota c
                                            where 
                                                a.id_transaksi='$kd' and
                                                b.id_pelanggan=a.id_pelanggan  and
												c.id_kota=a.id_kota
                                                    
                                        ")or die("why ".mysql_error());
                                        
                $datatrans=mysql_fetch_array($sqltrans);
            ?>
            
<div class="lebar-100persen tinggi-600px   kiri" align="center">
     
    <div class="kiri jarak-atas-05persen lebar-100persen  padding-atas-1persen  padding-bawah-1persen  font-ukuran-22 font1 font-bold font-abu">
    	Faktur Transaksi
    </div>
    <div class=" kiri garis-kanan-1abu hitam garis-kiri-1abu garis-bawah-1abu  lebar-90persen font1 font-bold padding-atas-1persen padding-kanan-1persen padding-kiri-1persen padding-bawah-1persen jarak-kiri-5persen garis-bayang-abu2 font-ukuran-22">
    	
        <div class="kiri  lebar-70persen " align="left">
        	
            <div class="kiri jarak-kiri-1persen jarak-atas-05persen font-ukuran-18 font-putih">
            	Selamat Pemesanan Anda Berhasil, Segera Lakukan Pembayaran dan Konfirmasi Pembayaran
            </div>
        </div>
        <div class="kanan  lebar-25persen garis-kiri-1abu" align="right">
        	
            <div class="kanan jarak-kiri-1persen jarak-atas-05persen font-ukuran-18 font-putih">
            	ID Transaksi #<?php echo $datatrans['id_transaksi'];?>
            </div>
        </div>
        
        
    	
        
        
    </div>
    <div class="kiri lebar-100persen padding-bawah-1persen jarak-bawah-05persen" >
    	<div class="kiri lebar-90persen padding-atas-1persen padding-kanan-1persen  padding-bawah-1persen padding-kiri-1persen jarak-kiri-5persen garis-bawah-1abu garis-kanan-1abu garis-kiri-1abu">
        	
            <div class="kiri lebar-100persen  " align="left">
            	<?php
					  $sqldetail=mysql_query("select
                                                a.*,
                                                b.*
                                           from 
                                                detail_transaksi a,
                                                barang b
                                            where 
                                                a.id_transaksi='$kd' and
                                                b.kd_barang=a.kd_barang
                                            order by
                                                a.id_transaksi desc		
                                                    
                                        ")or die("why ".mysql_error());
                
                        $no=1;			
                        
						$grandtotal = 0;
						$grandjml = 0;
												
					  while($datakantong=mysql_fetch_array($sqldetail))
					  {
				  
				  ?>
                         <div class="kiri lebar-30persen tinggi-480px jarak-kiri-1persen   garis-kanan-1abu garis-kiri-1abu garis-atas-1abu garis-bawah-1abu garis-bayang-abu2 padding-kanan-1persen  padding-kiri-1persen" align="left">
                             
                                    
                                    <br />
                                    <p align="center">
                                        <img src="./gambar_produk/<?php echo $datakantong['foto'];?>" width="60%" />
                                    </p>
                                    <br />
                                    <hr size="1" color="#BBBBBB" />
                                    <br />
                                    <p class="font1 font-bold font-ukuran-18 font-putih" align="left"><?php echo $datakantong['nama_barang'];?></p>
                                    <br />
                                    <hr size="1" color="#BBBBBB" />
                                    <br />
                                    <p class="font1 font-bold font-ukuran-18 font-merah" align="left">
                                        Harga Barang : Rp. <?php echo number_format($subtotal=$datakantong['hrg_barang'],0,'','.');?> /Hari
                                    </p>
                                    <br />
                                    
                                    <hr size="1" color="#BBBBBB" />
                                    <br />
                                    <p align="left" class="font1 font-bold font-ukuran-18 font-putih">
                                        Jumlah Barang yang Dipesan : <?php echo $datakantong['jumlah'];?> Pcs
                                    </p>
                                    <br />
                                    
                                    <hr size="1" color="#BBBBBB" />
                                    <br /><br />
                                    <p align="left" class="font1 font-bold font-ukuran-20 font-merah">
                                        Total Harga Barang : <?php echo number_format($subtotal=$datakantong['hrg_barang']*$datakantong['jumlah'],0,'','.');?> /Hari
                                    </p>
                                    <br />
                                    
                                    
                                   
                                  
                                    
                                    
                             
                        </div>
				<?php
                            $grandjml = $datakantong['jumlah']+$grandjml;
                            $grandtotal = $subtotal+$grandtotal;
                      }
                   ?> 
            </div>	
            
            <div style="clear:both"></div>
          
         </div>
         <br>
            
            <div class="kiri lebar-100persen font1 font-bold" align="left">
            <form action="penyewaan_simpan.php" method="post" enctype="multipart/form-data">
             
             	<br>
                
                <div class="kiri lebar-45persen jarak-kiri-2persen putihabu padding-kiri-2persen garis-bayang-abu2 garis-kiri-1abu garis-kanan-1abu garis-atas-1abu garis-bawah-1abu">
                    <br />
                    <p>
                        Nama Pelanggan : 
                        
                        <?php echo $datatrans['nama_pelanggan'];?>
                    </p>
                    <br />
                    <hr size="1" color="#BBBBBB" />
                    <br />
                    <p>
                       NO. Telepon : <?php echo $datatrans['no_tlp'];?>
                    </p>
                    <br />
                    <hr size="1" color="#BBBBBB" />
                    <br />
                    <p>
                       Alamat Pengiriman : 
					   <br><br>
                       <?php echo $datatrans['alamat_kirim'];?>
                    </p>
                    <br />
                    <hr size="1" color="#BBBBBB" />
                    <br />
                    <p>
                        Kota Lokasi Pengiriman : <?php echo $datatrans['nama_kota'];?>
                    </p>
                    <br />
                    <hr size="1" color="#BBBBBB" />
                    <br />
                    <p>
                        Tanggal Transaksi : <?php echo date("d-m-Y",strtotime($datatrans['tgl_transaksi']));?>
                    </p>
                    
                    <br />
                </div>
                
                <div class="kiri lebar-45persen jarak-kiri-2persen putihabu padding-kiri-2persen garis-bayang-abu2 garis-kiri-1abu garis-kanan-1abu garis-atas-1abu garis-bawah-1abu">
                    
                    <br />
                    <p>
                        Total Barang yang di Beli : 
                        
                        [ <?php echo $grandjml;?> Pcs ]
                    </p>
                    <br />
                    <hr size="1" color="#BBBBBB" />
                    <br />
                    <p>
                        Total Harga Barang yang di Beli : 
                        
                       [ Rp.  <?php echo number_format($grandtotal,0,'','.');?> ,- ]
                    </p>
                    <br />
                    <hr size="1" color="#BBBBBB" />
                    <br />
                    <p>
                        Total Harga Ongkos Kirim : 
                        
                       [  <?php echo number_format($datatrans['total_ongkos'],0,'','.');?> ,- ]
                    </p>
                    <br />
                    <hr size="1" color="#BBBBBB" />
                    <br />
                    
                    <p>
                       Grand Total Harga Barang (Total Harga Barang + Total Ongkos Kirim)
					   
                    </p>
                    
                    <br />
                    <p class="font-biru font-ukuran-22">
                       Rp. <?php echo number_format($datatrans['total_harga'],0,'','.');?>  ,-
                    </p>
                    <br />
                    <hr size="1" color="#BBBBBB" style="margin-left:-4.5%" />
                    <br />
                    
                    <br />
                </div>
                
                
            </div>
    
    
    </div>
    
    
    
    
</div>
</body>
</html>