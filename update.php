<?php
if (!isset($_SESSION['login_true'])) {
	header("Location: login.php");
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
if (isset($_POST['id'])) {
	$input = $_POST['id'];
	$sql = "SELECT e.* from exam e where e.id = '$input'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	echo "$input";
?>
	<div class="container">
		<h1>แก้ไขวิชาสอบ</h1>
		<form action="?page=edit" method="POST">
			<input type='hidden' name='id' value="<?php echo ($row['id']); ?>">
			<table width="100%" border=" 0" class="table table-striped table-hover">
				<tbody>
					<tr>
						<td>ปีการศึกษา:</td>
						<td><input type="text" name="year" value="<?php
																	$year = $row['year'];
																	echo "$year";
																	?>" disabled></a></td>
					</tr>
					<tr>
						<td><label for="semester">ภาคการศึกษา:</label></td>
						<td><select name="semester" id="semester">
								<option value="<?php echo ($row['semester']); ?>"></option>
								<?php
								$i = 1;
								while ($i != 4) {
									echo "<option value ='$i'"; ?>

									<?php
									if ($row['semester'] == $i) {
										echo "selected";
									}
									?>
									>
								<?php echo "$i</option>";
									$i++;
								}
								?>
								<!-- <option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option> -->
							</select></td>
					</tr>
					<tr>
						<td><label for="phase">ช่วงสอบ:</label></td>
						<td><select name="phase" id="phase">
								<option value="<?php echo ($row['phase']); ?>"></option>
								<?php
								$i = 1;
								while ($i != 3) {
									echo "<option value ='$i'"; ?>

									<?php
									if ($row['phase'] == $i) {
										echo "selected";
									}
									?>
									>
								<?php
									if ($i == 1) {
										echo ("Midterm");
									} else {
										echo ("Final");
									}
									echo "</option>";
									$i++;
								}
								?>
								<!-- <option value="1">Midterm</option>
							<option value="2">Final</option> -->
							</select></td>
					</tr>
					<tr>
						<td><label for="date">วันที่:</label></td>
						<td><input type="date" id="date" name="date" value="<?php echo ($row['date']) ?>"></td>
					</tr>
					<tr>
						<td><?php
							$sql = "SELECT id, name FROM subject";
							$result = $conn->query($sql);
							?>
							วิชา:
						<td>
							<select name='subject' disabled>
								<option value='<?php echo ($row['subject']) ?>' disabled> เลือก </option>
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
							$sql1 = "SELECT e.* from exam e where e.id = '$input'";
							$result1 = $conn->query($sql1);
							$row1 = $result1->fetch_assoc();
							?>
							ห้องสอบ:
						</td>
						<td>
							<select name='room'>
								<option value='<?php echo ($row['room']); ?>'> เลือก </option>
								<?php
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) { //begin while
										$name = $row['name'];
										echo "<option value = '$name'"; ?>
										<?php if ($name == $row1['room']) {
											echo "selected";
										}
										?>
										>
								<?php echo "$name </option>";
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
							$sql1 = "SELECT e.* from exam e where e.id = '$input'";
							$result1 = $conn->query($sql1);
							$row1 = $result1->fetch_assoc();
							?>
							เวลาสอบ:
						</td>
						<td>
							<select name='time'>
								<option value='<?php echo ($row['time']); ?>'> เลือก </option>
								<?php
								if ($result->num_rows > 0) {

									while ($row = $result->fetch_assoc()) { //begin while
										$time = $row['id'];
										$time_start = $row['timeStart'];
										$time_end = $row['timeFinish'];
										echo "<option value = '$time'" ?><?php
																	if ($row['id'] == $row1['time']) {
																		echo "selected";
																	}
																	?>> <?php echo "$time_start - $time_end</option>";
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
							$sql1 = "SELECT e.* from exam e where e.id = '$input'";
							$result1 = $conn->query($sql1);
							$row1 = $result1->fetch_assoc();
							?>
							ผู้คุมสอบ(อาจารย์):
						</td>
						<td>
							<select name='examiner_t'>
								<option value='<?php echo ($row['examiner_t']); ?>'> เลือก </option>
								<?php
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
										$id = $row['id'];
										$f_name = $row['fname'];
										$l_name = $row['lname'];
										echo "<option value='$id'"; ?>
										<?php
										if ($id == $row1['examiner_t']) {
											echo "selected";
										}
										?>
										>
								<?php echo "$f_name $l_name</option>";
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
							$sql1 = "SELECT e.* from exam e where e.id = '$input'";
							$result1 = $conn->query($sql1);
							$row1 = $result1->fetch_assoc();
							?>
						</td>
						<td>
							<select name='examiner_s'>
								<option value='NULL'>เลือก</option>
								<?php
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
										$id = $row['id'];
										$f_name = $row['fname'];
										$l_name = $row['lname'];
										echo "<option value='$id'" ?>
										<?php
										if ($id == $row1['examiner_s']) {
											echo "selected";
										}
										?>
										>
								<?php echo "$f_name $l_name</option>";
									}
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" value="update"></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>


<?php
}
?>