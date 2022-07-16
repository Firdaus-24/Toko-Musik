
    <div class="lebar-95persen kiri garis-atas-1hitam garis-kanan-1hitam garis-kiri-1hitam garis-bawah-1hitam rounded-atas-kanan-1 rounded-atas-kiri-1 rounded-bawah-kanan-1 rounded-bawah-kiri-1 jarak-kiri-2persen jarak-atas-1persen hitam">
    	
        <div class="lebar-100persen tinggi-50px kiri rounded-atas-kanan-1 rounded-atas-kiri-1 garis-bawah-1abu">
        	<div class="font7 font-ukuran-20 jarak-atas-2persen jarak-kiri-2persen kiri font-bold font-putih font-besar">
            	Halaman Data pelanggan
            </div>
            
        </div>
        
        <div class="lebar-100persen tinggi-40px kiri"></div>
        <table width="98%" border="1" cellpadding="2" cellspacing="2" class="jarak-atas-1persen jarak-kiri-1persen kiri font-besar">
        	<tr bgcolor="#CCCCCC">
            	<td align="center" width="34" height="30">No</td>
                <td align="center" width="254">nama pelanggan</td>
                <td width="401" align="center">email</td>
                <td width="401" align="center">password</td>
                <td width="401" align="center">no tlp</td>
                <td width="401" align="center">alamat</td>
                <td width="401" align="center">aksi</td>
                
            </tr>
            <?php
				include'../../koneksi/koneksi.php';
				$no=1;
				$sql=mysql_query("select*from pelanggan");
				while($data=mysql_fetch_array($sql))
				{
					if($baris%2==0)
					{
						$warna="#F9F9F9";	
					}
					else
					{
						$warna="#E5E5E5";
					}
			?>
            <tr bgcolor="<?php echo $warna; ?>">
            	<td align="center" height="40"><?php echo $no++; ?></td>
                <td align="center"><?php echo $data['nama_pelanggan']; ?></td>
                <td align="center"><?php echo $data['email']; ?></td>
                <td align="center"><?php echo $data['password']; ?></td>
                <td align="center"><?php echo $data['no_tlp']; ?></td>
                <td align="center"><?php echo $data['alamat']; ?></td>
                <td align="center">
                
                <a href="hapuspelanggan.php?id=<?php echo $data['id_pelanggan']; ?>" onclick="return confirm ('Yakin Akan Menghapus Data <?php echo $data ['nama_pelanggan']; ?>')"><img src="../img/hapus.png" /></a>
                
                </td>
            </tr>
            <?php
				$baris++;
				}
			?>
        
        </table>   
        
    <div style="clear: both"></div>
        <br><br>
    </div>
    
<div style="clear: both"></div>
        <br><br>
