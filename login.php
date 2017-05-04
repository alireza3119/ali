<?php include "inc/header.php";
$login=Session::get("custLogin");
if($login==true){
    header("location:payment.php");
}
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
    $custlogin=$cmr->CustomerLogin($_POST);
    }
    ?>
    <div class="main">
        <div class="content">
            <div class="login_panel">

                <?php if(isset($custlogin)){
                    echo $custlogin;
                }?>
                <h3 style="float: right">اگر قبلا ثبت نام کردین</h3>
                <p style="float: right">با فرم زیر وارد شوید</p>
                <form action="" method="post" >
                    <input name="email" placeholder="ایمیل" type="text" ">
                    <input name="password" type="password" ">
                    <p class="note" style="float: right">قبلا  <a href="login.php">  ثبت نام  </a>نکردم</p>
                    <div class="buttons"><div><button class="grey" name="login">ورود</button></div></div>
            </div>
                </form>


            <?php
            if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){
                $customerReg=$cmr->CustomerRegisteraion($_POST);
            }
            ?>
            <div class="register_account">
              <?php if(isset($customerReg)){
                  echo $customerReg;
              }?>

                <h3 style="float: right">ثبت نام جدید</h3>
                <form action="" method="post">
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="name" placeholder="نام" " >
                                </div>

                                <div>
                                    <input type="text"  name="city" placeholder="شهر" ">
                                </div>

                                <div>
                                    <input type="text" name="zipcode" placeholder="کد تلفن">
                                </div>
                                <div>
                                    <input type="text" name="email" placeholder="ایمیل">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" name="address" placeholder="آدرس"">
                                </div>
                                <div>
                                    <input type="text" name="country" placeholder="کشور"">
                                </div>

                                <div>
                                    <input type="text" name="phone" placeholder="تلفن" >
                                </div>

                                <div>
                                    <input type="text" name="password" placeholder="رمز" >
                                </div>
                            </td>
                        </tr>
                        </tbody></table>
                    <div class="search"><div><button class="grey" name="register" style="margin: 0px auto">ثبت نام</button></div></div>

                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php include "inc/footer.php"; ?>