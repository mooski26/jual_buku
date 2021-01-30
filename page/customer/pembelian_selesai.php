<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>FAD BOOK</title>
  <link href="../../css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/tabel.css">
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
</head>
<body>
<div style="margin-top: 30px; width:100%,height:50px;text-align:center;background:green;color:#fff;line-height:60px;font-size:20px;"><b>Pembelian Selesai</b></div><br><br>
		<?php
		$id_pembeli = $_SESSION['id_pembeli'];
		$query_checkout = mysql_query("SELECT * from  chekout where id_pembeli='$id_pembeli'");
		$data_chekout = mysql_fetch_array($query_checkout);
		?>
<h3 class="container"><b>Data Penerima :</b></h3><br>
<table table  class="container">
	<tr>
		<td><p><b>Nama</b></p></td>  	<td>: <?php echo $data_chekout['nama']; ?></td>
	</tr>

	<tr>
		<td><p><b>Alamat</b></p></td>	<td>: <?php echo $data_chekout['alamat']; ?></td>
	</tr>

	<tr>
		<td><p><b>Nomor Telepon</b></p></td>	<td>: <?php echo $data_chekout['nomor_tlp']; ?></td>
	</tr>
</table><br>
<h3 class="container"><b>Data Order</b></h3><br>
		<?php
		$qry = mysql_query("SELECT * from keranjang where id_pembeli='$id_pembeli'");
		?>
<div class="home">
<table  class="container" border="1" cellpadding="20">
	<th>judul buku</th><th>harga</th><th>qty</th><th>total harga</th>
		<?php while($keranjang=mysql_fetch_array($qry)){?>
		<tr>
		<td>
			<?php
			$q = mysql_query("SELECT * from buku where id_buku='$keranjang[id_buku]'");
			$d = mysql_fetch_array($q);
			$judul = $d['judul']; echo $judul;
			$qbyar = mysql_fetch_array(mysql_query("SELECT SUM(total_harga) as total_bayar from keranjang where id_pembeli='$id_pembeli'"));
			$bayar = $qbyar['total_bayar'];
			?>
			
		</td>
		<td><?php echo $keranjang['harga'] ?></td>
		<td><?php echo $keranjang['qty']?></td>
		<td><?php echo $keranjang['total_harga']?></td>
		</tr>
			<?php } ?>
		<tr>
			<td colspan="3">Total harga keseluruhan</td><td><?php echo $bayar;  ?></td>
		</tr>
		<tr>
			<td colspan="3">Ongkos Kirim (Paten)</td><td>Rp.20,000,00</td>
		</tr>
		<tr>	
			<td colspan="3">Total Bayar</td><td>Rp.<?php $t_bayar=$bayar+20000; echo number_format($t_bayar); ?>,00</td>
		</tr>
		</table>
		<p class="container">Selanjutnya anda harus megirimkan uang yang tertera pada total bayar ke <b>No Rek 00112233</b> atas nama <b>Admin Yuan Fikri</b>. Setelah melakukan pembayaran anda bisa mengonfirmasi melalulu <b>No.Tlp. 0822XXXXXXXX</b>. <a href="index.php"><b>Selesai</b></a> </p>
		</div>