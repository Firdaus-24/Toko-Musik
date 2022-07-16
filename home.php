<style>

	.menu-list-6A-item:hover{
		background-color:#ffaa31;
	}
	
	.font-biru{
		color:#0099FF;
	}

</style>
<div class="lebar-100persen putih tinggi-600px kiri " align="center">
	 
     <div id="slide" class="jarak-atas-1persen garis-bawah-2abu">
    
       <img src="./slide/1.jpg" alt="large image" name="SLIDESIMG" id="SLIDESIMG" style="opacity: 1;" width="100%"  >
    
      	<script type="text/javascript" src="./js/slide-2.js"></script>
    
    </div>
    
    <div class="kiri lebar-21persen  padding-atas-1persen  padding-bawah-1persen  jarak-atas-05persen jarak-bawah-05persen ">
    	<a href="#">
            <div class="menu-list-6A-main kiri  garis-kanan-1abu garis-kiri-1abu garis-atas-1abu  padding-atas-6persen padding-bawah-6persen padding-kiri-5persen padding-kanan-5persen  jarak-kiri-8persen hover-tulisan-putih biru rounded-atas-kanan-0 rounded-atas-kiri-o garis-bayang-abu2 lebar-70persen">
                <div class="font-ukuran-14 tengah font1 font-bold font-putih ">KATEGORI PRODUK &nabla;</div>
            </div>
    	</a>
        
        <div class="biru kiri menu-list-6A garis-bayang-putih lebar-19persen">
   	
		  <?php
            $sqlkategorimenu=mysql_query("select*from kategori");
            while($datakategorimenu=mysql_fetch_array($sqlkategorimenu))
            {
        ?>	
                <a href="index.php?hal=barang&kategori=<?php echo $datakategorimenu['id_kategori'];?>">
                    <div class="font-ukuran-12 menu-list-6A-item garis-bawah-1abu garis-kiri-1abu garis-kanan-1abu font1 font-bold font-putih font-besar" align="left">
                        <?php echo $datakategorimenu['nama_kategori'];?> 
                    </div>
                </a>
            
        <?php
            }
        ?>
       </div>
    </div>
    
    <div class="kanan lebar-78persen  padding-atas-1persen  padding-bawah-1persen  jarak-atas-05persen jarak-bawah-05persen">
    
    <?php
		$sql=mysql_query("select*from barang order by kd_barang limit 6");
		while($data=mysql_fetch_array($sql))
		{
	?>	
        <div class="kiri lebar-30persen padding-atas-1persen padding-kanan-1persen  padding-bawah-1persen padding-kiri-1persen jarak-kiri-05persen jarak-atas-05persen  garis-bawah-1abu garis-kanan-1abu putih rounded">
        	
           
            
            <div class="lebar-50persen kiri ">
        
            	<p class="padding-atas-2persen  padding-bawah-2persen padding-kiri-2persen  padding-kanan-2persen font1 font-bold jarak-atas-10persen">
                	<?php echo $data['nama_barang'];?>
                </p>
                
                <p class="padding-atas-2persen  padding-bawah-2persen padding-kiri-2persen  padding-kanan-2persen font1 font-bold jarak-atas-10persen font-merah font-ukuran-18">
                	Rp. <?php echo number_format($data['hrg_barang'],0,'','.');?>
                </p>
                
                <p class="padding-atas-2persen  padding-bawah-2persen padding-kiri-2persen  padding-kanan-2persen jarak-atas-10persen">
                	<input type="button" class="lebar-80persen orange" value="DETAIL PRODUK"  onclick="location.href='index.php?hal=detailproduk&id=<?php echo $data['kd_barang'];?>'"  />
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