<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>
<?php include_once '../helpers/format.php';?>

<?php
$fm=new Format();
?>
<?php
$pd=new Product();
if(isset($_GET['delpro'])){
    $id=$_GET['delpro'];
    $delpro=$pd->ProDelById($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>لیست محصولات</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>شماره</th>
					<th>نام محصول</th>
					<th>دسته</th>
					<th>برند</th>
					<th>توضیحات</th>
					<th>قیمت</th>
					<th>عکس</th>
					<th>نوع</th>
					<th>تفییرات</th>
				</tr>
			</thead>
			<tbody>
            <?php
            $getpd=$pd->GetAllProduct();
            if($getpd){
                $i=0;
                while ($result=$getpd->fetch_assoc()){
                    $i++;?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['productName'];?></td>
					<td><?php echo $result['catName'];?></td>
					<td><?php echo $result['brandName'];?></td>
					<td><?php echo $fm->formatDate($result['body'],50);?></td>
					<td><?php echo $result['price'];?> Rial</td>
					<td><img src="<?php echo $result['image'];?>" width="45px" height="45px"/></td>
					<td><?php
                    if($result['type']==0){
                        echo "Feathured";
                    }else{
                        echo "General";
                    }
                        ?>
                    </td>
					<td class="center"> 4</td>
					<td><a href="productedit.php?proid=<?php echo $result['productId'];?>">ویرایش</a>
                        || <a onclick="return confirm('Are U Sure?')" href="?delpro=<?php echo $result['productId'];?>">حذف</a></td>
				</tr>
                <?php  }} ?>
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
