<?php
include"../../config.php";
$id_pembeli = $_SESSION['id_pembeli'];
$qry = mysql_query("SELECT * from keranjang where id_pembeli='$id_pembeli'");
@$aksi = $_GET['aksi'];
if($aksi=="hapus"){
	$id_keranjang = $_GET['id'];
	$query_qty = mysql_query("SELECT * from keranjang where id_keranjang='$id_keranjang'");
	$data_qty = mysql_fetch_array($query_qty);
	$qty = $data_qty['qty'];
	$id_buku = $data_qty['id_buku'];
	$query_buku = mysql_query("SELECT * from buku where id_buku='$id_buku'");
	$data_buku = mysql_fetch_array($query_buku);
	$stok = $data_buku['stok'];
	$stok_ubah = $stok+$qty;
	mysql_query("UPDATE buku set stok='$stok_ubah' where id_buku='$id_buku'");
	mysql_query("DELETE from keranjang where id_keranjang='$id_keranjang'");
	header("location:detail.php?page=keranjang");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>dodolBUKU.pol page Customer</title>
    <link href="../../css/tabel.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
  </head>

  <body>
<section class="container">
<div class="home">
<table class="container" border="1" cellpadding="20">
	<tr>
	<th width="200">Judul buku</th>
	<th width="200">Harga</th>
	<th width="200">QTY</th>
	<th width="200">Total Harga</th>
	<th width="">Aksi</th>
	</tr>
	<?php while($keranjang=mysql_fetch_array($qry)){?>
		<tr>
		<td><?php
		$q = mysql_query("SELECT * from buku where id_buku='$keranjang[id_buku]'");
		$d = mysql_fetch_array($q);
		$judul = $d['judul']; echo $judul;
		$qbyar = mysql_fetch_array(mysql_query("SELECT SUM(total_harga) as total_bayar from keranjang where id_pembeli='$id_pembeli'"));
		$bayar = $qbyar['total_bayar'];
		?></td>
		<td><?php echo $keranjang['harga'] ?></td>
		<td><?php echo $keranjang['qty']?></td>
		<td><?php echo $keranjang['total_harga']?></td>
		<td><a href="keranjang.php?aksi=hapus&id=<?php echo $keranjang['id_keranjang']; ?>"><center><span class="glyphicon glyphicon-remove"></span></center></a></td>
		</tr>
		<?php } ?>
	<tr>
	<td colspan="3"><b>Total Bayar</b></td><td><?php echo @$bayar;  ?></td>
	<td><center><a href="detail.php?aksi=checkout" class="btn btn-info">checkout</a></center></td>
</tr>
</table>
</div>
</section>