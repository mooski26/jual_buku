	<?php
include"../../config.php";
session_start();
if(!isset($_SESSION['username']))
{
  header("location:../../login.php");
}
$nama = $_SESSION['nama'];
@$pesan = $_GET['pesan'];
if($pesan=="blok")
{
  echo"<script type='text/javascript'>alert('anda tidak dapat membeli dikarenakan anda belum membayar / belum di konfirmasi oleh admin');</script>";
}
else if($pesan=="suwon")
{
  echo"<script type='text/javascript'>alert('terima kasih telah melakukan konfirmasi :-) , anda dapat melakukan pembelian lagi setelah permintaan konfirmasi anda di konfirmasi oleh admin');</script>";
}
else if($pesan=="sudah konfirmasi")
{
  echo"<script type='text/javascript'>alert('anda sudah konfirmasi , anda dapat melakukan pembelian lagi setelah permintaan konfirmasi anda di konfirmasi oleh admin');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>FAD BOOK</title>
  <link href="../../css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
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

    <section class="home">
      <div class="container">
      <center><img src="../../image/bukuutama.jpg" style="width:auto;height:400px;"></center><br><br>
      <center><h2><b>Selamat datang di Halaman USER.<b></center><h2>
      <center><h1 style="color:green;">FAD<b>BOOK</b></h1></center>
      <center><p>Disini anda sudah bisa memilih buku yang anda inginkan dengan berbagai macam judul yang bisa anda pilih</p></center>
      </div>
    </section>

    <div style="margin-top: -30px; width:100%,height:50px;text-align:center;background:green;color:#fff;line-height:60px;font-size:20px;"><b>Buku Kami</b>
    </div>
    <section class="home">
    <div class="container">
    <div class="row">
      <?php
      $qrybuku= mysql_query("SELECT * from buku");
      while($buku = mysql_fetch_array($qrybuku)) {
      ?>

      <div class="box" style="margin-top:20px;">
        <div class="kotak">
        <center><img src="../../gambar/<?php echo $buku['gambar'] ?>" style="margin-top:20px; width:200px;height:190px;"></center>
         <h3 style="text-align:center; color:#f97b61;"><?php echo $buku['judul'] ?></h3>
          <center><b>Harga</b> Rp.<?php echo $buku['harga']; ?></center> 
          <center><b>Stok</b> (<?php echo $buku['stok']; ?>)</center>
          <center><a class="btn btn-danger" href="detail.php?id=<?php echo $buku['id_buku'] ?>" role="button" style="margin-top:10px;">View details &raquo;</a></center>
         </div>
        </div>

        <?php  }?>
      </div>
  </div>
</section>

 <footer>
    <div>
      <small>Copyright &copy; 2020 - Muhammad Danial Irwan. All Rights Reserved.</small>
      
    </div>
  </footer>
  </body>
  </html>
