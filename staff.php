<!DOCTYPE html>
<?php
include("config.php");
?>
<html>

<head>
	<meta charset="UTF-8">
</head>

<body>
	<?php

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
		<form action="insert.php" method="post">

			ปีการศึกษา: <input type="text" name="year"><br>

			ภาคการศึกษา: <input type="text" name="semester"><br>

			<label for="phase">ช่วงสอบ:</label>
			<select name="phase" id="phase">
				<option value="NULL">เลือก</option>
				<option value="mid">Midterm</option>
				<option value="final">Final</option>
			</select><br>

			<?php
			$sql = "SELECT * FROM subject ";
			$result = $conn->query($sql);
			echo "วิชา: ";
			echo "<select name='subject'>";

			echo "<option value = 'NULL'> เลือก </option>";
			while ($row = $result->fetch_assoc()) { //begin while
				$code = $row['id'];
				echo "<option value = '$code'> $code </option>";
			}  //end while

			echo "</select><br>";
			?>

			<label for="date">วันที่:</label>
			<input type="date" id="date" name="date"><br>

			<?php
			$sql = "SELECT * FROM room ";
			$result = $conn->query($sql);
			echo "ห้องสอบ: ";
			echo "<select name='room'>";

			echo "<option value = 'NULL'> เลือก </option>";
			while ($row = $result->fetch_assoc()) { //begin while
				$name = $row['name'];
				echo "<option value = '$name'> $name </option>";
			}  //end while

			echo "</select><br>";
			?>

			<?php
			$sql = "SELECT * FROM timeexam ";
			$result = $conn->query($sql);
			echo "เวลาสอบ: ";
			echo "<select name='time'>";

			echo "<option value = 'NULL'> เลือก </option>";
			while ($row = $result->fetch_assoc()) { //begin while
				$time = $row['id'];
				$time_start = $row['timeStart'];
				$time_end = $row['timeFinish'];
				echo "<option value = '$time'> $time_start - $time_end</option>";
			}  //end while

			echo "</select><br>";
			?>

			<?php
			$sql = "SELECT * FROM teacher ";
			$result = $conn->query($sql);
			echo "ผู้คุมสอบ(อาจารย์): ";
			echo "<select name='examiner_t'>";

			echo "<option value = 'NULL'> เลือก </option>";
			while ($row = $result->fetch_assoc()) { //begin while
				$id = $row['id'];
				$f_name = $row['fname'];
				$l_name = $row['lname'];
				echo "<option value = '$id'>$f_name $l_name</option>";
			}  //end while

			echo "</select><br>";
			?>

			<?php
			$sql = "SELECT * FROM staff ";
			$result = $conn->query($sql);
			echo "ผู้คุมสอบ(บุคลากร): ";
			echo "<select name='examiner_s'>";

			echo "<option value = 'NULL'> เลือก </option>";
			while ($row = $result->fetch_assoc()) { //begin while
				$id = $row['id'];
				$f_name = $row['fname'];
				$l_name = $row['lname'];
				echo "<option value = '$id'>$f_name $l_name</option>";
			}  //end while

			echo "</select><br><br>";
			?>
			<input type="submit" value="Add">&nbsp&nbsp
			<input type="reset" value="Reset">
		</form>
	</div>
</body>

</html>