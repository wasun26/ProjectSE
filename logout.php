<?php
session_start();
session_destroy();

if (!(isset($_SESSION['login_true']))) {
    header("Location: ./?");
	exit;
}

#<meta http-equiv=refresh content=1;URL=?>
<div class="container justify-content-center">
  <p><br>
    <br>
<b>ออกจากระบบเรียบร้อยแล้ว</b></p>
  <p>กรุณารอสักครู่ เพื่อกลับสู่หน้าหลัก...<br>
    <br>
  </p>
</div>