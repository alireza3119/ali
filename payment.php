<?php include "inc/header.php"; ?>
<?php
$login=Session::get("custLogin");
if($login==false) {
    header("location:login.php");
}
?>
    <style>
        .payment{width: 400px;height: 200px;text-align: center;font-size: 12px; padding: 1px auto;
            margin:5px auto;}
        .payment h2{
            border-bottom: #838aff;
            border-bottom: 1px solid #000000;
            margin-bottom: 20px;
        }
        .payment a{
            background: #ff4450;
            font-size: 22px;
            color: #A1EAFF;
            margin: 10px;
            padding: 10px;

        }
        .back{
            background: #baff21; margin: 0 auto; padding: 10px; color: ivory;
            display: block;width: 100px; text-align: center;border-top: rgba(35,48,8,0.93);
            border-top: 1px solid #000000;
        }

    </style>
    <div class="main">
        <div class="content">
            <div class="section group">
            <div class="payment" >
                <h2>چگونه پرداخت میکنید؟</h2>
                <a href="paymentoffline.php" >پرداخت آفلاین</a>
                <a href="paymentonline.php">پرداخت آنلاین</a>
            </div>
                <div class="back">
                    <a href="cart.php">برگشت</a>
                </div>

            </div>
        </div>
    </div>
<?php include "inc/footer.php"; ?>