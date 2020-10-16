<!DOCTYPE html>
<?php

include("config.php");

$conn = new mysqli(
	$config['hostname'],
	$config['dbuser'],
	$config['dbpassword'],
	$config['dbname']
);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

mysqli_set_charset($conn, "utf8");
?>

<div class="container">
	<h1>เพิ่มวิชาสอบ</h1>
	<form action="insert.php" method="POST">
		<table width="100%" border=" 0" class="table table-striped table-hover">
			<tbody>
				<tr>
					<td>ปีการศึกษา:</td>
					<td><input type="text" name="year"></td>
				</tr>
				<tr>
					<td><label for="semester">ภาคการศึกษา:</label></td>
					<td><select name="semester" id="semester" required>
							<option value="NULL">เลือก</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select></td>
				</tr>
				<tr>
					<td><?php
						$sql = "SELECT name FROM phase ";
						$result = $conn->query($sql);
						?>
						ช่วงสอบ:
					</td>
					<td>
						<select name='phase' required>
							<option value='NULL'> เลือก </option>
							<?php
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) { //begin while
									$id = $row['id'];
									$name = $row['name'];
									echo "<option value = '$id'> $name </option>";
								}
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="date">วันที่:</label></td>
					<td><input type="date" id="date" name="date" required></td>
				</tr>
				<tr>
					<td><?php
						$sql = "SELECT id, name FROM subject";
						$result = $conn->query($sql);
						?>
						วิชา:
					<td>
						<select name='subject' required>
							<option value='NULL'> เลือก </option>
							<?php
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) { //begin while
									$code = $row['id'];
									$name = $row['name'];
									echo "<option value = '$code'> $code - $name </option>";
								}
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php
						$sql = "SELECT name FROM room ";
						$result = $conn->query($sql);
						?>
						ห้องสอบ:
					</td>
					<td>
						<select name='room' required>
							<option value='NULL'> เลือก </option>
							<?php
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) { //begin while
									$name = $row['name'];
									echo "<option value = '$name'> $name </option>";
								}
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php
						$sql = "SELECT id, timeStart, timeFinish FROM timeexam ";
						$result = $conn->query($sql);
						?>
						เวลาสอบ:
					</td>
					<td>
						<select name='time' required>
							<option value='NULL'> เลือก </option>
							<?php
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) { //begin while
									$time = $row['id'];
									$time_start = $row['timeStart'];
									$time_end = $row['timeFinish'];
									echo "<option value = '$time'> $time_start - $time_end</option>";
								}
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php
						$sql = "SELECT id, fname, lname FROM user WHERE access=2";
						$result = $conn->query($sql);
						?>
						ผู้คุมสอบ(อาจารย์):
					</td>
					<td>
						<select name='examiner_t' required>
							<option value='NULL'> เลือก </option>
							<?php
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									$id = $row['id'];
									$f_name = $row['fname'];
									$l_name = $row['lname'];
									echo "<option value='$id'>$f_name $l_name</option>";
								}
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>ผู้คุมสอบ(บุคลากร):
						<?php
						$sql = "SELECT id, fname, lname FROM user WHERE access=3";
						$result = $conn->query($sql);
						?>
					</td>
					<td>
						<select name='examiner_s' required>
							<option value='NULL'>เลือก</option>
							<?php
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									$id = $row['id'];
									$f_name = $row['fname'];
									$l_name = $row['lname'];
									echo "<option value='$id'>$f_name $l_name</option>";
								}
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Add"> <input type="reset" value="Reset"></td>
				</tr>
			</tbody>
		</table>
	</form>
</div>