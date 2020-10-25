<!DOCTYPE html>
<html>

<head>
    <style>
        html,
        body {
            background-image: url('image/home-banner.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            width: 100%;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }

        .button1 {
            text-align: center;
            cursor: pointer;
            border: 1px solid;
            padding: 10px;
            box-shadow: 5px 10px #888888;
        }

        body {
            height: 1054px;
        }

        .top {
            margin-top: 5%;
        }

        .top2 {
            margin-top: 3%;
        }

        .deepshd {
            color: #ffffff;
            text-shadow: 4px 4px#000000;
        }
        .size_img{
            width: 200px;
            height: 200px;
        }
    </style>
</head>

<body>

    <div align="center" class="top">
        <img src="image/cs_logo.png" class="size_img" alt="CS LOGO">
        <img src="image/cmu.png" alt="CMU LOGO">
        <img src="image/reglogo.png" alt="REG LOGO">
        
    </div>

    <div align="center" class="deepshd">
        <h1>ระบบจัดการและตรวจห้องสอบ<br>
            ภาควิชาวิทยาการคอมพิวเตอร์ มหาวิทยาลัยเชียงใหม่</h1>
    </div>

    <div class="card-deck">
        <div class="card top2">
            <button type="button" class="btn btn-primary btn-lg btn-block btn-huge button1" onclick="Login('2')">สำหรับอาจารย์</button>
            <br>
            <ul>
                <li>จัดการและส่งคำขอใช้ห้องสอบ</li>
                <li>ตรวจห้องสอบและวันเวลาที่พร้อมใช้</li>
                <li>จัดการลงวันเวลาสอบ</li>
            </ul>
        </div>
        <div class="card top2">
            <button type="button" class="btn btn-primary btn-lg btn-block btn-huge button1" onclick="Login('3')">สำหรับเจ้าหน้าที่</button>
            <br>
            <ul>
                <li>จัดการคำขอใช้ห้องสอบ</li>
                <li>ตรวจห้องสอบและวันเวลาที่พร้อมใช้</li>
            </ul>
        </div>
        <div class="card top2">
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