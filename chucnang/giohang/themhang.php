<?php
include("../../cauhinh/ketnoi.php");
session_start();

 $id_sp = $_GET['id_sp'];
  $id_users = $_SESSION['user_id'];
if (isset($_SESSION['giohang'][$id_sp])) {
	$sql="DELETE FROM cart where id_product=$id_sp";
 mysqli_query($conn, $sql);
	$_SESSION['giohang'][$id_sp] += 1;
} else {
	$_SESSION['giohang'][$id_sp] = 1;
}
  $quanlity = $_SESSION['giohang'][$id_sp];

 $sql = "INSERT INTO cart(id_user, id_product,quanlity) VALUES('$id_users','$id_sp','$quanlity')";
 if(mysqli_query($conn, $sql)){
	header('location:../../khachhang.php?page_layout=giohang');
}
 

