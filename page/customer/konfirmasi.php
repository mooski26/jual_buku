<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>FAD BOOK</title>
  <link rel="stylesheet" type="text/css" href="../../css/tabel.css">
  <link href="../../css/style.css" rel="stylesheet">
</head>
<body>
	<div style="margin-top: 30px; width:100%,height:50px;text-align:center;background:green;color:#fff;line-height:60px;font-size:20px;"><b>Konfirmasi Terima</b>
	</div>
		<?php
		$id_pembeli = $_SESSION['id_pembeli'];
		$query_checkout = mysql_query("SELECT * from  chekout where id_pembeli='$id_pembeli'");
		$data_chekout = mysql_fetch_array($query_checkout);
		?>
	<div class="container">
	<br><br>
	<h3><b>Data Penerima :</b></h3>
	<table class="container">
	<tr>
		<td width="400"><p><b>Nama</b></p></td>  	<td>: <?php echo $data_chekout['nama']; ?></td>
	</tr>

	<tr>
		<td width="400"><p><b>Alamat</b></p></td>	<td>: <?php echo $data_chekout['alamat']; ?></td>
	</tr>

	<tr>
		<td width="400"><p><b>Nomor Telepon</b></p></td>	<td>: <?php echo $data_chekout['nomor_tlp']; ?></td>
	</tr>
	</table>
	</div>

	<div class="container">
	<h3><b>Data Order</b></h3>
		<?php
		$qry = mysql_query("SELECT * from keranjang where id_pembeli='$id_pembeli'");
		?>

	<table  class="container" border="1" cellpadding="20">
		<tr>
			<th width="300">judul buku</th>
			<th width="300">harga</th>
			<th width="">qty</th>
			<th width="">total harga</th>
		</tr>
			<?php while($keranjang=mysql_fetch_array($qry)){?>
		<tr>
			<td><?php
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
			<td colspan="3">Total Bayar</td><td>Rp.<?php $t_bayar=$bayar+20000; echo number_format($t_bayar); ?>,00
			</td>
		</tr>
		</table><br><br>
		<p><center>Silahkan konfirmasi penerimaan barang jika anda sudah menerima barang,agar anda dapat melakukan transaksi kembali <a href="konfirmasi_terima.php?id=<?php echo $id_pembeli; ?>"><b>KONFIRMASI</b></a></center></p><br><br>
	</div>
</body>
</html>
