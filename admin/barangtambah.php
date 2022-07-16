

<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
			var validator = $("#tambah").validate({
				rules:{
					namabarang:{required:true},
					kategori:{required:true},
					aa:{required:true},
					foto:{required:true},
					harga:{required:true},
					keterangan:{required:true},
					berat:{required:true},
					stok:{required:true}				
				},
				messages:{
					namabarang:{required:'harap isi nama barang'},
					kategori:{required:'pilih kategori'},
					aa:{required:'pilih merk'},
					foto:{required:'foto belum dipilih'},
					harga:{required:'harap tentukan harga'},
					keterangan:{required:'harap isi keterangan'},
					berat:{required:'harap tentukan berat barang'},
					stok:{required:'harap isi stok'}
				},
				success:
					function(label) {label.text('Benar').addClass('valid');}
			});
	});
</script>


	
    <div class="lebar-95persen  kiri garis-atas-1hitam garis-kanan-1hitam garis-kiri-1hitam garis-bawah-1hitam rounded-atas-kanan-1 rounded-atas-kiri-1 rounded-bawah-kanan-1 rounded-bawah-kiri-1 jarak-kiri-2persen jarak-atas-1persen hitam">
    	
        <div class="lebar-100persen tinggi-50px kiri rounded-atas-kanan-1 rounded-atas-kiri-1 garis-bawah-1abu">
        	<div class="font7 font-ukuran-20 jarak-atas-2persen jarak-kiri-2persen kiri font-bold font-putih font-besar">
            	Halaman Tambah barang
            </div>
            
        </div>
       <form action="barangsimpan.php" method="post" enctype="multipart/form-data" id="tambah">     
        <div class="lebar-100persen tinggi-40px kiri">
        	
        	

        </div>    
        <table width="80%" cellpadding="2" cellspacing="2" class="jarak-atas-1persen jarak-kiri-10persen kiri font-putih font-besar font-bold">
        	<tr>
            	<td>Nama Barang</td>
                <td bgcolor=""><input type="text" name="namabarang"/></td>
            
            	<td>kategori</td>

                <td><select name="kategori">
               		 <option value="">pilih kategori</option>
                     <?php
                     	include'../koneksi/koneksi.php';
						$kategori=mysql_query("select * from kategori");
                     	while ($data=mysql_fetch_array($kategori))
						{
					 ?>
                     <option value="<?php echo $data ['id_kategori'];?>"><?php echo $data ['nama_kategori']; ?></option>
                     <?php } ?>
                </select></td>
             </tr>
             <tr>
             	<td>Merk</td>
             	<td><select name="aa">
                	<option value="">pilih merk</option>
                    <?php
						$merk=mysql_query("select * from merk");
						while ($dataMerk=mysql_fetch_array($merk))
						{
					?>
                    <option value="<?php echo $dataMerk['id_merk'];?>"><?php echo $dataMerk ['nama_merk'];?></option>
                    <?php } ?>
                 </select>
                 
                </td>
              
            	<td>Foto</td>
                <td><input type="file" name="foto"/></td>
             </tr>
             <tr>
            	<td>harga</td>
                <td><input type="text" name="harga"/></td>
             
             	<td>keterangan</td>
                <td><textarea name="keterangan" rows="10" cols='30'></textarea></td>
              </tr>
              <tr>
             	<td>stok</td>
                <td><input type="text" name="stok"/></td>
              
              	<td>berat</td>
                <td><input type="text" name="berat"/></td>
              </tr>               
            <tr>
            <td colspan="4"><input type="submit" value="Simpan Barang" 
            class="biru rounded-atas-kiri-10 rounded-atas-kanan-10 rounded-bawah-kiri-10 rounded-bawah-kanan-10 kanan jarak-kanan-1persen 		jarak-atas-1persen " />
            </td>
           </tr>
        </table>   
    </form>       
        <div style="clear: both"></div>
        <br>
    </div>

