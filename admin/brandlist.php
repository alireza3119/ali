<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';?>
<?php
$brand=new Brand();

if(isset($_GET['delbrand'])){
    $id=$_GET['delbrand'];
    $delBrand=$brand->BrandDelById($id);
}
?>
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>لیست برند</h2>
        <div class="block">
            <?php
            if(isset($delBrand)){
                echo $delBrand;
            }
//            ?>
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>سریال</th>
                    <th>نام برند</th>
                    <th>تغییرات</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $getBrand=$brand->GetAllBrand();
                if($getBrand){
                    $i=0;
                    while($result=$getBrand->fetch_assoc()){
                        $i++;

                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['brandName'];?></td>
                            <td><a href="brandedit.php?brandid=<?php echo $result['brandId'];?>">ویرایش</a>
                                || <a onclick="return confirm('Are You Sure?')"
                                      href="?delbrand=<?php echo  $result['brandId']; ?>">حذف</a></td>
                        </tr>
                    <?php }}?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>

