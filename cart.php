 <?php include "inc/header.php";
    ?>

<?php
if(isset($_GET['delpro'])){
    $delId=$_GET['delpro'];
    $delprod=$ct->DelProByCart($delId);
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $quantity=$_POST['quantity'];
    $cartId=$_POST['cartId'];
    $updatecart=$ct->UpdateCartQuantity($cartId,$quantity);
    if($quantity <= 0 ){
        $delprod=$ct->DelProByCart($cartId);

    }
}

?>
    <div class="main">
        <div class="content">
            <div class="cartoption">
                <div class="cartpage">
                    <h2>سبد خرید</h2>
                    <?php
                    if(isset($updatecart)){
                        echo $updatecart;
                    }

                    if(isset($delprod)){
                        echo $delprod;
                    }
                    ?>
                    <table class="tblone">
                        <tr>
                            <th width="8%">شماره</th>
                            <th width="20%">نام محصول</th>
                            <th width="10%">عکس</th>
                            <th width="15%">قیمت</th>
                            <th width="25%">تعداد</th>
                            <th width="20%">قیمت کل</th>
                            <th width="10%">حذف</th>
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
                            <td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
                            <td><?php echo $result['price'];?> ریال </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="cartId" value="<?php echo $result['cartId'];?>"/>
                                    <input type="number" name="quantity" value="<?php echo $result['quantity'];?>"/>
                                    <input type="submit" name="submit" value="ویرایش"/>
                                </form>
                            </td>
                            <td><?php
                                $total=$result['price'] * $result['quantity'];
                                echo $total;
                                ?></td>
                            <td><a onclick="return confirm('Are You Sure?');" href="?delpro=<?php echo $result['cartId'];?>">X</a></td>
                        </tr>

                                <?php $sum=$sum + $total;?>
                                <?php Session::set("sum",$sum);?>

<?php   }} ?>
                    </table>
                    <table style="float:right;text-align:left;" width="40%">
                        <tr>
                            <th>قیمت نهایی : </th>
                            <td>
                                <?php echo $sum;?>
                            </td>
                        </tr>
                        <tr>
                            <th>تخفیف : </th>
                            <td>
                                10% <?php $vat=$sum * 0.1;?>
                            </td>
                        </tr>
                        <tr>
                            <th>قیمت کل : </th>
                            <td>
                                <?php $vat=$sum*0.1;
                                $gtotal=$sum + $vat;
                                echo $gtotal;
                            ?></td>
                        </tr>
                    </table>
                </div>
                <div class="shopping">
                    <div class="shopleft">
                        <a href="payment.php"> <img src="images/shop.png" alt="" /></a>
                    </div>
                    <div class="shopright">
                        <a href="login.php"> <img src="images/check.png" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php include "inc/footer.php"; ?>