<!DOCTYPE html>

<div class="container">
    <div class="card" align="center" style="border: none;">
        <h1>Exam Time Table Management</h1><br>
        เลือกแบบฟอร์มและระบุเงื่อนไขที่ต้องการสืบค้น
    </div><br>

    <div class="card-deck">
        <div class="card" style="border: none">
            <div class="card-header bg-primary">
                ค้นหาจากรหัสนักศึกษา
            </div>
            <form method="post" action="">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="input-group m-b">
                            <span class="input-group-addon">รหัสนักศึกษา</span>
                            <input type="text" name="student_id" id="student_id" class="form-control" maxlength="9" required>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <button type="submit" class="btn btn-primary btn-xs" name="search1"><i class="fa fa-search"></i> Search</button>
                    </li>
                </ul>
            </form>
        </div>

        <div class="card" style="border: none">
            <div class="card-header bg-primary">
                ค้นหาตามวิชา
            </div>
            <form method="post" action="">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="input-group m-b">
                            <span class="input-group-addon">รหัสวิชา</span>
                            <input type="text" name="course_keyword" id="course_keyword" class="form-control" maxlength="3" required>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <i>
                            <font color="#FF0004">* ระบุรหัสวิชา 3 ตัวหน้า</font>
                        </i>
                        <button type="submit" class="btn btn-primary btn-xs" name="search3" value="search3"><i class="fa fa-search"></i> Search</button>
                    </li>
                </ul>
        </div>
    </div><br>

    <div class="card-deck">
        <div class="card" style="border: none">
            <div class="card-header bg-primary">
                ค้นหาจากรหัสกระบวนวิชา
            </div>
            <form method="post" action="">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="input-group m-b">
                            <span class="input-group-addon">Course No</span>
                            <input type="text" name="courseno[]" class="form-control" maxlength="6">
                            <span class="input-group-addon">LEC</span>
                            <input type="text" name="lec[]" class="form-control" maxlength="3">
                            <span class="input-group-addon">LAB</span>
                            <input type="text" name="lab[]" class="form-control" maxlength="3">
                        </div>
                        <div class="input-group m-b">
                            <span class="input-group-addon">Course No</span>
                            <input type="text" name="courseno[]" class="form-control" maxlength="6">
                            <span class="input-group-addon">LEC</span>
                            <input type="text" name="lec[]" class="form-control" maxlength="3">
                            <span class="input-group-addon">LAB</span>
                            <input type="text" name="lab[]" class="form-control" maxlength="3">
                        </div>
                        <div class="input-group m-b">
                            <span class="input-group-addon">Course No</span>
                            <input type="text" name="courseno[]" class="form-control" maxlength="6">
                            <span class="input-group-addon">LEC</span>
                            <input type="text" name="lec[]" class="form-control" maxlength="3">
                            <span class="input-group-addon">LAB</span>
                            <input type="text" name="lab[]" class="form-control" maxlength="3">
                        </div>
                        <div class="input-group m-b">
                            <span class="input-group-addon">Course No</span>
                            <input type="text" name="courseno[]" class="form-control" maxlength="6">
                            <span class="input-group-addon">LEC</span>
                            <input type="text" name="lec[]" class="form-control" maxlength="3">
                            <span class="input-group-addon">LAB</span>
                            <input type="text" name="lab[]" class="form-control" maxlength="3"></div>
                        <div class="input-group m-b">
                            <span class="input-group-addon">Course No</span>
                            <input type="text" name="courseno[]" class="form-control" maxlength="6">
                            <span class="input-group-addon">LEC</span>
                            <input type="text" name="lec[]" class="form-control" maxlength="3">
                            <span class="input-group-addon">LAB</span>
                            <input type="text" name="lab[]" class="form-control" maxlength="3">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <button type="submit" class="btn btn-primary btn-xs" name="search4"><i class="fa fa-search"></i> Search</button>
                    </li>
                </ul>
            </form>
        </div>

        <div class="card" style="border: none">
            <div class="card-header bg-primary">
                ค้นหาจากชื่อกรรมการคุมสอบ
            </div>
            <form method="post" action="">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="input-group m-b">
                            <span class="input-group-addon">ชื่อ-สกุล</span>
                            <input type="text" name="owner_keyword" id="owner_keyword" class="form-control">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary btn-xs" name="search5" onClick="searchAdvisor(document.getElementById('owner_keyword').value);"><i class="fa fa-search"></i> Search</button>
                        <span id="searchAdvisor"></span>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>