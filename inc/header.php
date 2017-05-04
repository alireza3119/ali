
<?php
$file_path=realpath(dirname(__FILE__));
include $file_path.'/../lib/session.php';
Session::init();
?>
<?php

include_once $file_path.'/../lib/database.php';
include_once $file_path.'/../helpers/format.php';
spl_autoload_register(function ($class){
    include_once "classes/".$class.".php";
});

$db =new Database();
$fm=new Format();
$pd=new Product();
$cat=new category();
$ct=new Cart();
$cmr=new Customer();

?>

<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>  
<!DOCTYPE HTML>
<head>
    <title>Store Website</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="js/jquerymain.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        $(document).ready(function($){
            $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
        });
    </script>
</head>
<body>
<div class="wrap">
    <div class="header_top">
        <div class="logo">
            <a href="index.php"><img src="images/1129342001.jpg" width="200px" height="120px" alt="" /></a>
        </div>
        <div class="header_top_right">
            <div class="search_box">
                <form>
                    <input type="text" placeholder="جستجو" "><input type="submit" value="جستجو">
                </form>
            </div class="search_box">
            <div class="shopping_cart">
                <div class="cart">
                    <a href="#" title="View my shopping cart" rel="nofollow">
                        <span class="cart_title">سبد خرید</span>
                        <span class="no_product">
                            <?php
                            $sum=Session::get("sum");
                            echo "$".$sum;
?>

                        </span>
                    </a>
                </div>
            </div>
            <?php
            if (isset($_GET['cId'])){
                Session::destroy();
            }
            ?>
            <div class="login">
               <?php
               $login=Session::get("custLogin");
                if($login==false){ ?>

                   <a href="login.php">ورود</a>

               <?php } else { ?>

            <a href="?cid=<?php Session::get('crmId');?>">LogOut</a>

        <?php } ?>
            </div>

            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="menu">
        <ul id="dc_mega-menu-orange" class="dc_mm-orange">
            <li><a href="index.php">خانه</a></li>
            <li><a href="products.php">محصولات</a> </li>
            <li><a href="cart.php">سبد خرید</a></li>
            <li><a href="payment.php">پرداخت</a></li>
            <div class="clear"></div>
        </ul>
    </div>