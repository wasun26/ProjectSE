<?php
session_destroy();

if (!(isset($_SESSION['login_true']))) {
    header("Location: ./?");
    exit;
}
?>
<meta http-equiv=refresh content=5;URL=?>
<link rel="stylesheet" type="text/css" href="animation.css">
<div class="container d-flex justify-content-center mb-auto">
    <div class="card">
        <div class="card-header text-light bg-primary">
            ข้อความจากระบบ
        </div>
        <div class="card-body ">
            <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                <span class="swal2-success-line-tip"></span>
                <span class="swal2-success-line-long"></span>
                <div class="swal2-success-ring"></div>
                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
            </div>
            <b>ออกจากระบบเรียบร้อย</b>
            กำลังนำกลับสู่หน้าหลัก...
        </div>
        <div class="card-footer">
            <a href="?" class="btn btn-primary">กลับทันที</a>
        </div>
    </div>
</div>