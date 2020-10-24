<!DOCTYPE html>
<?php
if (!isset($_SESSION['login_true'])) {
	header("Location: login.php");
	exit;
}
if ($access < 2) {
	echo ("<meta http-equiv=refresh content=0;URL=?>");
	exit;
}
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
<script>
	$(document).ready(function() {
		$('.datepicker').datepicker({
			format: 'yyyy',
			viewMode: "years",
			minViewMode: "years",
			todayBtn: false,
			language: 'th', //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
			thaiyear: true //Set เป็นปี พ.ศ.
		});
	});
</script>

<div class="container">
	<h1>เพิ่มวิชาสอบ</h1>
	<form action="?page=insert" method="POST">
		<table width="100%" border=" 0" class="table table-striped table-hover">
			<tbody>
				<tr>
					<td>ผู้กรอก:</td>
					<td class="text-danger"><input type="text" name="id" class="form-control" value="<?php echo ($idUser); ?>" required disabled></td>
				</tr>
				<tr>
					<td>ปีการศึกษา:</td>
					<td class="text-danger">
						<input type="text" name="year" class="form-control datepicker" placeholder="ค.ศ." required>
					</td>
				</tr>
				<tr>
					<td>
						<label for="semester">ภาคการศึกษา:</label>
					</td>
					<td class="text-danger">
						<select name="semester" id="semester" class="form-control" required>
							<option value></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php
						$sql = "SELECT * FROM phase ";
						$result = $conn->query($sql);
						?>
						ช่วงสอบ:
					</td>
					<td class="text-danger">
						<select name='phase' class="form-control" required>
							<option value></option>
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
					<td class="text-danger"><input type="date" id="date" name="date" class="form-control" required></td>
				</tr>
				<tr>
					<td><?php
						$sql = "SELECT id, name FROM subject";
						$result = $conn->query($sql);
						?>
						วิชา:
					<td class="text-danger">
						<select name='subject' class="form-control" required>
							<option value></option>
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
					<td class="text-danger">
						<select name='room' class="form-control" required>
							<option value></option>
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
					<td class="text-danger">
						<select name='time' class="form-control" required>
							<option value></option>
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
					<td class="text-danger">
						<select name='examiner_t' class="form-control" required>
							<option value></option>
							<?php
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									if ($row['id'] != 'T0') {
										$id = $row['id'];
										$f_name = $row['fname'];
										$l_name = $row['lname'];
										echo "<option value='$id'>$f_name $l_name</option>";
									}
								}
							}
							?>
							<option value=NULL>ไม่เลือก</option>
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
					<td class="text-danger">
						<select name='examiner_s' class="form-control" required>
							<option value></option>
							<?php
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									if ($row['id'] != 'S0') {
										$id = $row['id'];
										$f_name = $row['fname'];
										$l_name = $row['lname'];
										echo "<option value='$id'>$f_name $l_name</option>";
									}
								}
							}
							?>
							<option value=NULL>ไม่เลือก</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Add" class="btn btn-primary"> <input type="reset" value="Reset" class="btn btn-danger"></td>
				</tr>
			</tbody>
		</table>
	</form>
</div>