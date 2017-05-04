<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';?>
<?php
if (!isset($_GET['brandid']) || $_GET['brandid']==null){
    header("location:brandlist.php");
}else {
    $id = $_GET['brandid'];
}

$brand = new Brand();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandname = $_POST['brandName'];
    $updateBrand= $brand->BrandUpdate($brandname,$id);
}
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Update Brand</h2>
            <div class="block copyblock">
                <?php
                if(isset($updateBrand)){
                    echo $updateBrand;
                }
                ?>
                <?php
                $getbrand=$brand->GetBrandById($id);
                if($getbrand){
                    while ($result=$getbrand->fetch_assoc()){
                        ?>
                        <form action="" method="post">
                            <table class="form">
                                <tr>
                                    <td>
                                        <input type="text" name="brandName" value="<?php echo $result['brandName'];?>" placeholder="Enter Category Name..." class="medium" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" name="submit" Value="Save" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    <?php }} ?>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?>