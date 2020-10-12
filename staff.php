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
					<td>ภาคการศึกษา:</td>
					<td><input type="text" name="semester"></td>
				</tr>
				<tr>
					<td><label for="phase">ช่วงสอบ:</label></td>
					<td><select name="phase" id="phase">
							<option value="NULL">เลือก</option>
							<option value="mid">Midterm</option>
							<option value="final">Final</option>
						</select></td>
				</tr>
				<tr>
					<td><label for="date2">วันที่:</label></td>
					<td><input type="date" id="date" name="date"></td>
				</tr>
				<tr>
					<td><?php
						$sql = "SELECT id FROM subject";
						$result = $conn->query($sql);
						?>
						วิชา:
					<td>
						<select name='subject'>
							<option value='NULL'> เลือก </option>
							<?php

							while ($row = $result->fetch_assoc()) { //begin while
								$code = $row['id'];
								echo "<option value = '$code'> $code </option>";
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php
						$sql = "SELECT * FROM room ";
						$result = $conn->query($sql);
						?>
						ห้องสอบ:
					</td>
					<td>
						<select name='room'>
							<option value='NULL'> เลือก </option>
							<?php
							while ($row = $result->fetch_assoc()) { //begin while
								$name = $row['name'];
								echo "<option value = '$name'> $name </option>";
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php
						$sql = "SELECT * FROM timeexam ";
						$result = $conn->query($sql);
						?>
						เวลาสอบ:
					</td>
					<td>
						<select name='time'>
							<option value='NULL'> เลือก </option>
							<?php
							while ($row = $result->fetch_assoc()) { //begin while
								$time = $row['id'];
								$time_start = $row['timeStart'];
								$time_end = $row['timeFinish'];
								echo "<option value = '$time'> $time_start - $time_end</option>";
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php
						$sql = "SELECT * FROM teacher ";
						$result = $conn->query($sql);
						?>
						ผู้คุมสอบ(อาจารย์):
					</td>
					<td>
						<select name='examiner_t'>
							<option value='NULL'> เลือก </option>
							<?php
							while ($row = $result->fetch_assoc()) {
								$id = $row['id'];
								$f_name = $row['fname'];
								$l_name = $row['lname'];
								echo "<option value = '$id'>$f_name $l_name</option>";
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>ผู้คุมสอบ(บุคลากร):
						<?php
						$sql = "SELECT * FROM staff ";
						$result = $conn->query($sql);
						?>
					</td>
					<td>
						<select name='examiner_s'>
							<option value='NULL'>เลือก</option>
							<?php
							while ($row = $result->fetch_assoc()) {
								$id = $row['id'];
								$f_name = $row['fname'];
								$l_name = $row['lname'];
								echo "<option value = '$id'>$f_name $l_name</option>";
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