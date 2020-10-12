<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>


	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container-fluid">
			<a href="./" class="navbar-brand">
				<?php
				#<img src="" width="30" height="30" class="d-inline-block align-top" alt="srt logo"> 
				?>
				<?php print($config['title_short']); ?>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item"><a href="./" class="nav-link" routerLink="train">หน้าแรก</a></li>
					<?php
					#$conn = new mysqli($config['hostname'], $config['dbuser'], $config['dbpassword'], $config['dbname']);
					#$email = $_POST['email'] . '@cmu.ac.th';
					#$login = "SELECT email, password FROM $type WHERE email='$email'";
					#$result = $conn->query($login);
					#$dbarr = $result->fetch_assoc();
					#$conn->close();
					if (false) {
						echo ("
						<li class='nav-item'><a href='#' class='nav-link' routerLink='profile'>โปรไฟล์</a></li>
						<li class='nav-item'><a href='#' class='nav-link' routerLink='login'>เข้าสู่ระบบ</a></li>
						<li class='nav-item'><a href='#' class='nav-link' routerLink='register'>ลงทะเบียน</a></li>
						<li class='nav-item'><a href='#' class='nav-link' (click)='logout()'>ออกจากระบบ</a></li>
				
					");
					}
					?>
				</ul>
				<?php
				#<ul class="navbar-nav  navbar-right">
				#<li class="nav-item" *ngIf="isLoggedIn">
				#<button type="button" class="btn btn-light" routerLink="profile" *ngIf="isLoggedIn">{{email}}</button>
				#</li>
				#</ul>
				?>
			</div>
		</div>
	</nav>
</body>

</html>