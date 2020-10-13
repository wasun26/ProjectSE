<!DOCTYPE html>
<html>

<head>
    <style>
        .button1 {
            text-align: center;
            cursor: pointer;
            border: 1px solid;
            padding: 10px;
            box-shadow: 5px 10px #888888;
        }
    </style>
</head>

<body>
    <div align="center">
        <h1>ระบบจัดการและตรวจห้องสอบ<br>
            ภาควิชาวิทยาการคอมพิวเตอร์ มหาวิทยาลัยเชียงใหม่</h1>
    </div>

    <div class="card-deck">
        <div class="card">
            <button type="button" class="btn btn-primary btn-lg btn-block btn-huge button1" onclick="Login('2')">สำหรับอาจารย์</button>
            <br>
            <ul>
                <li>จัดการและส่งคำขอใช้ห้องสอบ</li>
                <li>ตรวจห้องสอบและวันเวลาที่พร้อมใช้</li>
                <li>จัดการลงวันเวลาสอบ</li>
            </ul>
        </div>
        <div class="card">
            <button type="button" class="btn btn-primary btn-lg btn-block btn-huge button1" onclick="Login('3')">สำหรับเจ้าหน้าที่</button>
            <br>
            <ul>
                <li>จัดการคำขอใช้ห้องสอบ</li>
                <li>ตรวจห้องสอบและวันเวลาที่พร้อมใช้</li>
            </ul>
        </div>
        <div class="card">
            <button type="button" class="btn btn-primary btn-lg btn-block btn-huge button1" onclick="Login('1')">สำหรับนักศึกษา</button>
            <br>
            <ul>
                <li>ดูวันและเวลาสอบ</li>
                <li>ตารางสอบ</li>
                <li>ห้องสอบ</li>
            </ul>
        </div>
    </div>

    <script language="javascript">
        function Login(type) {
            window.open("\login.php?logintype=" + type, "_self");
        }
    </script>
</body>

</html>