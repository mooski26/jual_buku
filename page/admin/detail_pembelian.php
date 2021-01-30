<?php
include"../../config.php";
$id = $_GET['id'];
$q = mysql_query("SELECT * FROM keranjang where id_pembeli='$id'");
$d_bayar = mysql_fetch_array(mysql_query("SELECT SUM(total_harga) as total_bayar from keranjang where id_pembeli='$id'"));
$bayar = $d_bayar['total_bayar'];
$total_bayar = $bayar+20000;
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
  <div style="margin-top:30px;width:100%,height:50px;text-align:center;background:green;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;"><b>Detail Pembelian</b></div>
  <section class="container">
  <table>
    <tr>
  		<th width="300"><center>Judul Buku</center></th>
   		<th width="300"><center>Qty</center></th>
   		<th width="300"><center>Total Harga</center></th>
   		<th width="300"><center>Total Bayar</center></th>
	     <?php while($c=mysql_fetch_array($q)){?>
	 <tr>
		  <td><center><?php $data=mysql_fetch_array(mysql_query("SELECT * from buku where id_buku='$c[id_buku]'"));$nama=$data['judul']; echo $nama; ?></center></td>
 		  <td><center><?php echo $c['qty']; ?></center></td>
 		  <td><center><?php echo $c['total_harga']; ?></center></td>
 		  <td><center><?php echo $total_bayar; ?></center></td>
	</tr>
	     <?php } ?>
  </table>
  </section>
</body>
</html>