<?php
include('../../config.php');
$cus=$_GET['id'];
mysql_query("DELETE FROM customer WHERE id_pembeli='$cus'");
header("location:customer.php?page=customer");
?>