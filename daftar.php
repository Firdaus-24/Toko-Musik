 <?php
    if($_SESSION['pelanggan']!="")
    {

    	echo "<script>location.href='index.php'</script>";
    }
?>
<br><br>
	<div class="lebar-100persen tinggi-550px kiri">
    	<div class="lebar-90persen tinggi-450px kiri jarak-kiri-5persen jarak-atas-1persen">
        
        <div class="lebar-90persen tinggi-50px kiri jarak-kiri-5persen">
			<div class="font1 font-ukuran24 font-hitam">Daftar Pelanggan</div>
			<hr style="border:3px solid #ffaa31" class="jarak-atas-05persen" />
		</div>
        <form action="simpanpelanggan.php" method="post" id="daftar">
   	<table width="90%" cellpadding="0" cellspacing="0" border="0" class=" jarak-kiri-5persen kiri border2">
        	<tr>
            	<td height="50" colspan="4" class="font-ukuran24 garis-bawah-1abu orange" align="center">Masukan Data Anda</td>
            </tr>
        	<tr>
              <td height="66" width="16%" class="padding-kiri-2persen font-hitam">Nama Lengkap <span class="font-merah">*</span></td>
              <td width="45%"  class="padding-kiri-2persen"><input type="text" name="nama" class="lebar-70persen tinggi-20px"></td>
                <td height="64" class="padding-kiri-2persen font-hitam">No Telepon <span class="font-merah">*</span></td>
              <td class="padding-kiri-2persen"><input type="text" name="telepon" class="lebar-70persen tinggi-20px"></td>
              
            </tr>
            <tr>
              <td height="60" class="padding-kiri-2persen font-hitam">Email <span class="font-merah">*</span></td>
              <td class="padding-kiri-2persen"><input type="text" name="email" class="lebar-70persen tinggi-20px"></td>
              <td height="62" class="padding-kiri-2persen font-hitam">Password <span class="font-merah">*</span></td>
              <td class="padding-kiri-2persen"><input type="password" name="password" class="lebar-70persen tinggi-20px"></td>
            </tr>
            <tr>
          
            </tr>
            <tr>
            	<td height="57" class="padding-kiri-2persen font-hitam">Alamat <span class="font-merah">*</span></td>
                <td class="padding-kiri-2persen"><textarea name="alamat" cols="40" rows="8" class="lebar-70persen tinggi-20px"></textarea></td>
            	<td height="57" colspan="2" class="padding-kiri-2persen" align="right">
                	<input type="submit" value="SIMPAN DATA" class="biru lebar-50persen tinggi-30px jarak-kanan-30persen kanan font-hitam">
                    <br />
					<br />
					<br />

					<div class="kiri jarak-kiri-30persen padding-atas-1persen padding-kanan-1persen padding-kiri-1persen padding-bawah-1persen font-hitam">
                    	(<span class="font-merah">*</span>) Wajib Diisi!
                    </div>
                </td>
            </tr>
        </table>
        </div>
    </div>
</div>

<script>
	
	$(document).ready(function(){
	
			jQuery.validator.addMethod("lettersonly", function(value, element) {
						  return this.optional(element) || /^[ a-z ]+$/i.test(value);
						});
	jQuery.validator.addMethod("useronly", function(value, element) {
						  return this.optional(element) || /^[a-z]+$/i.test(value);
						});


		var validator = $('#daftar').validate({
										
					rules:{
						
						nama:{
							required:true,
							lettersonly: true
						},
						telepon:{
							required:true,
							digits:true,
							minlength:11,
							maxlength:13
						},
						email:{
							required:true,
							email:true
						},
						password:{
							required:true,
							minlength:5
						},
						kota:{
							min:1
						},
						alamat:{
							required:true
						}
					},
					messages:{
						nama:{
							required:'Maaf, Nama Tidak Boleh Kosong',
							lettersonly: 'Maaf, Nama  Harus Huruf'
						},
						telepon:{
							required:'Maaf, No Telepon Tidak Boleh Kosong',
							digits:'Maaf, Telphone Hanya Angka',
							minlength:'No Telepon minimal 11 digit',
							maxlength:'No Telepon maksimal 13 digit'
						},
						email:{
							required:'Maaf, Email Tidak Boleh Kosong',
							email:'Email Tidak Valid'
						},
						password:{
							required:'Password Tidak Boleh Kosong',
							minlength:'Password Minimal 5'
						},
						kota:{
							min:'Maaf, Kota Belum Dipilih'
						},
						alamat:{
							required:'Maaf, Alamat Tidak Boleh kosong'
						}
						
						
					},
					
				success: 
				function(label) {
				label.text('').addClass('valid');}
		});					   
	});

</script>