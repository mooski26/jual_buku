<?php
include"../../config.php";
$no = 1;
$qry_kategori = mysql_query("SELECT * from kategori");
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

	<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:green;color:#fff;line-height:60px;font-size:20px; margin-bottom:25px;">
	<b>Data Kategori</b>
	</div>
	<section class="container">
	<a href="kategori.php?page=kategori&aksi=input" class="btn btn-success" style="margin:17px;"><span class="glyphicon glyphicon-plus">TAMBAH KATEGORI</a><br></span></a></section>
	<?php
	@$aksi = $_GET['aksi'];
	if($aksi=="input")
	{
		include("input_kat.php");
	}
	else if($aksi=="edit")
	{
		include("edit.php");
	}
	?>
	<br>
	<br>
	<table class="container" border="1" cellpadding="20" width="1070">
		<tr>
			<th>No</th>
			<th>Kategori</th>
			<th>Aksi</th>
		</tr>
		<?php
		 while($data = mysql_fetch_array($qry_kategori)) { ?>
		<tr>
		 <td><center><?php echo $no++ ?></center></td>
		 <td><center><?php echo $data['kategori'] ?></center></td>
		 <td><a href="kategori.php?page=kategori&aksi=edit&id=<?php echo $data['id_ketegori']; ?>"><center>EDIT</a> || <a href="hapus_kat.php?id=<?php echo $data['id_ketegori']; ?>">HAPUS</center></a></td>
		</tr>
		<?php } ?>
		</table>
</section>
</table>
</div>