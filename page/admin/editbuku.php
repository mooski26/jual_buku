<?php
include"../../config.php";
$e=$_GET['id'];
$edit=mysql_query("SELECT * FROM buku WHERE id_buku='$e'");
$book = mysql_fetch_array($edit);
?>
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

  	<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:green;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">Edit Buku</div><br><br>
  
  <section class="container">
  <a href="buku.php?page=input_buku" style="margin-top:20px;">TAMBAH BUKU</a><br><br>
  <?php
  @$aksi = $_GET['aksi'];
  if($aksi=="input")
  {
  	include("input_buku.php");
  }
  ?>
  <form action="e_book.php" method="post" enctype="multipart/form-data">
   		<input type="hidden" name="id_buku" class="form-control" value =" <?php  echo $book['id_buku'];?>">
   		<b>Kategori Buku :</b><select name="kategori" class="form-control">
   			<?php
   			$d = mysql_query("SELECT * from kategori");
   			while($data = mysql_fetch_array($d)){ ?>;
   			<option> <?php echo $data['kategori']; ?> </option>
   			<?php } ?>
   		</select><br>
   		<b>Judul Buku :</b> <input type="text" name="judul" class="form-control" value =" <?php  echo $book['judul'];?>" ><br>
   		<b>Penerbit Buku :</b><input type="text" name="penerbit" class="form-control" value =" <?php  echo $book['penerbit'];?>"><br>
   		<b>Pengarang Buku : </b><input type="text" name="pengarang" class="form-control" value =" <?php  echo $book['pengarang'];?>"><br>
   		<b>Gambar Buku : </b><input type="file" name="gambar" class="form-control" value =" <?php  echo $book['gambar'];?>" ><br>
   		<b>Halaman Buku : </b><input type="text" name="halaman" class="form-control" value =" <?php  echo $book['halaman'];?>"><br>
   		<b>Harga Buku : </b><input type="text" name="harga" class="form-control" value =" <?php  echo $book['harga'];?>" ><br>
   		<b>Stok Buku : </b><input type="text" name="stok" class="form-control" value =" <?php  echo $book['stok'];?>" ><br>
   		<td><input type="submit" class="btn btn-success" value="simpan"></td>
  </form>
</section>
</body>
