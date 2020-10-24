<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['login_true'])) {
	header("Location: ./?page=main");
	exit;
}

include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	login();
}

function login()
{
	include("config.php");
	$conn = new mysqli($config['hostname'], $config['dbuser'], $config['dbpassword'], $config['dbname']);
	$email = $_POST['email'] . '@cmu.ac.th';
	$sql = "SELECT email, password FROM user WHERE email='$email'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$dbarr = $result->fetch_assoc();
		if ($dbarr['email'] == $email && $dbarr['password'] == $_POST['password']) {
			$_SESSION['login_true'] = $email;
			$conn->close();
			echo ($_SESSION['login_true']);
			header("location: ./?page=main");
		}
	}
	$conn->close();
	echo ("<script> $(document).ready(function(){ $('#myModal').modal('show'); }); </script>");
}
?>
<html>

<head>
	<title>OAUTH</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="animation.css">
</head>

<body>
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
					</form>
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
				<div class="modal-body text-danger justify-content-center">
					<div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">
						<span class="swal2-x-mark">
							<span class="swal2-x-mark-line-left"></span>
							<span class="swal2-x-mark-line-right"></span>
						</span>
					</div>
					<div class="d-flex justify-content-center">
						Email หรือ รหัสผ่าน ไม่ถูกต้อง กรุณาลองอีกครั้ง
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
				</div>
			</div>
		</div>
	</div>
</body>

</html>