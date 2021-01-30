<?php
include"../../config.php";
$a=$_GET['id'];
$kat=mysql_query("SELECT * FROM kategori WHERE id_ketegori='$a'");
$bo = mysql_fetch_array($kat)
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
<form class="container" action="e.php" method="post">
		<div class="col-md-8" style="margin-bottom:20px;">
		<br>
 		<b class="container">Nama Kategori</b><br>
 		<input type="hidden" name="id_ketegori" value =" <?php  echo $bo['id_ketegori'];?> ">
 		<input type="text" name="kategori" value ="<?php  echo $bo['kategori'];?>" style="width:600px;" class="form-control">
 		</div>
 		<div class="col-md-1" style="margin-top:20px">
		<input type="submit" name="simpan" value="simpan" class="btn btn-success">
		</div>
</form>
</body>
</html>
