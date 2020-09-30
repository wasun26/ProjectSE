<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
	<!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
		integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
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
							<span class="input-group-addon"
								style="font-size:16px; font-weight:inherit;border-top:2px solid #dce4ec;border-right:2px solid #dce4ec;border-bottom:2px solid #dce4ec;"
								id="basic-addon2"><font color="ffffff">@cmu.ac.th</font></span>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" placeholder="password" name="passid">
						</div>
						<div class="row align-items-center remember">
							<input type="checkbox">Remember Me
						</div>
						<div class="form-group">
							<input type="submit" value="Login" class="btn float-right login_btn" onclick="Login()">
						</div>
					</form>
					<script language="javascript">
						function Login() {
							var myform = document.login;
							if (myform.userid.value == "Admin" && ((myform.passid.value == "803") || (myform.passid.value == "710") || (myform.passid.value == "815") || (myform.passid.value == "809") || (myform.passid.value == "665")))
								window.open('\main.php')
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