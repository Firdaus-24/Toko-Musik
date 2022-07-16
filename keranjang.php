<style>
.bck:hover{
		background-color:#009ad7;	
	}
</style>

<?php
	$sqlkantongX=mysql_query("select
									a.*,
									b.*
							   from 
							   		keranjang a,
									barang b
								where 
									a.id_pelanggan='$_SESSION[pelanggan]' and
									b.kd_barang=a.kd_barang
								order by
									a.id_keranjang desc		
							")or die("why ".mysql_error());
	$kosong=mysql_num_rows($sqlkantongX);

	
	if($kosong<1)
	{
		echo "<script>document.location.href='index.php?hal=eror';</script>";
	}
	else
	{
		
		while($datakantongX=mysql_fetch_array($sqlkantongX))
			{
				
				$subtotalX=$datakantongX['jumlah_beli']*$datakantongX['hrg_barang'];
				$grandtotalX = $subtotalX+$grandtotalX;
			}

?>


<div class="lebar-95persen jarak-kiri-1persen jarak-atas-3persen">
	
    <br /><br />
    <a href="index.php?hal=barang" title="Kembali Ke Halaman Barang" class="">
        <img src="./img/back2.png" class="kiri bck hitam" width="20" style="padding:5px;border:2px solid #ccc;border-radius:100px;vertical-align:middle"  />
     </a>
        <h1 align="left" class="kiri font-hitam font1 font-bold " style="font-size:27px;margin-top:0.2%;margin-left:1%">Keranjang Belanja</h1>
   
    <div style="clear:both"></div>
    <br />
    
    
    <table width="93%" border="0" style="font-size:16px;" class="jarak-kiri-4persen font-hitam font1 font-bold">
    	<tr>
        	<td width="9%" height="38">Tanggal</td>
            <td width="2%">:</td>
        	<td width="56%"><?Php echo date("d-m-Y");?></td>
            <td width="33%" rowspan="2" align="right" style="font-size:30px">
            	Rp. <?php $grandtotaliX=number_format($grandtotalX,0,'','.'); echo $grandtotaliX; ?>,-
            </td>
        </tr>
    	<tr>
        	<td height="34">Pelanggan</td>
            <td width="2%">:</td>
        	<td><?php echo $datapel['nama_pelanggan'];?></td>
        </tr>
    
    
    
    </table>
    
    <br />
    
    
  <table width="100%" border="0" style="font-size:13px;" class="jarak-kiri-2persen abu">
        <tr class=" ">
          <td width="19%" height="50" class="padding-kiri-2persen"></td>
          <td width="28%" class="">Produk</td>
          <td width="14%" align="center" class="">Harga</td>
          <td width="20%" align="center" class="">QTY</td>
          <td width="12%" align="right" class="">Total Harga</td>
        </tr>
        <tr>
            <td colspan="6"><hr size="1" color="#CCCCCC"></td> 
       </tr>
    

<?php		$sqlkantong=mysql_query("select
									a.*,
									b.*
							   from 
							   		keranjang a,
									barang b
								where 
									a.id_pelanggan='$_SESSION[pelanggan]' and
									b.kd_barang=a.kd_barang
								order by
									a.id_keranjang desc		
							")or die("why ".mysql_error());				
			while($datakantong=mysql_fetch_array($sqlkantong))
			{
		
		?>	
		
			<tr class="putihabu" style="border-bottom:1px solid #222">
			  
              <td height="162" align="center" >
				<img src="./gambar_produk/<?php echo $datakantong['foto'];?>" width="50%" />
			  </td>
              
              <td class="">
					<?php echo $datakantong['nama_barang'];?>
         <br /><br />
                    Stok : <?php echo $datakantong['stok'];?> Produk
              </td >
			  
              <td align="center" class="">
              		Rp. <?php echo number_format($datakantong['hrg_barang'],0,'','.');?>,-
              </td>
              
			  <td align="center">
					<form action="keranjang_update.php" method="post">
						<input type="text" name="jumlah" value="<?php echo $datakantong['jumlah_beli'];?>" 
                        		size="5" maxlength="4" onKeyUp="checkNum(this)"/>
						<input type="hidden" name="kdkantong" value="<?php echo $datakantong['id_keranjang'];?>" />
                        <input type="hidden" name="page" class="merah lebar30">
						<input type="submit"  name="edit" value="EDIT" class="biru" style="font-size:11px;padding:5px;" />
					</form>      
			  </td>
			  
              <td align="right" class="">
					<?php $subtotal=$datakantong['jumlah_beli']*$datakantong['hrg_barang'];
						  $subtotali=number_format($subtotal,0,'','.');
						echo "Rp. ".$subtotali ?>,-
			  </td>
			  
              <td width="7%" align="center">
					<a href="keranjang_hapus.php?id=<?php echo $datakantong['id_keranjang'];?>&page=<?php echo $segmen3;?>" title="Hapus Produk" 
                    	onclick="return confirm('Anda Yakin Akan Menghapus Produk Ini');" style="color:#FF0000;font-size:18px;text-decoration:none">
						X				   
                    </a>			 
             </td>
			
            </tr>
		
		<?php
				$grandtotal = $subtotal+$grandtotal;
			
			}
		}	
		?>
		
  </table>
			
            
            
        	<br />
		
        	<table width="100%" border="0" style="font-size:13px;" class="jarak-kiri-2persen">
				<tr>
					<td height="39" align="right">
                   	  
                   	  <input type="button" class="biru" value="Teruskan Belanja" onClick="location.href='index.php?hal=pengiriman'" style="padding:20px 10px" />
                	</td>
                
		  	  </tr>
			</table>
            
            

</div>
<br />
<br />
