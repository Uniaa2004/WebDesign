<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<div class="w-100">
    <div style="width:100% ;background:#000;color:#fff; padding:5px">
        <h5>Company Laptop</h5>
    </div>

    <ul class="list-group">
        <?php
        include('cauhinh/ketnoi.php');
        $sql = "SELECT * FROM dmsanpham";
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <li class="list-group-item" > <a href=" khachhang.php?page_layout=danhsachsp&id_dm=<?= $row['id_dm'] ?>&tendanhmuc=<?= $row['tendanhmuc'] ?>" style=" text-decoration: none;color:#000 "><?php echo $row['tendanhmuc'] ?></a></li>
        <?php
        }
        ?>
    </ul>
</div>