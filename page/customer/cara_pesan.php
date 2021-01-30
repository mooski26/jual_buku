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
            <li><a href="kat.php">Buku</a></li>
            <li class="a"><a href="cara_pesan.php">Cara Belanja</a></li>
               <?php
               $q_cek_cekout = mysql_query("SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]'");
               $cek_cekout = mysql_num_rows($q_cek_cekout);
               if($cek_cekout>=1){
               $queri_cek = mysql_query("SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]' && status_terima='sudah diterima'");
               $cek = mysql_num_rows($queri_cek);
               if($cek>=1)
               {?>
            <li><a href="index.php?pesan=sudah konfirmasi"> Konfirmasi</a></li>
               <?php
               }else{
               ?>
            <li><a href="cara_pesan.php?page=konfirmasi"> Konfirmasi</a></li>
               <?php } }?>
            <li><a href="../admin/outpage.php">Keluar</a></li>
        </ul>
    </div>
  </header>

      <?php
      @$page= $_GET['page'];
      if($page=="pembelian_selesai")
      {
        include("pembelian_selesai.php");
      }
        else if($page=="konfirmasi")
      {
        include("konfirmasi.php");
      }
      else{
      ?>

    <section class="home">
    <div class="container">
    <center><img src="../../image/rakbuku.jpg" style="width:auto;height:400px;"></center><br><br>
    <center><h2><b>Selamat datang di Halaman USER.<b></center><h2>
    <center><h1 style="color:green;">FAD<b>BOOK</b></h1></center>
        <center><p>Disini anda sudah bisa membeli buku yang anda inginkan dengan berbagai kategori yang bisa anda pilih</p></center>
    </div>
    </section>

    <section class="home">
    <div class="container">
      <div style="margin-top:-30px;width:100%,height:50px;text-align:center;background:green;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">Cara Belanja</div>
    
    <p><h3><b>1. Pembayaran dilakukan dalam jangka waktu 1x24 jam setelah melakukan pemesanan. Jika dalam waktu tersebut tidak melakukan pembayaran maka barang nggak akan diantar<br>
          2. Pembayaran dapat dilakukan melalui transfer ke Rekening kami. Melalui  Konfirmasi Pembayaran.<br>
          3. Setelah melakukan pembayaran, konfirmasi pembayaran dikirim ke-<br>
          <br>
           <p>Bank BNI Atas Nama Yuan Fikri, No Rek 00112233</p>
           <br>
          4. Selanjutnya buku yang telah dipesan akan dikirimkan dalam waktu maksimal 7 Hari.<br>
          5.Kami mengirimkan barang dengan menggunakan jasa pengiriman barang via POST<br><br></b></p>
    <p style="color:green;">* Harga buku belum termasuk ongkos kirim, dan ongkos kirim akan disesuaikan dengan tujuan pengiriman.</p></h3>
    </section>
	
      <hr>
      <?php } ?>
    </div> 

 <footer>
    <div class="container">
      <small>Copyright &copy; 2021 - Yuan Fikri</small>
    </div>
  </footer>

  </body>
  </html>