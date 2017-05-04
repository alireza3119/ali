<?php include "inc/header.php"; ?>

    <div class="main">
        <div class="content">
            <div class="content_top">
                <div class="heading">
                    <h3> آخرین های آیفون</h3>
                </div>
                <div class="clear"></div>
            </div>

            <?php $getLatestBrand=$pd->GetProByIphoneBrand();
            if ($getLatestBrand){
                while ($result=$getLatestBrand->fetch_assoc()){

            ?>
                <div class="grid_1_of_4 images_1_of_4">
                    <img src="admin/<?php echo $result['image'];?>" alt="" />
                    <h2><?php echo $result['productName'];?></h2>
                    <p><?php echo $result['body'];?></p>
                    <p><span class="price"><?php echo $result['price'];?></span>ریال </p>
                    <div class="button"><span><a href="cart.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
                </div>
                    <?php } } ?>
            </div>
            <div class="content_bottom">
                <div class="heading">
                    <h3>اخرین های سامسونگ</h3>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section group">

                <?php $getsamBrand=$pd->GetProBySamBrand();
                if ($getsamBrand){
                    while ($result=$getsamBrand->fetch_assoc()){

                        ?>
                        <div class="grid_1_of_4 images_1_of_4">
                            <img src="admin/<?php echo $result['image'];?>" alt="" />
                            <h2><?php echo $result['productName'];?></h2>
                            <p><?php echo $result['body'];?></p>
                            <p><span class="price"><?php echo $result['price'];?></span>ریال </p>
                            <div class="button"><span><a href="cart.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
                        </div>
                    <?php } } ?>
            </div>                <div class="grid_1_of_4 images_1_of_4">
                    <a href="preview-4.html"><img src="images/new-pic2.jpg" alt="" /></a>
                    <h2>Lorem Ipsum is simply </h2>
                    <p><span class="price">$621.75</span></p>
                    <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
                </div>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="preview-2.html"><img src="images/feature-pic2.jpg" alt="" /></a>
                    <h2>Lorem Ipsum is simply </h2>
                    <p><span class="price">$428.02</span></p>
                    <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
                </div>
                <div class="grid_1_of_4 images_1_of_4">
                    <img src="images/new-pic3.jpg" alt="" />
                    <h2>Lorem Ipsum is simply </h2>
                    <p><span class="price">$457.88</span></p>
                    <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
                </div>
            </div>
        </div>
    </div>
<?php include "inc/footer.php"; ?>