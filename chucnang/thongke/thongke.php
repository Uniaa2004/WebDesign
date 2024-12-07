<div class="w-100" style="background-color:#ccc">
<div style="width:100% ;background:#000;color:#fff; padding:5px ; margin-bottom:10px ;margin-top:10px">
        <h5>Thống kê</h5>
    </div>
    <div id="counter">
    <?php
    	$fp = 'chucnang/thongke/counter.txt';
    	$fo = fopen($fp, 'r');
		// đọc
    	$fr = fread($fo, filesize($fp));
    	$fc = fclose($fo);
    	$fo = fopen($fp, 'w');
    	$fr++;
    	$fw = fwrite($fo, $fr);
    	$fc = fclose($fo);
    ?>
    	<p>Currently <span><?php echo $fr; ?></span> Viewers</p>
    </div>
</div>