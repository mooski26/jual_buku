<?php
include"../../config.php";
$q = mysql_query("SELECT * FROM customer");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>FAD BOOK</title>
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/tabel.css" rel="stylesheet">
</head>
<body>
  <div class="tugaske">
    <div class="container">
      <ul>
        <li><a href=""><i class="fab fa-facebook"></i></a></li>
        <li><a href=""><i class="fab fa-instagram"></i></a></li>
        <li><a href=""><i class="fab fa-twitter-square"></i></a></li>
      </ul>
    </div>
  </div>
  <header>
    <div style="background: green">
      <img src="../../image/yos.jpg" style="height: 64.5px">
      <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="kategori.php">Kategori</a></li>
            <li><a href="buku.php">Buku</a></li>
            <li><a href="customer.php">Customer</a></li>
            <li><a href="laporan.php">laporan</a></li>
            <li><a href="outpage.php">Keluar</a></li>
          </ul>
    </div>
  </header>

  <div style="margin-top:30px;width:100%,height:50px;text-align:center;background:green;color:#fff;line-height:60px;font-size:20px; margin-bottom:25px;"><b>DATA COSTUMER</b>
  </div>

  <table class="container">
    <tr>
  		<th><center>Nama Customer</center></th>
   		<th><center>Username</center></th>
   		<th><center>Password</center></th>
   		<th><center>Aksi</center></th>
  	   <?php while($c=mysql_fetch_array($q)){?>
  	<tr>
  		<td><?php echo $c['nama']; ?></td>
   		<td><?php echo $c['username']; ?></td>
   		<td><?php echo $c['password']; ?></td>
   		<td><center><a href="hapus_cus.php?id=<?php echo $c['id_pembeli']; ?> ">Hapus</a></center></td>
	</tr>
	     <?php } ?>
  </table>
</body>
</html>