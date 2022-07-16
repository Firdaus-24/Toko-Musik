

<?php
include'../koneksi/koneksi.php';
$id=$_GET['id'];
$sql=mysql_query("select * from merk where id_merk='$id'");
$tampil=mysql_fetch_array($sql);

?>


 <div class="lebar-95persen tinggi-250px kiri garis-atas-1hitam garis-kanan-1hitam garis-kiri-1hitam garis-bawah-1hitam rounded-atas-kanan-1 rounded-atas-kiri-1 rounded-bawah-kanan-1 rounded-bawah-kiri-1 jarak-kiri-2persen jarak-atas-1persen hitam">
    	
        <div class="lebar-100persen tinggi-50px kiri rounded-atas-kanan-1 rounded-atas-kiri-1 garis-bawah-1abu">
        	<div class="font7 font-ukuran-20 jarak-atas-2persen jarak-kiri-2persen kiri font-bold font-putih font-besar">
            	Halaman Edit merk
            </div>
            
        </div>
       <form action="merkupdate.php" method="post">     
        <div class="lebar-100persen tinggi-40px kiri">
        	
        	

        </div>    
        <input type="hidden" name="id" value="<?php echo $tampil['id_merk']; ?>" />
        <table width="30%" cellpadding="2" cellspacing="2" class="jarak-atas-1persen jarak-kiri-35persen kiri  font-putih font-besar font-bold">
        	
            <tr>
            	<td>nama merk</td>
                <td><input type="text" name="namamerk" value="<?php echo $tampil ['nama_merk']; ?>" style='width: 100%'/></td>
             </tr>
           <tr>
               <td colspan="2"><input type="submit" value="UPDATE MERK" 
            class="biru rounded-atas-kiri-10 rounded-atas-kanan-10 rounded-bawah-kiri-10 rounded-bawah-kanan-10 kanan jarak-kanan-1persen       jarak-atas-1persen " /></td>
           </tr>
                             
            
        </table>   
 </form>       
 </div>
