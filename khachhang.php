<?php
session_start();
include('cauhinh/ketnoi.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Website Bán Hàng</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/trangchu.css" />
    <link rel="stylesheet" type="text/css" href="css/slideshow.css" />

    <script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
</head>

<body>

    <div style="width:80%;margin:auto; ">
        <nav class="navbar navbar-expand-lg navbar-light" style="height:100px;background-color:#333A40;font-size:15px">
            <a class="navbar-brand" style="color:blue" href="/btl/khachhang.php">SHOP LAPTOP</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="khachhang.php" style="color:white">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="khachhang.php?page_layout=gioithieu" style="color:white">Introduce</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="khachhang.php?page_layout=lienhe" style="color:white">Contact</a>
                    </li>

                    <?php
                    include_once('chucnang/timkiem/timkiem.php');
                    ?>

                </ul>

                <ul class="navbar-nav mr-auto">

                    <?php
                    if (isset($_SESSION['email']) && $_SESSION['email'] != 'duong@gmail.com') {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="font-size:20px ;color:#fff" href="#" id="navbarDropdownMenuLink" style="color:white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $_SESSION['email'] ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="khachhang.php?page_layout=giohang">My Cart</a>
                                <a class="dropdown-item" href="chucnang/dangnhap/dangxuat.php">Log out</a>

                            </div>
                        </li>

                    <?php
                    } else {
                    ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="chucnang/dangnhap/dangnhap.php" style="color:white">Login <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="chucnang/dangnhap/dangky.php" style="color:white">Register</a>
                        </li>

                    <?php
                    }
                    ?>
                </ul>

            </div>
        </nav>
        <div class="row no-gutters ">
            <div class="col-3 w-100">
                <?php
                include_once('chucnang/sanpham/danhmucsp.php');
                ?>
                <?php
                include_once('chucnang/quangcao/quangcao.php');
                ?>
                <?php
                include_once('chucnang/thongke/thongke.php');
                ?>
            </div>
            <div class="col-9 w-100">
                <div class=' w-100'>
                    <img src="quantri/anh/banner.avif" class='w-100' alt="">
                </div>

                <?php

                if (isset($_GET['page_layout'])) {
                    switch ($_GET['page_layout']) {
                        case 'gioithieu':
                            include_once('chucnang/menungang/gioithieu.php');
                            break;
                        case 'dichvu':
                            include_once('chucnang/menungang/dichvu.php');
                            break;
                        case 'lienhe':
                            include_once('chucnang/menungang/lienhe.php');
                            break;
                        case 'chitietsp':
                            include_once('chucnang/sanpham/chitietsp.php');
                            break;
                        case 'danhsachsp':
                            include_once('chucnang/sanpham/danhsachsp.php');
                            break;
                        case 'danhsachtimkiem':
                            include_once('chucnang/timkiem/danhsachtimkiem.php');
                            break;
                        case 'giohang':
                            include_once('chucnang/giohang/giohang.php');
                            break;
                        case 'muahang':
                            include_once('chucnang/giohang/muahang.php');
                            break;
                        case 'hoanthanh':
                            include_once('chucnang/giohang/hoanthanh.php');
                            break;
                        default:
                            include_once('chucnang/sanpham/sanphammoi.php');
                    }
                } else {
                    include_once('chucnang/sanpham/sanphammoi.php');
                }

                ?>
                <!-- </div> -->

                <div class="card text-center">
                    <div class="card-header">
                        Footer
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                
                      
            </div>
        </div>

    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>