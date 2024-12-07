<link rel="stylesheet" type="text/css" href="css/chitietsp.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="" style="margin-left:150px">
    <div class="prd-only">
        <?php
        $id_sp = $_GET['id_sp'];
        $sql = "SELECT * FROM sanpham WHERE id_sp = $id_sp";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        ?>
        <div class="prd-img d-flex align-items-center" style="height: 50vh;"><img class='my-auto' width="80%" src="quantri/<?php echo $row['anh_sp'] ?>" /></div>
        <div class="prd-intro mt-3">
            <h3 class='mb-5'><?php echo $row['ten_sp'] ?></h3>
            <p>Price: <span><?php echo number_format($row['gia_sp'], 0, ',', '.') ?> VNĐ</span></p>
            <p>RAM: <span><?php echo $row['ram'] ?></span></p>
            <p>CPU: <span><?php echo $row['cpu'] ?></span></p>
            <p>Monitor: <span><?php echo $row['monitor'] ?>inches</span></p>
            <p>Weight: <span><?php echo $row['weight'] ?></span></p>
            <p>Status: <span>Still</span></p>
            <p>Included:<span>Box, book, charger, cable, headphones</span></p>
            <p>Bảo hành: <span> 12 tháng </span></p>
            <p>Describe: <span><?php echo $row['chi_tiet_sp'] ?></span></p>
            <?php
            if (isset($_SESSION['email'])) {
            ?>
                <a href="chucnang/giohang/themhang.php?id_sp=<?php echo $row['id_sp'] ?>"><button type="submit" name="submitdathang" class="btn btn-primary">Purchase</button></a>
            <?php
            } else {
            ?>
                <a href="chucnang/dangnhap/dangnhap.php"><button type="submit"  class="btn btn-primary">Login to purchase</button></a>
            <?php
            }
            ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="prd-comment">

        <form method="post">
            <ul>
                <h3>Comment</h3>
                <li class="required">Name <br /><input required type="text" name="ten" /></li>
                <li class="required">Numberphone <br /><input required type="text" required="" name="dien_thoai" /></li>
                <li class="required">Content <br /><textarea required name="binh_luan"></textarea></li>
                <li><button type="submit" name="submit" class="btn btn-primary">Comment</button></li>
            </ul>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        if (isset($_SESSION['email'])) {
            $ten = $_POST['ten'];
            $email = $_SESSION['email'];
            $dien_thoai = $_POST['dien_thoai'];
            $binh_luan = $_POST['binh_luan'];
            $ngay_gio = date('Y-m-d ');
            $id_user=$_SESSION['user_id'];
            $sql = "INSERT INTO comment (id_user_comment,id_sp,ten,sodienthoai,email,comment,date) VALUES ('$id_user','$id_sp','$ten','$dien_thoai','$email','$binh_luan','$ngay_gio')";
            $query = mysqli_query($conn, $sql);
        } else {
    ?>
            <p class='text-xl text-danger'>You need to login to your account!</p>
    <?php
        }
    }

    ?>
    <div class="comment-list">
        <?php
        $sql = "SELECT * FROM comment WHERE id_sp = $id_sp";
        $query = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($query);
        if ($count > 0) {
            while ($row = mysqli_fetch_array($query)) {
        ?>
                <ul>
                    <li class="com-title"><?php echo $row['ten'] ?><br />
                        <span>
                            <?php
                            $oriDate = $row['date'];
                            $newDate = date('d-m-Y ', strtotime($oriDate));
                            echo $newDate;
                            ?>
                        </span>
                    </li>
                    <li class="com-details"><?php
                                            echo $row['comment'];
                                            ?></li>
                </ul>
        <?php
            }
        }

        ?>
    </div>
</div>