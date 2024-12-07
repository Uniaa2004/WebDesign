 <link rel="stylesheet" type="text/css" href="css/muahang.css" />
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <div class="">
     <div style=" items-align:center;width:100% ;background:#000;color:#fff; padding:5px ; margin-bottom:10px">
         <h5>Your Cart</h5>
     </div>
     <div class="">
         <table class="table" style="margin-left:15px">
             <thead>
                 <tr>
                     <th scope="col">Id</th>
                     <th scope="col">Product name</th>
                     <th scope="col">Price</th>
                     <th scope="col">Quantity</th>
                     <th scope="col">Total Money</th>
                 </tr>
             </thead>

             <?php
                include("cauhinh/ketnoi.php");
                $arrId = array();

                foreach ($_SESSION['giohang'] as $id_sp => $sl) {
                    $arrId[] = $id_sp;
                }
                $strID = implode(',', $arrId);
                $sql = "SELECT * FROM sanpham WHERE id_sp IN ($strID)";
                $query = mysqli_query($conn, $sql);
                $totalPriceAll = 0;
                while ($row = mysqli_fetch_array($query)) {
                    $totalPrice = $_SESSION['giohang'][$row['id_sp']] * $row['gia_sp'];
                ?>
                 <tbody>
                     <tr>
                         <td class="prd-name"><?php echo $row['id_sp'] ?></td>
                         <td class="prd-name"><?php echo $row['ten_sp'] ?></td>
                         <td class="prd-price"><?php echo number_format($row['gia_sp'], 0, ',', '.') ?> VNĐ</td>
                         <td class="prd-number"><?php echo $_SESSION['giohang'][$row['id_sp']] ?></td>
                         <td class="prd-total"><?php echo number_format($totalPrice, 0, ',', '.') ?> VNĐ</td>
                     </tr>
                 </tbody>

             <?php
                    $totalPriceAll += $totalPrice;
                }
                ?>
             <tr>
                 <td class="prd-name">Total invoice value is:</td>
                 <td colspan="2"></td>
                 <td class="prd-total"><span><?php echo number_format($totalPriceAll, 0, ',', '.') ?> VNĐ</span></td>
             </tr>
         </table>

     </div>
     <div class="form-payment" style="margin-left:100px;margin-top:50px;margin-bottom:50px">
         <form method="post">
             <ul>
                 <li class="info-cus"><label>Customer name</label><br /><input required type="text" name="ten" /></li>
                 <li class="info-cus"><label>Numberphone</label><br /><input required type="text" name="telephone" /></li>
                 <li class="info-cus"><label>Address</label><br /><input required type="text" name="address" /></li>

                 <button type="submit" name="submitthanhtoan" class="btn btn-primary">Purchase Confirmation</button>
                 <button type="reset" name="reset" class="btn btn-primary">Reset</button>

             </ul>
         </form>
     </div>
 </div>
 <?php
 
    if (isset($_POST['submitthanhtoan'])) {
        include('cauhinh/ketnoi.php');
        print_r($totalPriceAll);
        $name = $_POST['ten'];
        $telephone = $_POST['telephone'];
        $address = $_POST['address'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $id_user_order = $_SESSION['user_id'];
        $sql = "INSERT INTO orders(id_user_orders,name,telephone,address,total,date) VALUES('$id_user_order','$name','$telephone','$address','$totalPriceAll','$date')";
        $query1 = mysqli_query($conn, $sql);
        $id_order = $conn->insert_id;
        $keys = array_keys($_SESSION['giohang']);
        $keyString = implode(',', $keys);
        $sql = "SELECT * FROM sanpham WHERE id_sp IN ($keyString)";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($query);
        if ($result > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $id = $row['id_sp'];
                $price = $row['gia_sp'];
                $quanlity = $_SESSION['giohang'][$row['id_sp']];
                $result = "INSERT INTO order_detail (order_id, product_id,price,quanlity) VALUES ('$id_order','$id','$price','$quanlity')";
                mysqli_query($conn, $result);
            }
        }
        if (isset($name) && isset($telephone) && isset($address)) {
            echo " <script>window.location.href ='khachhang.php?page_layout=hoanthanh';</script>";
            unset($_SESSION['giohang']);
        }
    }
    ?>