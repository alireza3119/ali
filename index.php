<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>
<?php
?>
    <div class="main">
        <div class="content">
            <div class="content_top">
                <div class="heading">
                    <h3>محصولات ویژه</h3>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section group">
            <?php
            $getFpd=$pd->GetFeaturedProduct();
            if ($getFpd){
                while ($result=$getFpd->fetch_assoc()){
            ?>
                    <div class="grid_1_of_4 images_1_of_4">
                    <a href="details.php?proid=<?php echo $result['productId'];?>"><img width="150px" height="150px" src="admin/<?php echo $result['image'];?>" alt="" /></a>
                    <h2><?php echo $result['productName'];?> </h2>
                    <p><?php echo $result['body'];?> </p>
                    <p><span class="price"><?php echo $result['price'];?> ریال </span></p>
                    <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?> " class="details">جزییات</a></span></div>
                </div>
<?php }} ?>
            <div class="content_bottom">
                <div class="heading">
                    <h3>محصولات جدید</h3>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section group">
                <?php $getnewpro=$pd->GetNewProduct();
                if ($getnewpro){
                    while ($result=$getnewpro->fetch_assoc()){

                ?>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="details.php?proid=<?php echo $result['productId'];?>"><img width="150px" height="150px" src="admin/<?php echo $result['image'];?>" alt="" /></a>
                    <h2><?php echo $result['productName'];?>  </h2>
                    <p><span class="price"><?php echo $result['price'];?> ریال </span></p>
                    <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">جزییات</a></span></div>
                </div>
                <?php } } ?>
            </div>
        </div>
    </div>

<?php include "inc/footer.php"; ?>
