<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>
	<?php
	$navbar = "navbar-dark bg-primary";
	if (isset($_SESSION['login_true'])) {
		$conn = new mysqli($config['hostname'], $config['dbuser'], $config['dbpassword'], $config['dbname']);
		$email = $_SESSION['login_true'];
		$login = "SELECT fname, lname, access, UA.name nameacc FROM user, user_access UA WHERE email='$email' and user.access=UA.id";
		$result = $conn->query($login);
		$dbarr = $result->fetch_assoc();
		$conn->close();
		switch ($dbarr['access']) {
			case '2':
				$navbar = "navbar-dark bg-primary";
				break;
			case '3':
				$navbar = "navbar-dark bg-dark";
				break;
			default:
				$navbar = "navbar-dark bg-success";
				break;
		}
	}
	?>
	<nav class="navbar navbar-expand-lg <?php echo ($navbar); ?>">
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
					if (isset($_SESSION['login_true'])) {
						echo ("
						<li class='nav-item'><a href='?page=main' class='nav-link'>ค้นหา</a></li>
						
				
					");
						switch ($dbarr['access']) {
							case '2':
								echo ("
								<li class='nav-item'><a href='?page=staff' class='nav-link'>เพิ่มกระบวนวิชาสอบ</a></li>
								<li class='nav-item'><a href='?page=listtable' class='nav-link'>จัดการคำขอ</a></li>
								");
								break;
							case '3':
								echo ("
								<li class='nav-item'><a href='?page=staff' class='nav-link'>เพิ่มกระบวนวิชาสอบ</a></li>
								<li class='nav-item'><a href='?page=listtable' class='nav-link'>จัดการคำขอ</a></li>
								");
								break;
						}
						echo ("<li class='nav-item'><a href='./?page=logout' class='nav-link'>ออกจากระบบ</a></li>");
					?>
				</ul>
				<ul class='navbar-nav  navbar-right'>
					<li class='nav-item'>
						<button type='button' class='btn btn-light' routerLink='profile'>
							<b><?php echo ($dbarr['nameacc']); ?></b></button>
						<button type='button' class='btn btn-light' routerLink='profile'>
						<?php echo ($dbarr['fname'] . ' ' . $dbarr['lname']);
					} ?></button>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</body>

</html>