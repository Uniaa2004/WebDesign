<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div  style="background:#000;color:#fff; padding-top:5px; padding-bottom:5px ; margin-bottom:10px">
    <h5>sản phẩm mới về</h5>

</div>
<div class='row w-100'>
    <?php
    include('cauhinh/ketnoi.php');
    $sql = "SELECT * FROM sanpham ORDER BY id_sp DESC ";
    $query = mysqli_query($conn, $sql);
    
    
    while ($row = mysqli_fetch_assoc($query)) {

    ?>
        <div class="col-4 mb-2 ">
            <div class="card" style="width: 18rem;">
                <a href="khachhang.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><img class="card-img-top" style="height:180px" src="quantri/<?= $row['anh_sp'] ?>" alt="Card image cap"></a>

                <div class="card-body">
                    <h5><?php echo $row['ten_sp'] ?></h5>
                    <p class="price"><span style="color:red">Giá: <?php echo number_format($row['gia_sp'], 0, ',', '.') ?> VNĐ</span></p>
                    <p class="card-text text-truncate"><?php echo $row['chi_tiet_sp'] ?></p>

                </div>
            </div>
        </div>

    <?php
    }
    ?>
</div>

<div class="clear"></div>
</div>
</div>