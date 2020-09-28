<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="container-fluid">
		<a routerLink="" class="navbar-brand"><img src="" width="30" height="30" class="d-inline-block align-top" alt="srt logo">ระบบห้องสอบ</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"><a href="./" class="nav-link" routerLink="train">หน้าแรก</a></li>
				<li class="nav-item"><a href="#" class="nav-link" routerLink="ticket">ดูตารางสอบ</a></li>
				<?php
				if (true) {
					echo ("
						<li class='nav-item'><a href='#' class='nav-link' routerLink='login'>เข้าสู่ระบบ</a></li>
					");
				}
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
			<ul class="navbar-nav  navbar-right">
				<li class="nav-item" *ngIf="isLoggedIn">
					<button type="button" class="btn btn-light" routerLink="profile" *ngIf="isLoggedIn">{{email}}</button>
				</li>
			</ul>
		</div>
	</div>
</nav>