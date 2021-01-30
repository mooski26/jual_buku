<?php
include"../../config.php";
session_start();
if(!isset($_SESSION['username']))
{
  header("location:../../login.php");
}
$nama = $_SESSION['nama'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>FAD BOOK</title>
  <link href="../../css/style.css" rel="stylesheet">
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
 
    <section class="home">
    <div class="container">
    <center><img src="../../image/bukuhead.jpg" style="width:400px;height:400px;"></center><br><br>
    <center><h2><b>Selamat datang di Halaman ADMIN.<b></center><h2>
    <center><h1 style="color:green;">FAD<b>BOOK</b></h1></center>
        <center><p>Disini anda bisa memanegeman dari data <b>Kategori</b>, <b>Buku</b> dan data <b>Customer</b></p></center>
    </div>
  </section>


   <footer>
    <div class="container">
      <small>Copyright &copy; 2021 - Yuan Fikri</small>
    </div>
  </footer>
  
  </body>
  </html>