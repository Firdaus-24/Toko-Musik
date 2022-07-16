<br />
<br />
<br />

<style>
.bck:hover{
		background-color:#009ad7;	
	}
</style>


<?php
				
              
			   
        $tampil=mysql_query("select* from kota");
        $data=mysql_fetch_array($tampil);
			  
			  $sqlpel=mysql_query("select * from pelanggan where id_pelanggan='$_SESSION[pelanggan]'");
			  $datapel=mysql_fetch_array($sqlpel);
			  
			  if (isset($_POST['update']))
				{
					$hargaongkos_kirim1=$_POST['ongkir'];
					
					$sqlhargaongkos_kirim1=mysql_query("select*from kota where id_kota='$hargaongkos_kirim1'");
					$dataongkos_kirim1=mysql_fetch_array($sqlhargaongkos_kirim1);
					
					$hargaongkos_kirim2=$dataongkos_kirim1['ongkos_kirim'];
					$alamat_kirim1=$_POST['alamat'];
					$keterangan="* Data Ongkos Kirim Anda Telah Terupdate, 
								<br>Silahkan Klik 'PROSES' Jika Data Ongkos Kirim Anda Telah Sesuai";
				}
              else
			  {
			  		$hargaongkos_kirim1=$data['id_kota'];
			  		$hargaongkos_kirim2=$data['ongkos_kirim'];
					$alamat_kirim1=$data['alamat'];
			  		$keterangan="* Silahkan Klik 'PROSES' Jika Data Pengiriman Anda Di Atas Telah Sesuai
								 <br>Jika Anda Ingin Mengirim ke Alamat yang berbeda silahkan Update Ongkos Kirim";
			  }
              ?>
              

