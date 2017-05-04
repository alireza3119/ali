<?php include "inc/header.php"; ?>
<?php
$login=Session::get("custLogin");
if($login==false) {
    header("location:login.php");
}

if (@$_GET['orderid'] && isset($_GET['orderid'])){
    $cmrid=Session::get("cmrId");
    $insertOrder=$ct->OrderProduct($cmrid);
    header("location:success.php");
}
?>
<style>
.division{
    margin:0 auto;
}
</style>
    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="division">


                    <table class="tblone">
                        <tr>
                            <th>شماره</th>
                            <th>نام محصول</th>
                            <th>قیمت</th>
                            <th>تعداد</th>
                            <th>قیمت کل</th>
                            </tr>
                        <?php
                        $getpro=$ct->GetCartProduct();
                        if ($getpro){
                            $i=0;
                            $sum=0;
                            while ($result=$getpro->fetch_assoc()){
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $result['productName'];?></td>
                                    <td><?php echo $result['price'];?> ریال</td>
                                    <td><?php echo $result['quantity'];?> </td>

                                    <td><?php
                                        $total=$result['price'] * $result['quantity'];
                                        echo $total;
                                        ?></td>
                                    <?php  $qun=@$qun+$result['quantity'];?>
                                 </tr>

                                <?php $sum=$sum + $total;?>
                                <?php Session::set("sum",$sum);?>

                            <?php   }} ?>
                    </table>
                    <table style="float:right;text-align:left;" width="40%">
                        <tr style="background: rgba(35,48,8,0.93); color: red">
                            <th>قیمت نهایی :‌  </th>
                            <td>
                                <?php echo $sum;?> Rial
                            </td>
                        </tr>
                        <tr style="background:rgba(126,142,120,0.93); color:white ">
                            <th>تخفیف :  </th>
                            <td>
                                10% (<?php echo $vat=$sum * 0.1;?> ریال)
                            </td>
                        </tr>
                        <tr style="color: #004C96; color:black">
                            <th>قیمت کل : </th>
                            <td>
                                <?php $vat=$sum*0.1;
                                $gtotal=$sum + $vat;
                                echo $gtotal;
                                ?> Rial</td>
                        </tr>
                        <tr style="color: #004C96; color:black">
                            <th>تعداد : </th>
                            <td>
                                <?php echo $qun;
                                ?></td>
                        </tr>
                    </table>
                </div>
                </div>
                

            </div>
        </div>
    <div class="order" style="background: rgba(142,20,21,0.93);margin: 0 auto;
padding: 10px;margin-bottom: 10px; text-align: center;width: 100px">
        <a href="?orderid=order" style="color: rgba(203,204,180,0.93);font-size: 30px; ">سفارش</a>
    </div>
    </div>
<?php include "inc/footer.php"; ?>