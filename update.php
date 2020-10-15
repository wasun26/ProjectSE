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
if (isset($_POST['id'])){
    $input = $_POST['id'];
    $sql = "SELECT e.* from exam e where e.id = '$input'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();    

    ?>
    <div class="container">
	<h1>แก้ไขวิชาสอบ</h1>
	<form action="edit.php" method="POST">
    <input type='hidden' name = 'id' value = '$id'>
		<table width="100%" border=" 0" class="table table-striped table-hover">
			<tbody>
				<tr>
					<td>ปีการศึกษา:</td>
                    <td><input  type="text" name="year" value = "<?php
                        $year = $row['year'];
                        echo "$year";
                    ?>" disabled></a></td>
				</tr>
				<tr>
					<td><label for="semester">ภาคการศึกษา:</label></td>
					<td><select name="semester" id="semester">
                    <?php
                     $semester = $row['semester'];
                     ?>

                            <option value="<?php echo "$semester";
                            ?>"
                            >

                    <?php                           
                            echo "$semester" ?></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select></td>
				</tr>
				<tr>
					<td><label for="phase">ช่วงสอบ:</label></td>
					<td><select name="phase" id="phase">
							<option value="<?php echo ($row['phase']);
                            ?>
                            ">
                            <?php 
                            if ($row['phase'] == 1){
                                echo "Midterm";
                            }
                            else{
                                echo "Final";
                            }
                            ?>
                            </option>
							<option value="1">Midterm</option>
							<option value="2">Final</option>
						</select></td>
				</tr>
				<tr>
					<td><label for="date">วันที่:</label></td>
					<td><input type="date" id="date" name="date" value = "<?php echo($row['date'])?>"></td>
				</tr>
                <tr>
					<td><?php
						$sql = "SELECT id, name FROM subject";
						$result = $conn->query($sql);
						?>
						วิชา:
					<td>
						<select name='subject' disabled>
							<option value='<?php echo ($row['subject'])?>' disabled> เลือก </option>
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
						<select name='room' >
							<option value='<?php echo ($row['room']); ?>' disabled> เลือก </option>
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
						<select name='time'>
							<option value='<?php echo ($row['time']); ?>' disabled> เลือก </option>
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
						<select name='examiner_t'>
							<option value='<?php echo ($row['examiner_t']); ?>' disabled> เลือก </option>
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
						<select name='examiner_s'>
							<option value='<?php echo ($row['examiner_s']); ?>' disabled>เลือก</option>
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


<?php
}
?>
