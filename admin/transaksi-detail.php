<?php
	
	$id=$_GET['id'];
	$sql=mysql_query("select a.*, b.* from
					 						transaksi a,
											pelanggan b
									where
											a.id_transaksi='$id' and
											a.id_pelanggan=b.id_pelanggan
									order by a.id_transaksi");
	$data=mysql_fetch_array($sql);
?>
<div class="lebar-100persen tinggi-650px kiri font1 font-bold jarak-atas-1persen">
	<div class="lebar-99persen tinggi-550px kiri rounded-atas-kiri-1 rounded-atas-kanan-1 rounded-bawah-kiri-1 rounded-bawah-kanan-1 border4">
    	<div class="lebar-100persen tinggi-50px kiri garis-bawah-2abu jarak-bawah-2persen">
    		<div class="font-bold kiri jarak-atas-1persen jarak-kiri-1persen">Detail Transaksi #<span class="font-merah"><?php echo $data['id_transaksi']; ?></span></div>
            
            <div class="font-bold kanan jarak-atas-1persen jarak-kanan-1persen">
            	Tanggal Transaksi <span class="font-merah"><?php echo date ("d/m/Y",strtotime($data['tgl_transaksi'])); ?></span>
            </div>
    	</div>
   
   <table width="98%" cellpadding="2" cellspacing="2" border="0" class="kiri jarak-kiri-1persen">
   		<tr>
        	<td colspan="2"></td>
        </tr>
   </table>
        
        <table width="98%" cellpadding="2" cellspacing="2" border="0" bgcolor="#F5F4CB" class="kiri jarak-kiri-1persen jarak-atas-1persen">
        	<tr>
            	<td width="14%" height="40" align="" style="padding: 10px">Nama Pelanggan</td>
                <td width="1%">:</td>
           	    <td width="47%"><?php echo $data['nama_pelanggan']; ?></td>
                <td width="24%" align="right" >Status Transaksi</td>
                <td width="1%">:
              <td width="13%" align="right" style="padding: 10px"><?php echo $data['status_transaksi']; ?></td>
            </tr>
            <tr>
            	<td height="42" align="" style="padding: 10px">No Telepon</td>
                <td>:</td>
                <td><?php echo $data['no_tlp']; ?></td>
                <td width="24%" align="right">Alamat Pengiriman</td>
                <td width="1%">:
                <td align="right" colspan="3" style="padding: 10px"><?php echo $data['alamat_kirim']; ?></td>
   		   </tr>
        </table>
        
        <table width="98%" cellpadding="2" cellspacing="2" border="1" bordercolor="#FFFFFF" class="kiri jarak-kiri-1persen">
        	<tr >
            	<td align="center" bgcolor="#F4F4F4" height="45">Nama Barang</td>
                <td align="center" bgcolor="#F4F4F4">Harga Barang</td>
                <td align="center" bgcolor="#F4F4F4">Berat Barang</td>
                <td align="center" bgcolor="#F4F4F4">Total Item</td>
                <td align="center" bgcolor="#F4F4F4">Total Berat</td>
                <td align="center" bgcolor="#F4F4F4">Total Harga</td>
            </tr>	
            <?php
				$sqlbarang=mysql_query("select a.*, b.*, c.* from
									   								detail_transaksi a,
																	barang b,
																	transaksi c
															where 
																	a.id_transaksi = '$id' and
																	b.kd_barang=a.kd_barang and
																	c.id_transaksi=a.id_transaksi") or die ("Error Data".mysql_error());
				while($dataBarang=mysql_fetch_array($sqlbarang))
				{
			?>
            <tr>
            	<td align="center" bgcolor="#F4F4F4" height="45"><?php echo $dataBarang['nama_barang']; ?></td>
                <td align="center" bgcolor="#F4F4F4">Rp. <?php echo number_format($dataBarang['harga'],'0','','.'); ?> </td>
                <td align="center" bgcolor="#F4F4F4"><?php $brt=$dataBarang['berat']*1; echo "$brt"; ?></td>
                <td align="center" bgcolor="#F4F4F4"><?php echo $dataBarang['jumlah']; ?></td>
                <td align="center" bgcolor="#F4F4F4"><?php $totber=$brt * $dataBarang['jumlah']; echo "$totber"; ?></td>
                <td align="center" bgcolor="#F4F4F4">Rp.	
						<?php 
							$total=$dataBarang['jumlah'] * $dataBarang['harga']; 
							$tothar=number_format($total,'0','','.');
							echo "$tothar";
						?>
                </td>
            </tr>
            <?php 
					$totalsub=$totalsub+$total;
			} ?>
            
            <tr>
            	<td colspan="5" height="45" align="center" bgcolor="#F5F4CB" class="font-ukuran-20"><i>Subtotal </i></td>
                <td align="center" bgcolor="#F5F4CB" class="font-ukuran-20">
					<?php 
						$sb=$totalsub ;
						$sb2=number_format($sb,'0','','.');
						echo"<i>Rp.$sb2</i>";
					?>                
                </td>
            </tr>
            <tr>
            	<td colspan="5" height="45" align="center" bgcolor="#F5F4CB" class="font-ukuran-20"><i>Total Ongkir </i></td>
                <td align="center" bgcolor="#F5F4CB" class="font-ukuran-20">
					<?php 
						$kir=$data['total_ongkos']  ;
						$kir2=number_format($kir,'0','','.');
						echo"<i>Rp.$kir2</i>";
					?>                
                </td>
            </tr>
            <tr>
            	<td colspan="5" height="45" align="center" bgcolor="#F5F4CB" class="font-ukuran-20"><i>Total Pembayaran <?php echo $data['nama_pelanggan']; ?></i></td>
                <td align="center" bgcolor="#F5F4CB" class="font-ukuran-20">
					<?php 
						$totalbayar=$totalsub+$kir ;
						$grandtotal=number_format($totalbayar,'0','','.');
						echo"<i>Rp.$grandtotal</i>";
					?>                
                </td>
            </tr>
        </table>
        <br />
		<br />
        
        <?php
			$sqlbayar=mysql_query("select * from konfirmasi where id_transaksi='$id'") or die ("Error Bayar".mysql_error());
			$dataBayar=mysql_fetch_array($sqlbayar);
			
			$cekBayar=mysql_num_rows($sqlbayar);
			
			if(empty($cekBayar))
			{
		?>
        
        <div class="lebar-98persen tinggi-100px kiri jarak-kiri-1persen jarak-atas-1persen" style="background-color:#F5F4CB">
        	<div class="font-ukuran36 font-bold tengah jarak-atas-2persen">
            	<span class="font-merah"><?php echo $data['nama_pelanggan']; ?></span> Belum Melakukan Pembayaran.
            </div>
        </div>
		<?php 
			}
			else
			{
		?>
        <table width="98%" cellpadding="2" cellspacing="2" border="1" bordercolor="#FFFFFF" class="kiri jarak-atas-3persen jarak-kiri-1persen">
        	<tr bgcolor="#F4F4F4">
            	<td align="center" height="45">No Transaksi</td>
                <td align="center">Nama Pembayar</td>
                <td align="center">Tanggal Bayar</td>
                <td align="center">Bukti Transfer</td>
                <td align="center">Bank</td>
                <td align="center">Status Pembayaran</td>
            </tr>
            <tr>
            	<td align="center" bgcolor="#F5F4CB" height="45"><?php echo $dataBayar['id_transaksi']; ?></td>
                <td align="center" bgcolor="#F5F4CB"><?php echo $dataBayar['atas_nama']; ?></td>
                <td align="center" bgcolor="#F5F4CB"><?php echo date("d/m/Y",strtotime($dataBayar['tgl_bayar'])); ?></td>
                <td align="center" bgcolor="#F5F4CB"><a href="../bukti/<?php echo $dataBayar['upload_struk']; ?>" target="_blank"><img src="../bukti/<?php echo $dataBayar['upload_struk']; ?>" width="100"  /></a></td>
                <td align="center" bgcolor="#F5F4CB"><?php echo $dataBayar['bank']; ?></td>
                <td align="center" bgcolor="#F5F4CB">
                	<?php
						if($dataBayar['status_konfirmasi']=='Belum Lunas')
						{
					?>
                    <a href="transaksi-update.php?id=<?php echo $dataBayar['id_transaksi']; ?>" style="text-decoration:underline; color:#00F">Acc Pelunasan</a>
                    <?php
						}
						else
						{
							echo "Sudah Lunas";
						}
					?>
                </td>
            </tr>
        </table>
        
        <?php } ?>
    </div>
        
</div>

<div style="clear:both"></div>
<br />
<br />
