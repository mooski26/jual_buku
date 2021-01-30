<?php
include"../../config.php";
$no = 1;
$qry_buku = mysql_query("SELECT * from buku");
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

	<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:green;color:#fff;line-height:60px;font-size:20px;"><b>Data Buku</b></div><br><br>

  <section class="container">
  <a href="input_buku.php?page=input_buku">TAMBAH BUKU</a></section>
        <?php
        @$aksi = $_GET['aksi'];
        if($aksi=="input")
        {
        	include("input_buku.php");
        }
        ?>
  <div class="container">
    <table border="1" cellpadding="20">
      <tr>
        <th width="30">No</th>
        <th width="160">judul</th>
        <th width="150">Penerbit</th>
        <th width="150">Pengarang</th>
        <th width="160">Gambar</th>
        <th width="100">Halaman</th>
        <th width="120">Harga</th>
        <th width="50">Stok</th>
        <th width="150">Aksi</th>
      </tr>
	     <?php while($data = mysql_fetch_array($qry_buku)) { ?>
    	<tr>
    	 <td><?php echo $no++ ?></td>
    	 <td><?php echo $data['judul'] ?></td>
    	 <td><?php echo $data['penerbit'] ?></td>
    	 <td><?php echo $data['pengarang'] ?></td>
    	 <td><center><img src="../../gambar/<?php echo $data['gambar'] ?>" style="width:100px;"></center></td>
    	 <td><?php echo $data['halaman'] ?></td>
    	 <td>Rp.<?php echo number_format($data['harga']); ?>,-</td>
    	 <td><?php echo $data['stok'] ?></td>
    	 <td><a href="editbuku.php?page=editbuku&id=<?php echo $data['id_buku']; ?>"><center>EDIT</a> || <a href="hapus_book.php?id=<?php echo $data['id_buku']; ?>">HAPUS</center></a></td>
    	</tr>
    	<?php } ?>
    </table>
    </div>
</body>
</html>