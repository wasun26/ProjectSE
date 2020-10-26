<!DOCTYPE html>

<head>
	<style>
		.top {
			margin-top: 3.5%;
		}
	</style>

</head>

<?php
if (!isset($_SESSION['login_true'])) {
    echo("<meta http-equiv=refresh content=0;URL=login.php>");
    exit;
}

include("config.php");
?>
<div class="container top">
    <div align="center" style="border: none; " class="text-light">
        <h1>Exam Time Table Management</h1>
    </div>

    <div class="card-deck">
        <div class="card" style="border: none">
            <div class="card-header text-light" style="background-color: #152F4F;">
                ค้นหาจากรหัสนักศึกษา
            </div>
            <form method="POST" action="?page=examlist">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="input-group m-b">
                            <div class="input-group-prepend">
                                <span class="input-group-text">รหัสนักศึกษา</span>
                            </div>
                            <input name="searchData" type="text" required class="form-control" id="student_id" placeholder="610510XXX" minlength="9" maxlength="9">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <button type="submit" class="btn btn-primary btn-xs" name="search1"><i class="fa fa-search"></i> Search</button>
                    </li>
                </ul>
                <input type="hidden" name="searchType" value="studentID">
            </form>
        </div>

        <div class="card" style="border: none;">
            <div class="card-header text-light" style="background-color: #152F4F;">
                ค้นหาตามวิชา
            </div>
            <form method="POST" action="?page=examlist">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="input-group m-b">
                            <div class="input-group-prepend">
                                <span class="input-group-text">รหัสวิชา</span>
                            </div>
                            <input name="searchData" type="text" required class="form-control" id="course_keyword" placeholder="204" minlength="3" maxlength="3">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <button type="submit" class="btn btn-primary btn-xs" name="search3" value="search3"><i class="fa fa-search"></i> Search</button>
                        <i>
                            <font color="#FF0004">* ระบุรหัสวิชา 3 ตัวหน้า</font>
                        </i>
                    </li>
                </ul>
                <input type="hidden" name="searchType" value="subjectID">
            </form>
        </div>
    </div><br>

    <div class="card-deck">
        <div class="card" style="border: none">
            <div class="card-header text-light" style="background-color: #152F4F;">
                ค้นหาจากรหัสกระบวนวิชา
            </div>
            <form method="POST" action="?page=examlist">
                <ul class="list-group">
                    <li class="list-group-item">
                        <?php
                        for ($i = 0; $i < 5; $i++) {
                            echo ("
                            <div class='input-group m-b'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text'>รหัสวิชา</span>
                            </div>
                            <input type='text' name='searchData[]' id='$i' class='form-control' minlength='6' maxlength='6' placeholder='204XXX'>
                        </div>
                            ");
                        }
                        ?>
                    </li>
                    <li class="list-group-item">
                        <button type="submit" class="btn btn-primary btn-xs" name="search4"><i class="fa fa-search"></i> Search</button>
                    </li>
                </ul>
                <input type="hidden" name="searchType" value="multisubjectID">
            </form>
        </div>

        <div class="card" style="border: none">
            <div class="card-header text-light" style="background-color: #152F4F;">
                ค้นหาจากชื่อกรรมการคุมสอบ
            </div>
            <form method="POST" action="?page=examlist">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="input-group m-b">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ชื่อ-สกุล</span>
                            </div>
                            <input type="text" name="nameExam" class="form-control" required>
                            <input type="hidden" name="searchData" value="0">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <button type="submit" class="btn btn-primary btn-xs" name="search5"><i class="fa fa-search"></i> Search</button>
                        <span id="searchAdvisor"></span>
                    </li>
                </ul>
                <input type="hidden" name="searchType" value="examinerName">
            </form>
            <br>
            <?php if ($access == 2) { ?>
                <div class="card-header text-light" style="background-color: #152F4F;">
                    รายวิชาของฉัน
                </div>
                <form method="POST" action="?page=examlist">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <input type="hidden" name="searchType" value="owner">
                            <input type="hidden" name="searchData" value="<?php echo ($idUser) ?>">
                            <button type="submit" class="btn btn-primary btn-xs" name="search5"><i class="fa fa-search"></i> Search</button>
                        </li>
                    </ul>
                </form><?php } ?>
            <?php if ($access == 3) { ?>
                <div class="card-header text-light" style="background-color: #152F4F;">
                    จัดการคำขอ
                </div>
                <form method="POST" action="?page=selectexamall">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Search</button>
                        </li>
                    </ul>
                </form><?php } ?>
        </div>
    </div>
</div>