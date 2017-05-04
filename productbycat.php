<?php include "inc/header.php"; ?>
<?php if(!isset($_GET['catId']) || $_GET['catId']==null){
    header("location:404.php");
} else{
    $catId=$_GET['catId'];
}
?>

    <div class="main">
        <div class="content">
            <div class="content_top">
                <div class="heading">
                    <h3>Latest from Category</h3>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section group">
                <?php
                $productByCat=$pd->productByCategory($catId);
                if ($productByCat){
                    while ($result=$productByCat->fetch_assoc()){
                ?>                <div class="grid_1_of_4 images_1_of_4">
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="details.php?proid=<?php echo $result['productId'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
                        <h2><?php echo $result['productName'];?> </h2>
                        <p><?php echo $result['body'];?> </p>
                        <p><span class="price"><?php echo $result['price'];?> </span></p>
                        <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?> " class="details">Details</a></span></div>
                </div>
<?php }}else{
                    echo "product of this category unavailable";
} ?>
            </div>



        </div>
    </div>
<?php include "inc/footer.php"; ?>