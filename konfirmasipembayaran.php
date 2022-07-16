<?php
	$sqlpesan=mysql_query("select*from transaksi where id_transaksi='$_GET[id]'");
	$datapesan=mysql_fetch_array($sqlpesan);
	
	$sqlbayar=mysql_query("select*from konfirmasi where id_transaksi='$_GET[id]'");
	$jmlbayar=mysql_num_rows($sqlbayar);
	$databayar=mysql_fetch_array($sqlbayar);
	
	     
	  if($jmlbayar)
	  {
		  $judulbayar="Anda Telah Melakukan ";
		  $nontampil="none";	
	  }
	  else
	  {
	  
		  $judulbayar="";
		  $nontampil="block";	
		  
	  }
?>
<br>
<br>

<div  class="lebar-100persen font1 kiri font-bold garis-atas-1abu garis-bayang-abu ">
    
	<h1 class="kiri jarak-atas-2persen font-besar font-hitam font-ukuran-22 biru" align="left" style="padding:10px 10px 10px 30px">KONFIRMASI PEMBAYARAN</h1>
        
        
   
	<br>

	<div  class="font-ukuran-14 jarak-bawah-10persen lebar-98persen font-hitam" align="center">
                    
           	<?php
			include 'konfirmasi_pembayaran_simpan.php';
			?>
            
    	
        <div align="center" style="margin :10px 0;padding:10px;display:<?php echo $tmpl;?>" class="lebar-70persen merah">
            
            
            <font color="#FFF" face='verdana' size='2'><?php echo $status ?></font>
        </div>
        
        <br>
        
    
    <form action="" method="post" enctype="multipart/form-data">
    
        <div align="center">
            <table width="50%" border="0">
            
                <tr>
                    <td width="42%" height="35">ID Transaksi <b style="color:#FF0000">*</b></td>
                    <td width="58%">
                        <input type="text"  class="inputmember" name="idpesan"   value="<?php echo $_GET['id'];?>" <?php echo $nonaktif ;?>   readonly >
                    </td>
              </tr>
               <tr>     
                    <td width="42%">Tanggal Konfirmasi Pembayaran <b style="color:#FF0000">*</b></td>
                 	<td width="58%">
                    <?php
                    	if($jmlbayar)
                        {
						?>
                            <input type="text" value="<?php echo $databayar['tgl_bayar'];?>"  class="inputmember" disabled />
                        <?php
                        }
                        else
                        {
                        ?>
                        <input type="text"  readonly name="tgl" placeholder="yyyy-mm-dd"  
                        	value="<?php echo date("Y-m-d");?>" class="inputmember" >
                 		
                        <?php
						}
						?>
                        
                        </td>
              </tr>
              <tr>     
                    <td width="42%">Nominal<b style="color:#FF0000">*</b></td>
                 	<td width="58%">
                    <?php
                    	if($jmlbayar)
                        {
						?>
                            <input type="text" value="<?php echo $databayar['nominal'];?>"  class="inputmember" disabled />
                        <?php
                        }
                        else
                        {
                        ?>
                 		<input type="text"  readonly name="nominal" placeholder="yyyy-mm-dd"  
                        	value="<?php echo $datapesan["total_harga"];?>" class="inputmember" >
                        <?php
						}
						?>
                        
                        </td>
              </tr>
                <tr>
                    <td width="42%" height="49">Bank Anda <b style="color:#FF0000">*</b></td>
                    <td width="58%">
                   		<?php
                    	if($jmlbayar)
                        {
						?>
                            <input type="text" value="<?php echo $databayar['bank'];?>"  class="inputmember font-besar" disabled />
                        <?php
                        }
                        else
                        {
                        ?>
                        
                            <select name="bank" >
                                <option value="">--Pilih Bank--</option>
                                <option value="bca" <?php if ($bank=="bca")echo "selected='selected'";?>>BCA</option>
                                <option value="mandiri" <?php if ($bank=="mandiri")echo "selected='selected'";?>>MANDIRI</option>
                                <option value="bni" <?php if ($bank=="bni")echo "selected='selected'";?>>BNI</option>
                                <option value="bri" <?php if ($bank=="bri")echo "selected='selected'";?>>BRI</option>
                                <option value="bank lain" <?php if ($bank=="bank lain")echo "selected='selected'";?>>Bank Lain</option>
                            </select>
                    	<?php
						}
						?>
                    </td>
              </tr>
                <tr>    
                    <td width="42%">Bank Tujuan (Bank Kami)</td>
                  	<td width="58%">
                  	<?php
                    	if($jmlbayar)
                        {
						?>
                            <input type="text" value="BCA"  class="inputmember font-besar" disabled />
                        <?php
                        }
                        else
                        {
                        ?>
                        
                            <select name="banktrf" >
                                <option value="bca" <?php if ($banktrf=="bca")echo "selected='selected'";?>>BCA</option>
                            </select>
                    	<?php
						}
						?>
                  	</td>
              </tr>
                <tr>
                    <td height="53">Rekening Atas Nama <b style="color:#FF0000">*</b></td>
                    <td>
                    	<?php
                    	if($jmlbayar)
                        {
						?>
                            <input type="text" value="<?php echo $databayar['atas_nama'];?>"  class="inputmember" disabled />
                        <?php
                        }
                        else
                        {
                        ?>
                           <input type="text" name="atas_nama" value="<?php echo $atas_nama;?>"  class="inputmember" <?php echo $nonaktif ;?> >
                        <?Php    
                        }
						?>
                        
                    </td>
               </tr>
               <tr>
                    <td width="42%" height="49">Upload Bukti Transfer <b style="color:#FF0000">*</b></td>
                    <td width="58%">
                   		<?php
                    	if($jmlbayar)
                        {
						?>
                            <img src="./bukti/<?php echo $databayar['upload_struk'];?>"  width="150" />
                        <?php
                        }
                        else
                        {
                        ?>
                        
                           <input type="file" name="bukti" />
                    	<?php
						}
						?>
                    </td>
              </tr>
               
            </table>
        
    
       </div>
		
        <br />
        
		<hr size="1" color="#CCCCCC">
        
        <div align="center" style="margin:1% 20px 20px 0;">
            <input type="submit" value="KONFIRMASI PEMBAYARAN" name="simpan" class="abugelap font1" style="display:<?php echo $nontampil ;?>">
        </div>
	
    </form>

</div>


</div>
    <div style="clear:both"></div>
    <br>
    <br>
<br>