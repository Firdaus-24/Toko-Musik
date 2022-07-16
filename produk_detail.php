<?php
error_reporting('e_all');
session_start();

/*include'validasi.php';*/
include'./koneksi/koneksi.php';

?>



<div class="lebar-100persen tinggi-600px  kiri" align="center">
	 


<?php
	$idproduk=$_GET['id'];
	$sql=mysql_query("select 
							a.*,
							b.*,
							c.*
					from 
							barang a,
							kategori b,
							merk c
					where 
							a.kd_barang='$idproduk' and
							b.id_kategori=a.id_kategori and
							c.id_merk=a.id_merk
					");
	$data=mysql_fetch_array($sql);
?>       
    
    
    <div class=" kiri lebar-90persen font1 font-bold padding-atas-1persen jarak-kiri-5persen  font-ukuran-20 jarak-atas-1persen">
    	
       
    	
        <div class="kiri lebar-99persen   jarak-atas-05persen" align="left">
            <span class="font-besar kiri hitamputih font-putih padding-atas-1-koma-5persen padding-bawah-1-koma-5persen padding-kiri-2persen padding-kanan-2persen rounded-atas-kiri-10 rounded-atas-kanan-10 garis-bayang-abu2"> 
				<?php echo $data['nama_barang'];?>
            </span>
            <span class="font-besar kanan merah font-putih padding-atas-1-koma-5persen padding-bawah-1-koma-5persen padding-kiri-2persen padding-kanan-2persen rounded-atas-kanan-10 rounded-atas-kiri-10 garis-bayang-abu2"> 
            	Rp. <?php echo number_format($data['hrg_barang'],0,'','.');?>
            </span>
        </div>
        
        
        
    </div>
    
    <div class="kiri lebar-100persen padding-bawah-1persen jarak-bawah-05persen" >
    
   
        <div class="kiri lebar-90persen  padding-kanan-1persen  padding-bawah-1persen jarak-kiri-5persen font-hitam">
        	
             <div class="kiri garis-bayang-abu2 lebar-35persen putih garis-kanan-1abu garis-kiri-1abu garis-atas-1abu garis-bawah-1abu padding-kanan-1persen" align="left">
            	<img src="./gambar_produk/<?php echo $data['foto'];?>" width="100%" />
            </div>
            <div class="kiri garis-bayang-abu2 garis-kanan-1abu garis-kiri-1abu garis-atas-1abu garis-bawah-1abu lebar-60persen jarak-kiri-3persen font1 font-bold" align="left">
            	<br />
                <p class="jarak-kiri-2persen">
                	Kategori : <?php echo $data['nama_kategori'];?>
                </p>
                <br />
                <hr size="1" color="#BBBBBB" />
                <br />
                <p class="jarak-kiri-2persen">
                	Merk : <?php echo $data['nama_merk'];?>
                </p>
                <br />
                <hr size="1" color="#BBBBBB" />
                <br />
                <p class="jarak-kiri-2persen">
                	Stok : <?php echo $data['stok'];?> Pcs
                </p>
                <br />
                <hr size="1" color="#BBBBBB" />
                <br />
                <p class="jarak-kiri-2persen">
                	Berat : <?php echo $data['berat']*1;?> Kg
                </p>
                <br />
                <hr size="1" color="#BBBBBB" />
                <br />
                <p class="jarak-kiri-2persen">
                	Deskripsi
                </p>
                <br />
                <p class="jarak-kiri-2persen" align="justify">
                	<?php echo $data['keterangan'];?>
                </p>
                <br />
                
            </div>
        
        </div>
     
        
     </div> 
     
     <div class=" kiri lebar-90persen font1 font-bold padding-atas-1persen jarak-kiri-5persen  font-ukuran-20 jarak-atas-1persen">
    	
         <div class="kiri lebar-15persen" align="left">
        	<input type="button" value="<< &nbsp; DAFTAR PRODUK" class="merah lebar-100persen rounded-atas-kiri-10 rounded-bawah-kiri-10 rounded-atas-kanan-10 rounded-bawah-kanan-10" onClick="location.href='index.php?hal=barang'" />
        </div>
        
        <div class="kanan lebar-20persen" align="right">
        	<input type="button" value="MASUKAN KE KERANJANG &nbsp; >>" class="biru lebar-100persen rounded-atas-kanan-10 rounded-bawah-kanan-10 rounded-atas-kiri-10 rounded-bawah-kiri-10" onclick="location.href='keranjang_simpan.php?id=<?php echo $data['kd_barang'];?>'"/>
		</div>
        
    </div>
     
      
    
    
</div>

<div style="clear: both"></div>
<br><br>