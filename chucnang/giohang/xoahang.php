<?php
include('../../cauhinh/ketnoi.php');

	session_start();
	$id_sp = $_GET['id_sp'];
	if($id_sp==0){
		unset($_SESSION['giohang']);
	}else{
		unset($_SESSION['giohang'][$id_sp]);
	}
	//Nếu không còn sản phẩm trong giỏ hàng -> Xỏa giỏ hàng
	if(count($_SESSION['giohang'])==0){
		unset($_SESSION['giohang']);
	}
	header('location:../../khachhang.php?page_layout=giohang');
?>