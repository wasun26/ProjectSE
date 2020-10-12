<head>
  <meta charset="UTF-8">
</head>
<?php
include("config.php");
$phase = $_POST['phase'];
$year = $_POST['year']-543;
$semester = $_POST['semester'];
$subject = $_POST['subject'];
$date = $_POST['date'];
$room = $_POST['room'];
$time = $_POST['time'];
$examiner_t = $_POST['examiner_t'];
$examiner_s = $_POST['examiner_s'];


// Create connection
$conn = new mysqli(
  $config['hostname'],
  $config['dbuser'],
  $config['dbpassword'],
  $config['dbname']
);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

mysqli_set_charset($conn, "utf8");

//Connected successfully

$sql = "INSERT INTO exam (phase, subject, semester, year, date, time, room, examiner_t, examiner_s) VALUES  
                 ('$phase', '$subject', '$semester', '$year', '$date', '$time', '$room', '$examiner_t', '$examiner_s')";

$conn->query($sql);
$conn->close();

echo "เพิ่มข้อมูลเรียบร้อยแล้ว <br><br>";
echo "<a href='insert.html'>เพิ่มข้อมูลถัดไป</a>"
?>