<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header text-primary">
                        <a href="#">
                            <center>
                                <h5>สำหรับอาจารย์</h5>
                            </center>
                        </a>
                    </div>
                    <button type="button" class="btn btn-success" onclick="Login()">Login</button>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header text-primary">
                        <center>
                            <h5>สำหรับเจ้าหน้าที่</h5>
                        </center>
                    </div>
                    <button type="button" class="btn btn-success" onclick="Login()">Login</button>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header text-primary">
                        <center>
                            <h5>สำหรับนักศึกษา</h5>
                        </center>
                    </div>
                    <button type="button" class="btn btn-success" onclick="Login()">Login</button>
                </div>
            </div>
        </div>
    </div>

    <script language="javascript">
        function Login() {
            window.open('\login.php')
        }
    </script>
</body>

</html>