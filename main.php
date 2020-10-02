<!DOCTYPE html>
<div align="center">
    <div class="card">
        <div class="card-header">
            <h1>Exam Time Table Management</h1>
        </div>
    </div>
    เลือกแบบฟอร์มและระบุเงื่อนไขที่ต้องการสืบค้น
</div>

<div class="card-deck">
    <div class="card">
        <div class="card-header">
            ค้นหาจากรหัสนักศึกษา
        </div>
        <div class="card-body">
            <form method="post" action="?application=Education&module=Exams&com=exams_report_8_result.php&profile_id=8&edu_year=&edu_term=&exams_type_id=1">
                <div class="input-group m-b">
                    <span class="input-group-addon">รหัสนักศึกษา</span>
                    <input type="text" name="student_id" id="student_id" class="form-control" maxlength="9" required>
                </div>
                <button type="submit" class="btn btn-primary btn-xs" name="search1"><i class="fa fa-search"></i> Search</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            ค้นหาตามวิชา
        </div>
        <div class="card-body">
            <form method="post" action="?application=Education&module=Exams&com=exams_report_8_result2.php&profile_id=8&edu_year=&edu_term=&exams_type_id=1">
                <div class="input-group m-b">
                    <span class="input-group-addon">รหัสวิชา</span>
                    <input type="text" name="course_keyword" id="course_keyword" class="form-control" maxlength="3" required>
            </form>
            <i>
                <font color="#FF0004">* ระบุรหัสวิชา 3 ตัวหน้า</font>
            </i>
            <button type="submit" class="btn btn-primary btn-xs" name="search3" value="search3"><i class="fa fa-search"></i> Search</button>
        </div>
    </div>

    <form method="post" action="?application=Education&module=Exams&com=exams_report_8_result2.php&profile_id=8&edu_year=&edu_term=&exams_type_id=1">
        <div class="col-lg-6 wow zoomIn animated" style="visibility: visible;">
            <ul class="pricing-plan list-unstyled">
                ค้นหาจากรหัสกระบวนวิชา
                <div class="input-group m-b"><span class="input-group-addon">Course No</span> <input type="text" name="courseno[]" class="form-control" maxlength="6"> <span class="input-group-addon">LEC</span> <input type="text" name="lec[]" class="form-control" maxlength="3"><span class="input-group-addon">LAB</span> <input type="text" name="lab[]" class="form-control" maxlength="3"></div>
                <div class="input-group m-b"><span class="input-group-addon">Course No</span> <input type="text" name="courseno[]" class="form-control" maxlength="6"> <span class="input-group-addon">LEC</span> <input type="text" name="lec[]" class="form-control" maxlength="3"><span class="input-group-addon">LAB</span> <input type="text" name="lab[]" class="form-control" maxlength="3"></div>
                <div class="input-group m-b"><span class="input-group-addon">Course No</span> <input type="text" name="courseno[]" class="form-control" maxlength="6"> <span class="input-group-addon">LEC</span> <input type="text" name="lec[]" class="form-control" maxlength="3"><span class="input-group-addon">LAB</span> <input type="text" name="lab[]" class="form-control" maxlength="3"></div>
                <div class="input-group m-b"><span class="input-group-addon">Course No</span> <input type="text" name="courseno[]" class="form-control" maxlength="6"> <span class="input-group-addon">LEC</span> <input type="text" name="lec[]" class="form-control" maxlength="3"><span class="input-group-addon">LAB</span> <input type="text" name="lab[]" class="form-control" maxlength="3"></div>
                <div class="input-group m-b"><span class="input-group-addon">Course No</span> <input type="text" name="courseno[]" class="form-control" maxlength="6"> <span class="input-group-addon">LEC</span> <input type="text" name="lec[]" class="form-control" maxlength="3"><span class="input-group-addon">LAB</span> <input type="text" name="lab[]" class="form-control" maxlength="3"></div>
                <button type="submit" class="btn btn-primary btn-xs" name="search4"><i class="fa fa-search"></i> Search</button>
            </ul>
        </div>
    </form>

    <form method="post" action="">
        <div class="col-lg-6 wow zoomIn animated" style="visibility: visible;">
            <ul class="pricing-plan list-unstyled">
                ค้นหาจากชื่อกรรมการคุมสอบ
                <div class="input-group m-b"><span class="input-group-addon">ชื่อ-สกุล</span> <input type="text" name="owner_keyword" id="owner_keyword" class="form-control"></div>
                <button type="button" class="btn btn-primary btn-xs" name="search5" onClick="searchAdvisor(document.getElementById('owner_keyword').value);"><i class="fa fa-search"></i> Search</button>
                <span id="searchAdvisor"></span>
            </ul>
        </div>
    </form>
</div>
</div>
</section>
</div>