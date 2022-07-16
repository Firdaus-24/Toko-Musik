<style>
	.menu-list-10A{
		position:absolute;
		top:260px;
		left:10px;
		z-index:100;
		min-width:15%;	
		display:none;
	}
	
	.menu-list-10A-item{
		padding:15px 10px;
	}
	
	.menu-list-10A-item:hover{
		background-color:#ffaa31;
	}
	
	.font-biru{
		color:#0099FF;
	}

</style>

<script language="javascript">
$(document).ready(function(){
	$(".menu-list-10A-main").toggle(
		function(){
		
			$(".menu-list-10A").slideDown(700);
		},
		function(){
		
			$(".menu-list-10A").slideUp(700);
		});
	});

</script>

<div class="lebar-100persen tinggi-600px putih kiri" align="center">
	 
        
    <div class="kiri jarak-atas-05persen lebar-100persen  padding-atas-1persen  padding-bawah-1persen  font-ukuran-22 font7 font-bold font-biru">
    	<br>
    	DAFTAR PRODUK
    </div>
    <div style="clear: both"></div>
    <br>
    <div class="lebar-15persen tinggi-45px kiri">
        <a href="#">
            <div class="menu-list-10A-main kiri  garis-kanan-1abu garis-kiri-1abu garis-bawah-1abu  padding-atas-6persen padding-bawah-6persen padding-kiri-5persen padding-kanan-5persen  jarak-kiri-5persen hover-tulisan-putih biru">
                <div class="font-ukuran-16 tengah font1 font-bold font-putih ">KATEGORI PRODUK &nabla;</div>
            </div>
        </a>
    
       <div class="biru kiri menu-list-10A">
        
          <?php
            $sqlkategorimenu=mysql_query("select*from kategori");
            while($datakategorimenu=mysql_fetch_array($sqlkategorimenu))
            {
        ?>	
                <a href="index.php?hal=barang&kategori=<?php echo $datakategorimenu['id_kategori'];?>">
                    <div class="menu-list-10A-item garis-bawah-1abu font1 font-bold font-putih font-besar">
                        <?php echo $datakategorimenu['nama_kategori'];?>
                    </div>
                </a>
            
        <?php
            }
        ?>
       </div>
        
        
    
        
    </div>

    <div class=" kiri garis-kanan-1abu garis-kiri-1abu garis-bawah-1abu  lebar-82persen font3  padding-atas-1persen padding-kanan-1persen padding-kiri-1persen padding-bawah-1persen  garis-bayang-abu2 orange font-ukuran-14">
    	<?php
			$sqlmerk=mysql_query("select a.*,b.* from barang a, merk b where b.id_merk=a.id_merk group by a.id_merk limit 13");
			while($datamerk=mysql_fetch_array($sqlmerk))
			{
		?>
        		<a href="index.php?hal=barang&merk=<?php echo $datamerk['id_merk'];?>" class="hover-tulisan-putih ">|<?php echo $datamerk['nama_merk'];?>|</a>
        <?php
			}
		?>
    </div>
    
    <div class="kiri lebar-100persen  padding-atas-1persen  padding-bawah-1persen  jarak-atas-05persen jarak-bawah-05persen">
    
    <?php
		$isikategori=$_GET['kategori'];
		$isimerk=$_GET['merk'];
		
		if(!empty($isikategori))
		{
			$sql=mysql_query("select * from barang where id_kategori='$isikategori' order by kd_barang desc");
		}
		else if(!empty($isimerk))
		{
			$sql=mysql_query("select * from barang where id_merk='$isimerk' order by kd_barang desc");
		}
		else
		{
			$sql=mysql_query("select * from barang order by kd_barang desc");
		}
		while($data=mysql_fetch_array($sql))
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

