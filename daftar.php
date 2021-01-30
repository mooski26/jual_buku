<!DOCTYPE html>
<html>
<head>
	<title>login aplikasi</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<div class="kotak_login">
    <div class="tulisan_login">
      <h1><b>Silahkan Daftar</b></h1>
      <form action="cekdaftar.php" method="post">
      <label>Nama</label>
      <input type="text" placeholder="Nama" class="form_login" name="nama"/>
      <label>Username</label>
      <input type="text" placeholder="Username" class="form_login" name="username" />
      <label>Password</label>
      <input type="password" placeholder="password" class="form_login" name="password"/>
      <button type="submit" class="tombol_login">Sign Up</button>
 </form>
    </div>
  </div>
</div>
</body>
</html>