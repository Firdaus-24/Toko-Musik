<div class="lebar-95persen kiri garis-atas-1hitam garis-kanan-1hitam garis-kiri-1hitam garis-bawah-1hitam rounded-atas-kanan-1 
    rounded-atas-kiri-1 rounded-bawah-kanan-1 rounded-bawah-kiri-1 jarak-kiri-2persen jarak-atas-1persen hitam">
    	
        <div class="lebar-100persen tinggi-50px kiri rounded-atas-kanan-1 rounded-atas-kiri-1 garis-bawah-1abu">
        	<div class="font7 font-ukuran-20 jarak-atas-2persen jarak-kiri-2persen kiri font-bold font-putih font-besar">
            	Halaman Data Barang
            </div>
            
        </div>
        
        <div class="lebar-100persen tinggi-40px kiri">
        	<a href="index.php?hal=barangtambah">
        	<input type="submit" value="Tambah Barang" 
            class="biru rounded-atas-kiri-10 rounded-atas-kanan-10 rounded-bawah-kiri-10 rounded-bawah-kanan-10 kanan jarak-kanan-1persen jarak-atas-1persen" />
            </a>
        </div>
        <table width="98%" border="1" cellpadding="2" cellspacing="2" class="jarak-atas-1persen jarak-kiri-1persen kiri font-besar">
        	<tr bgcolor="#CCCCCC">
            	<td align="center" width="34" height="30">No</td>
                <td align="center" width="254">nama	barang</td>
                <td align="center" width="254">kategori</td>
                <td align="center" width="254">merk</td>
                <td width="401" align="center">foto</td>
                <td width="401" align="center">harga</td>
                <td width="401" align="center">keterangan</td>
                <td width="401" align="center">stok</td>
                <td width="401" align="center">berat</td>
                <td width="193" align="center">Aksi</td>
            </tr>
            <?php
				include'../koneksi/koneksi.php';
				$no=1;
				$sql=mysql_query("select a.*, b.*, c.* 
													from
														barang a,
														kategori b,
														merk c
													where 
														a.id_kategori=b.id_kategori and
														a.id_merk=c.id_merk 
                                                    order by 
                                                        a.kd_barang desc") or die("Error".mysql_error());
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
                <td align="center"><?php echo $data['nama_barang']; ?></td>
                <td align="center"><?php echo $data['nama_kategori']; ?></td>
                <td align="center"><?php echo $data['nama_merk']; ?></td>
                <td align="center"><img src="../gambar_produk/<?php echo $data['foto']; ?>" width="120" /></td>
                <td align="center">Rp. <?php echo number_format($data['hrg_barang'],0,'','.'); ?></td>
                <td align="center"><?php echo $data['keterangan']; ?></td>
                <td align="center"><?php echo $data['stok']; ?></td>
				<td align="center"><?php echo $data['berat']*1; ?> Kg</td>

                <td align="center">
                <a href="index.php?hal=barangedit&id=<?php echo $data['kd_barang']; ?>"><img src="../img/edit.png" /></a>
                <a href="baranghapus.php?id=<?php echo $data['kd_barang']; ?>" onclick="return confirm ('Yakin Akan Menghapus Data <?php echo $data ['nama_barang']; ?>')"><img src="../img/hapus.png" /></a>
                
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
