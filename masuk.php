 <?php
    if($_SESSION['pelanggan']!="")
    {

    	echo "<script>location.href='index.php'</script>";
    }
?>
<br>
	<div class="lebar-100persen tinggi-550px kiri">
    	<div class="lebar-90persen tinggi-450px kiri jarak-kiri-5persen jarak-atas-1persen">
        
        <div class="lebar-90persen tinggi-50px kiri jarak-kiri-5persen">
			<div class="font1 font-ukuran24 font-hitam">Login Pelanggan</div>
			<hr style="border:3px solid #ffaa31" class="jarak-atas-05persen" />
		</div>
        <form action="proseslogin.php" method="post" id="formlogin">
   	<table width="90%" cellpadding="0" cellspacing="0" border="0" class=" jarak-kiri-5persen kiri border2">
        	<tr>
            	<td height="50" colspan="4" class="font-ukuran24 garis-bawah-1abu orange" align="center">Masukan Data Anda</td>
            </tr>
        	<tr>
              <td width="8%"  height="60" class="padding-kiri-2persen font-hitam">Email <span class="font-merah">*</span></td>
              <td width="44%"  class="padding-kiri-2persen"><input type="text" name="email" class="lebar-70persen tinggi-20px"></td>
                <td width="16%" height="62" class="padding-kiri-2persen font-hitam">Password <span class="font-merah">*</span></td>
              <td width="32%" class="padding-kiri-2persen"><input type="password" name="password" class="lebar-70persen tinggi-20px"></td>
            </tr>
          
            <tr>
            	<td></td>
                <td height="57" colspan="3" align="center"><br />
					<span class="padding-kiri-10persen">
					<input type="submit" value="LOGIN" class="biru lebar-50persen tinggi-30px jarak-kanan-20persen font-hitam">
					</span><br />
					<br />

				<div class="kiri jarak-kiri-30persen padding-atas-1persen padding-kanan-1persen padding-kiri-1persen padding-bawah-1persen font-hitam">                         
                </div>
                </td>
           	</tr>
        </table>
        </form>
        </div>
    </div>
    
</div> 	
<script>
	
$(document).ready(function() {
			
	var validator = $("#formlogin").validate({
					
					rules:{ 
							
							email:{
									required: true
								  },
							 password:{
									required: true
								  }
						  },
				messages:{ 
						
							email:{
									required:'Maaf, E-Mail Harus di Isi'
								  },
							password:{
									required:'Maaf, Password Harus di Isi'
								  }
						
						},
			 success: 
				function(label) {
				label.text('Benar').addClass('valid');}
	});
	
	

});
	
	
	

</script>