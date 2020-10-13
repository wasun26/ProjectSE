<!DOCTYPE html>
<div class="container">
    <div class="card" align="center" style="border: none;">
        <h1>Exam Time Table Management</h1>
    </div>

    <div class="card-deck">
        <div class="card" style="border: none">
            <div class="card-header text-light" style="background-color: #152F4F;">
                ค้นหาจากรหัสนักศึกษา
            </div>
            <form method="POST" action="examlist.php">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="input-group m-b">
                            <div class="input-group-prepend">
                                <span class="input-group-text">รหัสนักศึกษา</span>
                            </div>
                            <input type="text" name="student_id" id="student_id" class="form-control" maxlength="9" required>
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
            <form method="POST" action="examlist.php">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="input-group m-b">
                            <div class="input-group-prepend">
                                <span class="input-group-text">รหัสวิชา</span>
                            </div>
                            <input type="text" name="course_keyword" id="course_keyword" class="form-control" maxlength="3" required>
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
            <form method="POST" action="examlist.php">
                <ul class="list-group">
                    <li class="list-group-item">
                        <?php
                        for ($i = 0; $i < 5; $i++) {
                            echo ("
                            <div class='input-group m-b'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text'>รหัสวิชา</span>
                            </div>
                            <input type='text' name='courseno[]' id='$i' class='form-control' maxlength='6'>
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
            <form method="POST" action="examlist.php">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="input-group m-b">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ชื่อ</span>
                            </div>
                            <input type="text" name="owner_fname" class="form-control">
                            <div class="input-group-prepend">
                                <span class="input-group-text">สกุล</span>
                            </div>
                            <input type="text" name="owner_lname" class="form-control">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary btn-xs" name="search5" onClick="searchAdvisor(document.getElementById('owner_keyword').value);"><i class="fa fa-search"></i> Search</button>
                        <span id="searchAdvisor"></span>
                    </li>
                </ul>
                <input type="hidden" name="searchType" value="examinerName">
            </form>
        </div>
    </div>
</div>