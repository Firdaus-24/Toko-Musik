<?php
	
		$cari=$_GET['cari'];
		
		
			$sqlcari=mysql_query("select * from barang where nama_barang like '%$cari%' order by kd_barang desc")or die("errror".mysql_error());
			
		
		
	?>	
<br />
<br />

<div class="lebar-100persen tinggi-600px kiri " align="center">
	 
  <br>
    <h1>Hasil Pencarian : <i>"<?php echo $cari;?>"</i>
    </h1>
    <div class="kanan lebar-91persen  padding-atas-1persen  padding-bawah-1persen  jarak-atas-05persen jarak-bawah-05persen ">
    
    <?php
	
		
		
		
		
		while($data=mysql_fetch_array($sqlcari))
		{
	?>	
        <div class="putih rounded kiri lebar-30persen padding-atas-1persen padding-kanan-1persen  padding-bawah-1persen padding-kiri-1persen jarak-kiri-05persen jarak-atas-05persen  garis-bawah-1abu garis-kanan-1abu">
        	
           
            
            <div class="lebar-50persen kiri ">
        
            	<p class="padding-atas-2persen  padding-bawah-2persen padding-kiri-2persen  padding-kanan-2persen font1 font-bold jarak-atas-10persen">
                	<?php echo $data['nama_barang'];?>
                </p>
                
                <p class="padding-atas-2persen  padding-bawah-2persen padding-kiri-2persen  padding-kanan-2persen font1 font-bold jarak-atas-10persen font-merah font-ukuran-18">
                	Rp. <?php echo number_format($data['hrg_barang'],0,'','.');?>
                </p>
                
                <p class="padding-atas-2persen  padding-bawah-2persen padding-kiri-2persen  padding-kanan-2persen jarak-atas-10persen">
                	<input type="button" class="lebar-80persen orange" value="DETAIL PRODUK" onclick="location.href='index.php?hal=detailproduk&id=<?php echo $data['kd_barang'];?>'" />
                </p>
        
            </div>
            
             <div class="lebar-50persen kiri putih ">
            	<img src="./gambar_produk/<?php echo $data['foto'];?>" width="100%" />
            </div>
        
        </div>
     <?Php
		}
	?>
        
     </div> 
     
     
      
    
    
</div>

<div style="clear:both"></div>