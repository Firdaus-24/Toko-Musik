<div class="lebar-95persen kiri garis-atas-1abu garis-kanan-1abu garis-kiri-1abu garis-bawah-1abu rounded-atas-kanan-1 rounded-atas-kiri-1 
	rounded-bawah-kanan-1 rounded-bawah-kiri-1 jarak-kiri-2persen jarak-atas-1persen hitam font-putih">
    	
        <div class="lebar-100persen tinggi-50px kiri rounded-atas-kanan-1 rounded-atas-kiri-1 garis-bawah-1abu">
        	<div class="font1 font-ukuran-20 jarak-atas-2persen jarak-kiri-2persen kiri font-bold">
            	Halaman Laporan Transaksi Per Bulan
            </div>
            
        </div>

<br>
<br>


<div style="margin:20px" class="lebar-95persen kiri" align="center">
<?php
	$tglskrng=date("Y-m-d");
	
	$blnIndo = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	
	$blnSkrng=date("m");
	
	$namabulan=$blnIndo[$blnSkrng-1];
	
	$tgl=date("d");
	$thn=date("Y");
	
	if(empty($_GET['bulan']))
	{
?>
		<table border="0" width="50%" cellpadding="0" cellspacing="0" align="center" style="background-color:">
            	<tr valign="top">
                	<td width="100%" style="padding-right:20px;" >
                		<div id="body">
                        	<div class="title" align="center" style="width:100%;font-size:20px">Laporan Transaksi Bulanan</div>
                            <div class="body">
                            	<form action="index.php" method="get" enctype="multipart/form-data">
                                <input type="hidden" name="hal" value="laporan" />
                                <table width="100%" align="center">
                                	<tr>
                                    	<td height="2" colspan="4" align="center">
                                        		                                                                                                               	  
                                        </td>
                                  </tr>
                                  <tr>
                                    	<td height="11" colspan="4">
                                   		  <hr size="1" color="#CCCCCC" />                                                                                                               	  
                                        </td>
                                  </tr>
                              
                                        <td width="31%" height="54" align="center">
												Bulan &nbsp;
									  <select name="bulan" id="bulan">
												<?php
												  $bln = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
												  $bln2 = array('01','02','03','04','05','06','07','08','09','10','11','12');
													for($n=0; $n<=11; $n++){
                                      			?>
                                                		<option value="<?php echo $bln2[$n];?>" <?php if($bln2[$n]==$blnSkrng)echo "selected";?>> <?php echo $bln[$n];?></option>
                                       			 <?php } ?>
                                          </select>                                      </td>
                                        
                                    </tr>
                                    <tr>    
                                        <td width="27%" height="45" align="center">
												Tahun &nbsp;
								  <select name="tahun" id="tahun">
													<?php
													  for($n=2013; $n<=2020; $n++){ #melakukan perulangan angka 1920 s.d 2020
														 
													  ?>
                                                   			 <option value="<?php echo $n;?>" <?php if($n==$thn)echo "selected";?>>
                                                    			<?php echo $n;?>
                                                   			 </option>
                                                    <?php }?>
                                       	  </select>                                      </td>
                                    </tr>
                                    <tr>      
                                      <td width="17%" height="45" rowspan="2" align="center"><input type="submit" value="Lihat Laporan Bulanan" class="biru lebar100" />                                      	</td>
                                  </tr>
                                </table>
                              </form>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <br>
<br>

            
<?php
	}
	else
	{
		
		
		$blnLaporan=$_GET['bulan'];
		$thnLaporan=$_GET['tahun'];
		
		$sqllap=mysql_query("select*from transaksi where 
														
														month(tgl_transaksi)='$blnLaporan' and 
														year(tgl_transaksi)='$thnLaporan' ")or die(" Shittt!! ".mysql_error());
		$jml=mysql_num_rows($sqllap);
		
		
?>
	

	<table border="0" width="80%" cellpadding="0" cellspacing="0" align="center" style="font-size:12px;margin-left:0%">
        <tr valign="top">
            <td width="50%" style="padding-right:20px;" align="center">
                <table width="100%" height="88" border="0" bordercolor="#CCCCCC"  align="center">
      				<tr class="" bgcolor="#0099FF" align="center">
                        <td width="2%" height="40"  align="center">No.</th>
                        <td width="9%" align="center">ID Transaksi</th>
                        <td width="15%" align="center">Tanggal Transaksi</th>
                        <td width="15%"  align="center">Nama Pelanggan</th>
                         <td width="13%"  align="center">Total Pembelian</th>
                       
                  </tr>

<?php			
				if($jml)
				{
					$no=0;
					$grandTotal=0;
					while($datalap=mysql_fetch_array($sqllap))
					{
						$no=$no+1;
						$sqlpel=mysql_query("select*from pelanggan where id_pelanggan='$datalap[id_pelanggan]'")or die(" Shuckkk!! ".mysql_error());
						$datapel=mysql_fetch_array($sqlpel);
?>
					<tr class="td" bgcolor="#000" >
                                <td align="center" height="40"><?php echo $no;?></td>
                                <td align="center"><?php echo $datalap['id_transaksi'];?></td>
                                <td align="center"><?php echo date("d/m/Y",strtotime($datalap['tgl_transaksi']));?></td>
                                <td align="center" class="fontupper"><?php echo $datapel['nama_pelanggan'];?></td>
                                
                                <td align="center">
                                	Rp. <?php 
											$total=$datalap['total_harga'];
											echo number_format($total,0,'','.');?>
                               </td>
                                
                               
                     </tr>

						

<?php				
						$grandTotal=$grandTotal+$total;
						$blnSt=$blnIndo[$blnLaporan-1];
					}
						$grandTotali=number_format($grandTotal,0,'','.');
						echo "<tr  class='td' bgcolor='#aaa'>
								<td colspan='4' align='center'  height='40'>Total Penjualan Bulan $blnSt $thnLaporan</td>
								<td  align='center'>Rp. $grandTotali</td>
							 </tr>";
						
						echo "<a class='blue' target='_blank' href='laporancetak.php?bulan=$blnLaporan&tahun=$thnLaporan' style='padding:10px;background-color:blue;float:right;color:white;margin-left:10%'>
                                            	PRINT
                                            </a>";
						echo "<div style='clear:both'></div><br>";
				}
				else
				{
					$blnSt=$blnIndo[$blnLaporan-1];
					echo"
						<tr class='td' bgcolor='#FFF'>
							<td  colspan='8' class='fontmerah'>Laporan Pada Bulan  $blnSt $thnLaporan Tidak Ada</td>
						</tr>
						
						
											<a class='batal' href='index.php?hal=laporan' style='padding:10px;background-color:red;float:left;color:white'>
                                            	Cek Bulan Transaksi yang Lain
                                            </a>
											<div style='clear:both'></div>
											<br>
						
						
						";
				
				}
?>
		 		</table>
            </td>
        </tr>
</table>				
				
<?php
	}
?>

</div>



</div>