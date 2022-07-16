<br>
<br>

<div  class="lebar-100persen font1 kiri font-bold  garis-bayang-abu ">

 
    
	<h1 class="kiri jarak-atas-2persen font-besar font-putih font-ukuran-22 biru" align="left" style="padding:10px 10px 10px 30px">RIWAYAT PEMESANAN</h1>
        
        
    
    
        <div  class="font-ukuran-14 jarak-bawah-10persen lebar-98persen" align="center">
                    
            <div style="clear:both"></div>
            
                <div class="lebar-100persen kiri jarak-atas-1persen">
                    <table width="90%" border="0" align="center" >
                      <tr align="center" bgcolor="">
                        <td height="36" colspan="12" align="right">
                            
                        </td>
                      </tr>
                     
                     <?php
                     $no=1;
                     $sql=mysql_query("select 
					 							a.*,b.* 
										from 
												transaksi a, pelanggan b 
										where 
												a.id_pelanggan='$_SESSION[pelanggan]' and 
												b.id_pelanggan=a.id_pelanggan order by a.id_transaksi desc");
                     
                     $jml=mysql_num_rows($sql);
                     
                     if($jml)
                     {
                         while($data=mysql_fetch_array($sql))
                         {
                         ?> 
                           <tr align="center" class="font-putih font-bold hitamfull" >
                                <td width="17%" height="36" rowspan="2" align=""><img src="./img/cart.png" width="60%" /></td>
                                <td width="19%" height="36" rowspan="2" class="font-ukuran-16" align="left">
                                	<a href="index.php?hal=faktur&id=<?php echo $data['id_transaksi'];?> " class=" font-bold font-putih">
										<u><?php echo $data['id_transaksi'];?></u>
                                    </a>
                                    <br><br>
                                    <?php echo $data['tgl_transaksi'];?>
                                    <br /><br />
                                    <?php echo $data['status_transaksi'];?>
                                </td>
                               
                                <td width="42%" class="merah font-putih font-ukuran-22" rowspan="2" style="border:1px solid #EEE">Rp. <?php echo number_format($data['total_harga'],0,'','.');?></td>
                                
                                <td width="22%" class="hijau font-putih font-ukuran-18" rowspan="2" style="border:1px solid #EEE">
                                	<?php 
										if($data['status_transaksi']=="Proses")
										{
                                    ?>
                                            <a href="index.php?hal=konfirmasipembayaran&id=<?php echo $data['id_transaksi'];?> " class="font-merah font-bold">
                                                <u>Konfirmasi Pembayaran</u>
                                            </a>
									<?php
										}
										else
										{
											echo "<span class=' font-bold font-putih'>Sudah Lunas</span>";
										}
									?>
                                </td>
                              </tr>
                              <tr align="center" class="font-hitam putihabu border1">
                              
                                
                                
                              
                               
                              </tr>
                         <?php
                         }
                      }
                      else
                      {
                          ?>
                              <tr align="center" bgcolor="#DDDDDD">
                                <td height="36" colspan="13" style="color:red">Maaf Data Tidak Ada</td>
                              </tr>
                          
                       <?php
                      }
                      ?>
                    </table>
                
                
                </div>
        
        
        </div>


</div>

<div style="clear:both"></div>
<br>
<br>
<br>