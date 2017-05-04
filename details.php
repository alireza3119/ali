<?php include "inc/header.php"; ?>
<?php
if(!isset($_GET['proid']) || $_GET['proid']==null ){
echo "no id!";
    //    header("location:404.php");
}else{
    $id=$_GET['proid'];
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $quantity=$_POST['quantity'];
    $addcart=$ct->AddToCart($quantity,$id);
}
?>
    <div class="main">
        <div class="content">
            <div class="section group">
                <?php
                    $getpd=$pd->GetSingleProduct($id);
                    if($getpd){
                        while ($result=$getpd->fetch_assoc()){

?>
                <div class="cont-desc span_1_of_2">
                    <div class="grid images_3_of_2">
                        <img src="admin/<?php echo $result['image'];?>" />
                    </div>
                    <div class="desc span_3_of_2">
                        <h2><?php echo $result['productName'];?></h2>
                        <p><?php echo $result['body'];?></p>
                        <div class="price">
                            <p>قیمت :  <span><?php echo $result['price'];?> ریال </span></p>
                            <p> <span><?php echo $result['catName'];?></span> : عنوان </p>
                            <p><span><?php echo $result['brandName'];?></span> : برند </p>
                        </div>
                        <?php }} ?>
                        <div class="add-cart">
                            <form action="" method="post">
                                <input type="number" class="buyfield" name="quantity" value="1"/>
                                <input type="submit" class="buysubmit" name="submit" value="خرید"/>
                            </form>
                        </div>
                        <span style="color: red;font-size: 18px;">

                            <?php
                            if(isset($addcart)){
                                echo $addcart;
                            }
                            ?>
                        </span>
                    </div>
                    <div class="product-desc">

                    </div>

                </div>
                <div class="rightsidebar span_3_of_1">
                    <h2>CATEGORIES</h2>
                    <ul>
                        <?php
                        $getcat=$cat->GetAllCat();
                        if($getcat){
                            while ($result=$getcat->fetch_assoc()){

                        ?>
                        <li><a href="productbycat.php?catId=<?php echo $result['catId'];?>"><?php echo $result['catName'];?></a></li>
                            <?php }}?>
                    </ul>

                </div>
            </div>
        </div>
<?php include "inc/footer.php"; ?>