<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/Product.php';?>
<?php
if (!isset($_GET['proid']) || $_GET['proid']==null){
header("location:productlist.php");
}else {
$id = $_GET['proid'];
}
?>
<?php
$pd=new Product();
if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['submit']){
    $updateProduct=$pd->ProductUpdate($_POST,$_FILES,$id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
            <?php
            if (isset($updateProduct)){
                echo $updateProduct;
            }
            ?>
            <?php
            $getprod=$pd->GetProductById($id);
            if ($getprod){
                while ($value=$getprod->fetch_assoc()){

            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="productName" value="<?php echo $value  ['productName'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="catId">
                                <?php
                                $cat=new Category();
                                $getcat=$cat->GetAllCat();
                                if($getcat){
                                    while ($result=$getcat->fetch_assoc()){
                                        ?>
                                        <option
                                            <?php
                                        if($value['catId']==$result['catId']){?>
                                            selected="selected";
                                        <?php } ?>

                                            value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>
                                    <?php } }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Brand</label>
                        </td>
                        <td>
                            <select id="select" name="brandId">
                                <?php
                                $brand=new Brand();
                                $getbrand=$brand->GetAllBrand();
                                if($getbrand){
                                    while ($result=$getbrand->fetch_assoc()){
                                        ?>
                                        <option
                                            <?php
                                            if($value['brandId']==$result['brandId']){?>
                                                selected="selected";
                                            <?php } ?>

                                            value="<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?></option>                                    <?php }} ?>
                            </select>

                        </td>
                    </tr>

                    <tr>
                        <td style=" vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <table>
                            <textarea class="tinymce" name="body">
                                <?php echo $value['body'];?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Price</label></td>
                        <td>
                            <input type="text" name="price" value="<?php echo $value['price'];?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img src="<?php echo $value['image'];?>" width="45px" height="45px"/>
                            <input type="file"  name="image"/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Product Type</label>
                        </td>
                        <td>
                            <select id="select" name="type">
                                <option>Select Type</option>
                                <?php
                                if($value['type']==0){?>
                                <option value="0" selected="selected">Featured</option>
                                <option value="1">General</option>
                                    <?php }else{ ?>

                                    <option value="0" >Featured</option>
                                    <option value="1" selected="selected">General</option>
                                    <?php }?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        <?php  }} ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


