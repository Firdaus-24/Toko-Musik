

<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
			var validator = $("#tambah").validate({
				rules:{
					namakota:{required:true},
					ongkoskirim:{required:true}				
				},
				messages:{
					namakota:{required:'harap isi nama kota'},
					ongkoskirim:{required:'harap isi ongkos kirim'}
				},
				success:
					function(label) {label.text('Benar').addClass('valid');}
			});
	});
</script>


	
    <div class="lebar-95persen tinggi-250px kiri garis-atas-1hitam garis-kanan-1hitam garis-kiri-1hitam garis-bawah-1hitam rounded-atas-kanan-1 rounded-atas-kiri-1 rounded-bawah-kanan-1 rounded-bawah-kiri-1 jarak-kiri-2persen jarak-atas-1persen hitam">
    	
        <div class="lebar-100persen tinggi-50px kiri rounded-atas-kanan-1 rounded-atas-kiri-1 garis-bawah-1abu">
        	<div class="font7 font-ukuran-20 jarak-atas-2persen jarak-kiri-2persen kiri font-bold font-putih font-besar">
            	Halaman Tambah Kota
            </div>
            
        </div>
       <form action="kotasimpan.php" method="post" id="tambah">     
        <div class="lebar-100persen tinggi-40px kiri">
        </div>    
      <table width="40%"  cellpadding="2" cellspacing="2" class="jarak-atas-1persen jarak-kiri-35persen kiri  font-putih font-besar font-bold">
        	<tr>
            	<td>Nama kota</td>
                <td bgcolor=""><input type="text" name="namakota"/></td>
            </tr>
            <td>ongkos kirim</td>
                <td><input type="text" name="ongkoskrim"/></td>
             </tr>
              <tr>     
                   	<td colspan="2"><input type="submit" value="Simpan kota" 
            class="biru rounded-atas-kiri-10 rounded-atas-kanan-10 rounded-bawah-kiri-10 rounded-bawah-kanan-10 kanan jarak-kanan-1persen jarak-atas-1persen " />         
            		</td>
              </tr>
        </table>   
 </form>       
    </div>