<div class="lebar-95persen jarak-atas-1persen jarak-kiri-1persen fontukuran14">
	
  
    
    <br /><br />
    <a href="index.php?hal=keranjang" title="Kembali Ke Halaman Keranjang" class="">
        <img src="./img/back2.png" class="kiri bck" width="20" style="padding:5px;border:2px solid white;border-radius:100px;vertical-align:middle"  />
     </a>
        <h1 align="left" class="kiri font_hitam font1 font-bold " style="font-size:27px;margin-top:0.2%;margin-left:1%">Konfirmasi Transaksi</h1>
   
    <div style="clear:both"></div>
    
  <br />
  <table width="99%" border="0" style="font-size:16px;" class="jarak-kiri-4persen font_hitam font1 font-bold">
    	<tr>
        	<td width="8%" height="38">Tanggal</td>
            <td width="1%">:</td>
        	<td width="39%"><?Php echo date("d-m-Y");?></td>
            <td width="52%" rowspan="4" align="right" >
            	<table width="100%" border="0" class="font-ukuran-14">
                  
                <tr align="left">
                     <td width="52%">
                 
                     <form action="" method="post">
                        <table width="100%">
                            
                            <tr>
                                <th width="36%" height="31" class="font-hitam">Kota</th>
                                <td width="5%">:</td>
                                <td width="59%">
                                    <?php
                
                                        $result = mysql_query("select * from kota");
                                        $jsArray = "var prdName = new Array();\n";
                                        
                                        echo '<select name="ongkir" 
                                                    onchange="document.getElementById(\'okr\').value = prdName[this.value]" style="width:250px;">';
                                        echo "<option value=''> -Pilih- </option>";
                                    
                                                while ($row = mysql_fetch_array($result)) 
                                                {
                                                    echo "<option value='$row[id_kota]'";
                                                            if ($hargaongkos_kirim1==$row['id_kota']) echo "selected='selected'"; echo ">";
                                                    
                                                     echo $row['nama_kota']; echo"</option>";
                                            
                                                    $jsArray .= "prdName['" . empty($row['id_kota']) . "'] = '" . addslashes('') . "';\n";
                                                    $jsArray .= "prdName['" . $row['id_kota'] . "'] = '" . addslashes($row['ongkos_kirim']) . "';\n";
                                                
                                                }
                                            
                                        
                                        echo '</select>';
                                    ?>   
                                
                                </td>
                            </tr>
                            <tr>
                                <th height="55" class="font-hitam">Harga Ongkos Pengiriman</th>
                                <td width="5%">:</td>
                                <td class="font-hitam">
                                        Rp. <input type="text" size="20" disabled="disabled" name="harga" id="okr" value="<?php echo $hargaongkos_kirim2;?>">
                                            
                                     <script type="text/javascript">
                                                <?php
                                                    echo $jsArray;
                                                ?>
                                            </script>
                        
                              </td>
                            </tr>
                            <tr align="left">
                                <th height="31" class="font-hitam">Alamat Tujuan Pengiriman</th>
                                <td width="5%">:</td>
                              <td><textarea name="alamat" cols="50" rows="6"><?php echo $alamat_kirim1; ?></textarea>
                          </tr>
                          <tr>
                            <td colspan="2">
                                <input name="update" class="biru kiri" type="submit" value="UPDATE ONGKOS KIRIM" style="padding:10px 30px"  />
                            </td>
                            <td style="color:#FF0000" class="fontukuran11">
                                <?php echo $keterangan;?>
                            </td>
                          </tr>
                          
                        </table>
                        </form>
                    </td>
              </tr>
                  
                  
                      
           </table>
            </td>
        </tr>
    	<tr>
        	<td height="34" valign="top">Pelanggan</td>
            <td width="1%"  valign="top">:</td>
        	<td  valign="top"><?php echo $datapel['nama_pelanggan'];?></td>
        </tr>
        <tr>
        	<td height="34" valign="top">E-Mail</td>
            <td width="1%"  valign="top">:</td>
        	<td  valign="top"><?php echo $datapel['email'];?></td>
        </tr>
        <tr>
        	<td height="34" valign="top">No. Telp</td>
            <td width="1%"  valign="top">:</td>
        	<td  valign="top"><?php echo $datapel['no_tlp'];?></td>
        </tr>
    
    
    
    </table>  
 

  <br><br>
        
        <table width="65%" border="0" style="font-size:13px;" class="jarak-kiri-2persen abu kiri">
			<tr style="font-weight:bold;">
          	  <td width="8%" align="center" class="">No.</td>
       		  <td width="29%" height="46"  align="left" class="">Nama</td>
			  <td width="11%" align="right" class="">Harga barang</td>
              <td width="8%" align="center" class="">Kuantitas</td>
			  <td width="8%"  align="center" class="">Berat/Kg</td>
              <td width="8%"  align="center" class="">Total Berat</td>
			  <td width="21%"  align="right" class="padding-kanan-1persen">Total Harga</td>
          </tr>
          <tr>
    		<td colspan="7"><hr size="1" color="#CCCCCC"></td> 
   		 </tr>
		<?php
				$sqlkantong=mysql_query("select
												a.*,
												b.*
										   from 
												keranjang a,
												barang b
											where 
												a.id_pelanggan='$_SESSION[pelanggan]' and
												b.kd_barang=a.kd_barang
											order by
												id_keranjang desc		
										")or die("why ".mysql_error());
				$kosong=mysql_num_rows($sqlkantong);
				
				if($kosong<1)
				{
					
					echo "<script>document.location.replace('index.php');</script>";
				}
				else
				{
						$no=1;		
						
							$grandtotal = 0;
							$totalitem = 0;
							$totalberat=0;
								
						while($datakantong=mysql_fetch_array($sqlkantong))
						{
					
					?>	
					
						<tr class="putihabu" style="border-bottom:1px solid #222">
						  <td align="center" ><?php echo $no++;?></td>
                          <td height="63"><?php echo $datakantong['nama_barang'];?></td>
						  
                          <td align="right">Rp. <?php
						  			 $hargai=number_format($datakantong['hrg_barang'],0,'','.');
									 echo $hargai ?>,-</td>
                          
                                    
                          <td  align="center"><?php echo $datakantong['jumlah_beli'];?></td>
                          <td  align="center"><?php echo $datakantong['berat']*1;?> Kg</td>
						  <td align="center" >
								<?php $subberat=$datakantong['berat']*$datakantong['jumlah_beli'];
									  
									echo $subberat ?> kg
						  </td>	
						  
                          <td align="right" class="padding-kanan-1persen">
								<?php $subtotal=$datakantong['jumlah_beli']*$datakantong['hrg_barang'];
									  $subtotali=number_format($subtotal,0,'','.');
									echo "Rp. ".$subtotali ?>,-
						  </td> 
						
                        </tr>
					<?php
							$grandtotal = $subtotal+$grandtotal;
							$totalitem = $datakantong['jumlah_beli']+$totalitem;
							$totalberat=$subberat+$totalberat;
						}
					}	
					?>
  			</table>
            
    			
                
         <div align="right">
         
  			<table width="30%" height="322" style="border-left:1px #CCCCCC solid;border-top:1px #CCCCCC solid;
            		border-right:1px #CCCCCC solid;border-bottom:1px #CCCCCC solid;padding:10px 0 10px 10px" class="fontukuran12 abu kanan">
			
				
                <tr >
                	  	<td height="48" class="padding-kiri-2persen">Total Berat</td>
                  		<td>:</td>
                  	  	<td width="41%" align="right" class="padding-kanan-2persen"><strong><?php echo ceil($totalberat);?> Kg</strong>
                        </td>
               </tr>
               
               <tr class="putihabu">
                	  	<td height="48" class="padding-kiri-2persen">Total Kuantitas</td>
                 		<td>:</td>
                      	<td width="41%" align="right" class="padding-kanan-2persen"><strong><?php echo $totalitem;?> item</strong></td>
               </tr>
               
               <?php
			   		if (isset($_POST['update']))
					{
						$hargaongkos_kirim=$_POST['ongkir'];
						$alamat_kirim=$_POST['alamat'];
						
						$sqlhargaongkos_kirim=mysql_query("select*from kota where id_kota='$hargaongkos_kirim'");
						$dataongkos_kirim=mysql_fetch_array($sqlhargaongkos_kirim);
					?>
               <tr >
                	  	<td height="21" class="padding-kiri-2persen">Ongkos Kirim </td>
                  		<td>:</td>
                      	<td width="41%" align="right" class="padding-kanan-2persen">
                      		<strong>Rp. <?php $ongkos_kirimi=number_format($dataongkos_kirim['ongkos_kirim'],0,'','.'); echo $ongkos_kirimi;  ?>,-</strong>
                      	</td>
               			
               </tr>
               	<?php
						$totalongkos_kirim=$dataongkos_kirim['ongkos_kirim']*ceil($totalberat);
					}
					else
					{
					?>
               <tr >
                	  	<td height="21" class="padding-kiri-2persen">Ongkos Kirim</td>
                  		<td>:</td>
                      	<td width="41%" align="right" class="padding-kanan-2persen">
                      		<strong>Rp. <?php $ongkos_kirimi=number_format($data['ongkos_kirim'],0,'','.'); echo $ongkos_kirimi;  ?>,-</strong>
                      	</td>
               </tr>
               	<?php
						$totalongkos_kirim=$data['ongkos_kirim']*ceil($totalberat);
						$alamat_kirim=$data['alamat'];
					}
					?>
               
               <tr >
                 <td colspan="3"><hr size="1" color="#CCCCCC"></td> 
               </tr>
               
               <tr class="putihabu">
                	  	<td height="53" class="padding-kiri-2persen">Total Ongkos Kirim</td>
                  		<td>:</td>
                      	<td width="41%" align="right" class="padding-kanan-2persen">
                      		<strong>Rp. <?php $ongkos_kirimi=number_format($totalongkos_kirim,0,'','.'); echo $ongkos_kirimi; ?>,-</strong>
                      	</td>
               </tr>
               
               <tr >
                  	<td width="55%" height="44" class="padding-kiri-2persen">Total Harga Barang</td>
           		  	<td width="4%">:</td>
				 <td  align="right" class="padding-kanan-2persen"><strong>
                        Rp. <?php $grandtotali=number_format($grandtotal,0,'','.'); 
                                        echo $grandtotali; ?>,-</strong>                    
               	 </td>
               </tr>
               
               <tr >
                 <td height="9" colspan="3"><hr size="1" color="#CCCCCC"></td> 
               </tr>
               
               <tr class="putihabu">
                	  	<td height="53" class="padding-kiri-2persen"><b>Total Pembelian</b></td>
                 		<td>:</td>
                      	<td width="41%" align="right" class="padding-kanan-2persen">
                      	<strong>
							<?php $total=$grandtotal+$totalongkos_kirim?>
                 			Rp. <?php $totali=number_format($total,0,'','.'); 
								  echo $totali; ?>,-
                        </strong>
                     	</td>
               </tr>
            
		   </table>
            
         </div>
		<div style="clear:both"></div>				
		 <br>
        	
			<table width="100%">
                <tr>
                <td height="54" align="right" >
                
					<form action="transaksi_simpan.php" method="post">
                        <input type="hidden" name="kota" value="<?php echo $hargaongkos_kirim1;?>" />
                        <input type="hidden" name="tohar" value="<?php echo $total;?>" />
                        <input type="hidden" name="totitem" value="<?php echo $totalitem;?>" />
                        <input type="hidden" name="totongkos_kirim" value="<?php echo $totalongkos_kirim;?>" />
                        <input type="hidden" name="alamat" value="<?php echo $alamat_kirim1;?>" />
                        <input name="selesai" class="biru kanan jarak-kanan-05persen" type="submit" value="PROSES" style="padding:20px 30px" onclick="location.href='index.php?hal=transaksi_simpan'" />
                    </form>
                </td>
              </tr>
            </table>
            
           <br><br>          
</div>