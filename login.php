<!DOCTYPE html>
<html>
<head>
	<title>login aplikasi</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
 
</head>
<body>
    <div class="kotak_login">
      <h1 class="tulisan_login">Silahkan Login</h1>
      <form action="ceklogin.php" method="post">
      <label>Username</label>
      <input type="text" placeholder="Username .." class="form_login" name="username"/>
      <label>Password</label>
      <input type="password" placeholder="Password .." class="form_login" name="password" />
      <button class="tombol_login" type="submit">Login</button>
      </form>
      <p style="color: red">Belum punya akun?
       <span><a href="daftar.php?">Daftar</a></span></p>
    </div>
  </div>
</div>
</body>
</html>