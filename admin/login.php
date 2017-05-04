<?php include "../classes/adminlogin.php";?>
<?php
$al=new adminLogin();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $adminuser=$_POST['adminUser'];
    $adminpass=$_POST['adminPass'];
    $loginchk=$al->adminLogin($adminuser,$adminpass);

}

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>ورود مدیر</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>ورود مدیر</h1>
			<div>
				<input type="text" placeholder="نام کاربری" required="" name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="رمز" required="" name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="ورود" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Alireza Rahmanizade</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>