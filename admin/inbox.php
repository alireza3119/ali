<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
$file_path=realpath(dirname(__FILE__));
include_once $file_path.'/../classes/Cart.php';
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>اطلاعات خرید مشتریان</h2>
                <div class="block">
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>شناسه</th>
							<th>نام محصول</th>
							<th>تعداد</th>
							<th>قیمت</th>
							<th>آدرس</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                    $ct=new Cart();
                    $getOrderProduct=$ct->GetAllOrderProduct();
                    if ($getOrderProduct){
                        while ($result=$getOrderProduct->fetch_assoc()){

                    ?>
						<tr class="odd gradeX">
							<td><?php echo $result['id'];?></td>
							<td><?php echo $result['productName'];?></td>
							<td><?php echo $result['quantity'];?></td>
							<td><?php echo $result['price'];?></td>
							<td><?php echo $result['address'];?></td>
  						</tr>
<?php  } } ?>
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
