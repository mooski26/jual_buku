<?php
include"../../config.php";
$qry_kategori = mysql_query("SELECT * from kategori");
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
	<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:green;color:#fff;line-height:60px;font-size:20px;">Tambah Buku
  </div>
  <section class="container">
    <form method="post" action="tambah_buku.php" enctype="multipart/form-data" style="margin-top:20px;">
	    <select name="kat">
	       <?php 
	       while($kategori=mysql_fetch_array($qry_kategori)){
	       ?>
			<option><?php echo $kategori['kategori']; ?></option>
			   <?php } ?>
	    </select><br><br>
    	<input type="text" name="judul" placeholder="Judul Buku" class="form-control"><br>
    	<input type="text" name="penerbit" placeholder="Penerbit Buku" class="form-control"><br>
    	<input type="text" name="pengarang" placeholder="Pengarang Buku" class="form-control"><br>
    	<input type="file" name="gambar" placeholder="Gambar Buku" class="form-control"><br>
    	<input type="text" name="halaman" placeholder="Jumlah Halaman" class="form-control"><br>
    	<input type="text" name="harga" placeholder="Harga Buku" class="form-control"><br>
    	<input type="text" name="stok" placeholder="Stok Buku" class="form-control"><br>
    	<input type="submit" name="simpan" value="simpan" class="btn btn-success"><br>
    	</form>
  </section>
</body>
</html>