<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
$cat=new Category();
if(isset($_GET['delcat'])){
    $id=$_GET['delcat'];
    $delCat=$cat->catDelById($id);
}
?>
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>لیست دسته ها</h2>
                <div class="block">
                    <?php
                    if(isset($delCat)){
                        echo $delCat;
                    }
                    ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>سریال</th>
							<th>نام دسته</th>
							<th>تغییرات</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                    $getCat=$cat->GetAllCat();
                    if($getCat){
                        $i=0;
                            while($result=$getCat->fetch_assoc()){
                            $i++;

                    ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['catName'];?></td>
							<td><a href="catedit.php?catid=<?php echo $result['catId'];?>">Edit</a>
                                || <a onclick="return confirm('Are You Sure?')" href="?delcat=<?php echo  $result['catId']; ?>">Delete</a></td>
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

