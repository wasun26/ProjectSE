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
    <div>
    <h1>ระบบงานทะเบียนการศึกษา<br>
    สำนักทะเบียนและประมวลผล มหาวิทยาลัยเชียงใหม่</h1>
    </div>

    <div class="card-deck button1">
        <div class="card">
            <button type="button" class="btn btn-primary btn-lg btn-block btn-huge" onclick="Login()">สำหรับอาจารย์</button>
        </div>
        <div class="card">
            <button type="button" class="btn btn-primary btn-lg btn-block btn-huge" onclick="Login()">สำหรับเจ้าหน้าที่</button>
        </div>
        <div class="card">
            <button type="button" class="btn btn-primary btn-lg btn-block btn-huge" onclick="Login()">สำหรับนักศึกษา</button>
        </div>
    </div>



    <script language="javascript">
        function Login() {
            window.open('\login.php')
        }
    </script>
</body>

</html>