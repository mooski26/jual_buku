<html>
</body>
</html>
<head>
  <meta charset="utf-8">
  <title>FAD BOOK</title>
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/tabel.css" rel="stylesheet">
</head>
<body>
<form class="container" method="post">
	<div class="col-md-8" style="margin-bottom:20px; width: 80%;">
	<input type="text" name="kategori" placeholder="kategori baru" style="width:600px;" class="form-control">
	</div>
	<div class="col-md-1">
	<input type="submit" name="simpan" value="simpan" class="btn btn-success">
	</div>
</form>
</body>
</html>
<?php
@$sim = $_POST['simpan'];
if($sim)
{
	$kat = $_POST['kategori'];
	mysql_query("INSERT into kategori set kategori='$kat'");
	header("location:kategori.php?page=kategori");
}
?>