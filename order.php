<?php include "inc/header.php"; ?>
<?php
$login=Session::get("custLogin");
if($login==false) {
    header("location:login.php");
}
?>
    <div class="main">
        <div class="content">
            <div class="content_top">
                <div class="heading">
                                </div>
        </div>
    </div>
    </div>
<?php include "inc/footer.php"; ?>