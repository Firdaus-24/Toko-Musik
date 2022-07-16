<?php
	session_start();
	include "../koneksi/koneksi.php";
	
	$tglskrng=date("Y-m-d");
	
	$blnIndo = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	
	$blnSkrng=date("m");
	
	$namabulan=$blnIndo[$blnSkrng-1];
	
	$tgl=date("d");
	$thn=date("Y");
	
	
?>
		
 <body onLoad="window.print()">           
            
<?php
	
		
		
		$blnLaporan=$_GET['bulan'];
		$thnLaporan=$_GET['tahun'];
		
		$sqllap=mysql_query("select*from transaksi where 
														
														month(tgl_transaksi)='$blnLaporan' and 
														year(tgl_transaksi)='$thnLaporan' ")or die(" Shittt!! ".mysql_error());
		$jml=mysql_num_rows($sqllap);
		
		
?>


	<table border="1" width="80%" cellpadding="0" cellspacing="0" align="center" bordercolor="#CCCCCC">
        <tr valign="top">
          <td width="50%" >
              <table width="100%" height="90" border="1" bordercolor="#CCCCCC" class="table">
				<tr class="th" bgcolor="#CCCCCC">
                        <th width="2%" height="42">No.</th>
                      <th width="9%">Kode Pemesanan</th>
                        <th width="15%">Tanggal Pemesanan</th>
                        <th width="15%">Nama Pelanggan</th>
                         <th width="13%">Total Pembelian</th>
                       
                  </tr>

<?php				
					$grandTotal=0;
					$blnSt=0;
					$no=0;
					while($datalap=mysql_fetch_array($sqllap))
					{
						$no=$no+1;
						$sqlpel=mysql_query("select*from pelanggan where id_pelanggan='$datalap[id_pelanggan]'")or die(" Shuckkk!! ".mysql_error());
						$datapel=mysql_fetch_array($sqlpel);
?>
					<tr class="td" bgcolor="#FFF">
                                <td align="center" height="30"><?php echo $no;?></td>
                                <td align="center"><?php echo $datalap['id_transaksi'];?></td>
                                <td align="center"><?php echo date("d m Y",strtotime($datalap['tgl_transaksi']));?></td>
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
						echo "<tr  class='td' bgcolor='#FFF' height='40'>
								<td colspan='4' align='center'>Total Penjualan Bulan $blnSt $thnLaporan</td>
								<td  align='center'>Rp. $grandTotali</td>
							 </tr>";
								
?>
		 		</table>
          </td>
        </tr>
</table>				
				
</body>