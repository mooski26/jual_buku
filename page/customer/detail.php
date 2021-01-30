<?php
include"../../config.php";
@$kd = $_GET['id'];
$qry = mysql_query("SELECT * from buku where id_buku='$kd'");
$data = mysql_fetch_array($qry);
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
                {
                ?>
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
      @$aksi = $_GET['aksi'];
      $tanggal = date("d-m-Y");
      if($aksi=="checkout")
      {?>

  <section class="container">
    <div style="margin-top: 30px; width:100%,height:50px;text-align:center;background:green;color:#fff;line-height:60px;font-size:20px;"><b>Checkout</b></div>
    <br>
    <form action="proses_chekout.php" method="post">
    <label>Nama Penerima</label>
    <input type="text" name="nama" placeholder="Nama Anda" class="form-control">
    <label>Alamat Lengkap</label>
    <input type="text" name="alamat" placeholder="jalan/Dusun/Desa/Kecamatan/Kabupaten/Provinsi/kode pos" class="form-control"><br>
    <label>Nomor Telepon</label>
    <input type="text" name="nomor_tlp" placeholder="Nomor Telepon Anda" class="form-control"><br>
    <label>Tanggal</label>
    <input type="text" name="tanggal"  class="form-control" value="<?php echo $tanggal; ?>" readonly>
    <input type="submit" class="btn btn-info" value="selesai">
    </form> 
  </section>

      <?php }else{
      @$page = $_GET['page'];
      if($page=="keranjang"){
       include("keranjang.php");
      }
      else if($page==""){
      ?>

    <center>
    <div class="container">
      <div class="box">
      <div class="col-md-3" style="margin:30px;">
     <img src="../../gambar/<?php echo $data['gambar']; ?>" style="width:250px; height:250px;">   
    </div>
      <div class="col-md-6" style="margin-left:10px ; margin-top:10px;">
        <table>
          <tr>
            <h3><td><b>&nbsp&nbsp&nbsp&nbsp Judul &nbsp&nbsp&nbsp&nbsp</b></td>   <td>:&nbsp&nbsp&nbsp&nbsp <?php echo $data['judul']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>&nbsp&nbsp&nbsp&nbsp Penerbit &nbsp&nbsp&nbsp&nbsp</b></td>    <td>:&nbsp&nbsp&nbsp&nbsp <?php echo $data['penerbit']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>&nbsp&nbsp&nbsp&nbsp Pengarang &nbsp&nbsp&nbsp&nbsp</b></td>   <td>:&nbsp&nbsp&nbsp&nbsp <?php echo $data['pengarang']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>&nbsp&nbsp&nbsp&nbsp Halaman &nbsp&nbsp&nbsp&nbsp</b></td>   <td>:&nbsp&nbsp&nbsp&nbsp <?php echo $data['halaman']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>&nbsp&nbsp&nbsp&nbsp Harga &nbsp&nbsp&nbsp&nbsp</b></td>   <td>:&nbsp&nbsp&nbsp&nbsp <?php echo $data['harga']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>&nbsp&nbsp&nbsp&nbsp Stok &nbsp&nbsp&nbsp&nbsp</b></td>    <td>:&nbsp&nbsp&nbsp&nbsp <?php echo $data['stok']; ?></td></h3>
          </tr>
        </table><br><br>
        <form action="tambah_keranjang.php" method="post">

              <input type="number" name='qty' value="0" min="0" max="<?php echo $data['stok']; ?>">
              <input type="hidden" name='harga' value="<?php echo $data['harga'];?>">
              <input type="hidden" name='id_buku' value="<?php echo $data['id_buku'];?>">
              <?php if($data['stok']==0){ ?>
                 <a href="#" class="btn btn-danger">Tidak dapat membeli</a>
                <?php }
                else{?>
         <button type="submit" class="btn btn-success">Beli</button><br><br><br><br>
         <?php } ?>
         </form>
        </div>
    </div>
    </div>
    </center>
        <?php } ?>
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

        <?php } }?>

      </div>
    </div>
  </section>
 <footer>
    <div class="container">
      <small>Copyright &copy; 2021 - Yuan Fikri</small>    
    </div>
  </footer>

    </div>
  </body>
  </html>


      
    