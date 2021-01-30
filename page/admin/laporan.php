<?php
include"../../config.php";
$q = mysql_query("SELECT * FROM chekout");
@$act = $_GET['act'];
if($act=="detail")
{
	include("detail_pembelian.php");
}else{
?>
<!DOCTYPE html>
<html>
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

  <div style="margin-top:30px;width:100%,height:50px;text-align:center;background:green;color:#fff;line-height:60px;font-size:20px; margin-bottom:25px;"><b>LAPORAN TRANSAKSI</b>
  </div>

  <table class="container">
    <tr>
  		<th><center>Nama Customer</center></th>
   		<th><center>Tanggal Order</center></th>
   		<th><center>Status Terima</center></th>
   		<th><center>Aksi</center></th>
	      <?php while($c=mysql_fetch_array($q)){?>
	  <tr>
	   	<td><center><?php $data=mysql_fetch_array(mysql_query("SELECT * from customer where id_pembeli='$c[id_pembeli]'"));$nama=$data['nama']; echo $nama; ?></center></td>
 	  	<td><center><?php echo $c['tanggal']; ?></center></td>
 	  	<td><center><?php echo $c['status_terima']; ?></center></td>
 	  	<td><center><a href="laporan.php?page=laporan&act=detail&id=<?php echo $c['id_pembeli']; ?> ">Laporan</a> | <a href="konfirmasi_transaksi.php?id=<?php echo $c['id_chekout']; ?>&id_pembeli=<?php echo $c['id_pembeli']; ?>">Konfirmasi</a></center></td>
	</tr>
  	<?php }} ?>
  </table>
</body>
</html>