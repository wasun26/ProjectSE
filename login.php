<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
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
					<form name="login">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" class="form-control" placeholder="username" name="userid">
							<div class="input-group-text">@cmu.ac.th</div>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" placeholder="password" name="passid">
						</div>
						<div class="form-group">
							<input type="submit" value="Login" class="btn float-right login_btn" onclick="Login()">
						</div>
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
</body>

</html>