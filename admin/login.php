<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Halaman Login Admin</title>

<link href="../css/reset.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/warna.css" rel="stylesheet" type="text/css" />
<link href="../css/input.css" rel="stylesheet" type="text/css" />
<link href="../css/font.css" rel="stylesheet" type="text/css" />
<link href="../css/validasi.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../js/jquery-1.4.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
</head>

<body style="background-image: url('../img/bg3.jpg');background-size: cover">


<div id="konten-model-3">
<br><br><br><br>
<table width="100%" height="90" border="0" align="center">
  <tr>
    <td height="100" align="center" class="font7">SELAMAT DATANG DI HALAMAN ADMIN</td>
  </tr>
</table>

  <div class="lebar-40persen tinggi-450px kiri jarak-kiri-30persen jarak-atas-1persen rounded-atas-kanan-1 rounded-atas-kiri-1 rounded-bawah-kiri-1 rounded-bawah-kanan-1 font7 font-besar">
  	<form action="proses.php" method="post" id="formlogin" name="formlogin">
    <table width="100%" cellpadding="0" cellspacing="0"  border="0" class="jarak-atas-0persen">
      <tr>
        <td colspan="2" height="2" align="center" class="font-ukuran-20 font-merah"></td>
      </tr>
      <tr>
        <td height="76" width="40%" align="center" class="font-biru">Username *</td>
        <td align="center"><input type="text" name="user" placeholder="masukan username" class="lebar-70persen tinggi-30px rounded" /></td>
      </tr>
      <tr>
        <td height="76" align="center" class="font-biru">Password *</td>
        <td align="center"><input type="password" name="password" placeholder="password" class="lebar-70persen tinggi-30px rounded" /></td>
      </tr>
      <tr>
        <td colspan="2" height="50px" align="center"><input type="submit" value="MASUK" class="lebar-50persen class biru" /></td>
      </tr>
      <tr>
        <td colspan="2" height="63" align="center" valign="bottom" class="font-biru">copyright - &copy; 2018</td>
      </tr>
    </table>
    
    </form>
  </div>

</div>

<script>
	
$(document).ready(function() {
			
	var validator = $("#formlogin").validate({
					
					rules:{ 
							
							user:{
									required: true
								  },
							 password:{
									required: true
								  }
						  },
				messages:{ 
						
							user:{
									required:'Maaf, Username Harus di Isi'
								  },
							password:{
									required:'Maaf, Password Harus di Isi'
								  }
						
						},
			 success: 
				function(label) {
				label.text('').addClass('valid');}
	});
	
	

});
	
	
	

</script>

</body>
</html>