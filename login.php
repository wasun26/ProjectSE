<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['login_true'])) {
	header("Location: ?page=main");
	exit;
}

include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	login($_POST['loginType']);
}

function login($type)
{
	include("config.php");
	$conn = new mysqli($config['hostname'], $config['dbuser'], $config['dbpassword'], $config['dbname']);
	$email = $_POST['email'] . '@cmu.ac.th';
	echo ($email);
	echo ($_POST['password']);
	$login = "SELECT email, password FROM $type WHERE email='$email'";
	$result = $conn->query($login);
	$dbarr = $result->fetch_assoc();
	$conn->close();
	if ($dbarr) {
		if ($dbarr['email'] == $email && $dbarr['password'] == $_POST['password']) {
			$_SESSION['login_true'] = $user_login;
			header("location: ./?page=main");
		} else {
			echo ("<script>
			document.getElementById('alert').showModal();
			</script>
			");
		}
	}
}
?>
<html>

<head>
	<title>OAUTH</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
	<div></div>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3>Login</h3>
				</div>
				<div class="card-body">
					<form name="login" method="POST" action="<?php echo ($_SERVER['PHP_SELF']); ?>">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" class="form-control" placeholder="username" name="email">
							<div class="input-group-text">@cmu.ac.th</div>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" placeholder="password" name="password">
						</div>
						<div class="form-group">
							<input type="submit" value="Login" class="btn float-right login_btn">
						</div>
						<input type="hidden" name="loginType" value="<?php if (isset($_GET['logintype'])) {
																			echo ($_GET['logintype']);
																		} else {
																			echo ($_POST['loginType']);
																		} ?>">
					</form>
					<script language="javascript">
						function Login() {
							var myform = document.login;
							if (myform.userid.value == "Admin" && ((myform.passid.value == "803") || (myform.passid.value == "710") || (myform.passid.value == "815") || (myform.passid.value == "809") || (myform.passid.value == "665")))
								window.open('./?page=main')
							else
								alert("Error Password or Username")
							myform.reset();
						}
					</script>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">ข้อความจากระบบ</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					Email หรือ รหัสผ่าน ไม่ถูกต้อง กรุณาลองอีกครั้ง
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
				</div>

			</div>
		</div>
	</div>
</body>

</html>