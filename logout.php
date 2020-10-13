<?php
session_destroy();

if (!(isset($_SESSION['login_true']))) {
    header("Location: ./?");
	exit;
}
?>
<meta http-equiv=refresh content=1;URL=?>
<div class="container justify-content-center">
<b>ออกจากระบบเรียบร้อย</b><br>
กำลังนำกลับสู่หน้าหลัก...
</div>