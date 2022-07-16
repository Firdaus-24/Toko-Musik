
<?php
include'../koneksi/koneksi.php';
$id=$_GET['id'];
$sql=mysql_query("select * from barang where kd_barang='$id'");
$tampil=mysql_fetch_array($sql);

?>


 <div class="lebar-95persen  kiri garis-atas-1hitam garis-kanan-1hitam garis-kiri-1hitam garis-bawah-1hitam rounded-atas-kanan-1 rounded-atas-kiri-1 rounded-bawah-kanan-1 rounded-bawah-kiri-1 jarak-kiri-2persen jarak-atas-1persen hitam">
    	
        <div class="lebar-100persen tinggi-50px kiri rounded-atas-kanan-1 rounded-atas-kiri-1 garis-bawah-1abu">
        	<div class="font7 font-ukuran-20 jarak-atas-2persen jarak-kiri-2persen kiri font-bold font-putih font-besar">
            	Halaman Edit Barang
            </div>
            
        </div>
       <form action="barangupdate.php" method="post" enctype="multipart/form-data">     
        <div class="lebar-100persen tinggi-40px kiri">
        </div>    
        <input type="hidden" name="id" value="<?php echo $tampil['kd_barang']; ?>" />
        <table width="80%" cellpadding="2" cellspacing="2" class="jarak-atas-1persen jarak-kiri-10persen kiri  font-putih font-besar font-bold">
        		<tr>
            	<td>Nama Barang</td>
                <td bgcolor=""><input type="text" name="namabarang" value="<?php echo $tampil['nama_barang']; ?>"/></td>
           
                	<td>kategori</td>
                    <td>
                      <select name="kategori">
                   		 <option value="">pilih kategori</option>
                         <?php
                         
              						$kategori=mysql_query("select * from kategori");
                                   	while ($data=mysql_fetch_array($kategori))
              						{
              					 ?>
                                   <option value="<?php echo $data ['id_kategori'];?>"
                                   <?php if ($tampil ['id_kategori']==$data['id_kategori'])
                      					 		{
                      								echo "selected='selected'";
                      							} 
              						?>>
    								          <?php echo $data ['nama_kategori']; ?>
                        </option>
                      <?php } ?>
                      </select>
                  </td>
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
                              <option value="<?php echo $dataMerk['id_merk'];?>"
          					   <?php if ($tampil ['id_merk']==$dataMerk['id_merk'])
                    			
                                {
                                	echo "selected='selected'";
                                }
                             ?>>						
								        <?php echo $dataMerk ['nama_merk'];?>
                    </option>
                    <?php } ?>
                 </select>
                 
                 </td>
               
              	
            	   <td>Foto</td>
                 <td><input type="file" name="foto"/><br><br><img src="../gambar_produk/<?php echo $tampil ['foto']; ?>" width="200" /> </td>
             </tr>
             <tr>
            	   <td>harga</td>
                <td><input type="text" name="harga" value="<?php echo $tampil['hrg_barang']; ?>"/></td>
             
             	  <td>keterangan</td>              
                <td><br><textarea name="keterangan" rows="10" cols='30'><?php echo $tampil['keterangan']; ?></textarea></td>
              </tr>
              <tr>
              	<td>berat</td>
                <td><input type="text" name="berat" value="<?php echo $tampil['berat']*1; ?>"/></td>

                <td>stok</td>
                <td><input type="text" name="stok" value="<?php echo $tampil['stok']; ?>"/></td>
              </tr> 
          <tr>
           	<td colspan="4"><input type="submit" value="Simpan barang" 
            class="biru rounded-atas-kiri-10 rounded-atas-kanan-10 rounded-bawah-kiri-10 rounded-bawah-kanan-10 kanan jarak-kanan-1persen jarak-atas-1persen " />
           	</td>
               </tr>
                             
            
        </table>   
 </form>       
        <div style="clear: both"></div>
        <br>
    </div>

<div style="clear: both"></div>
        <br>
