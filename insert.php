<head>
  <meta charset="UTF-8">
</head>
<?php
include("config.php");
$phase = $_POST['phase'];
$year = $_POST['year'];
$semester = $_POST['semester'];
$subject = $_POST['subject'];
$date = $_POST['date'];
$room = $_POST['room'];
$time = $_POST['time'];
$examiner_t = $_POST['examiner_t'];
$examiner_s = $_POST['examiner_s'];

$conn = new mysqli(
  $config['hostname'],
  $config['dbuser'],
  $config['dbpassword'],
  $config['dbname']
);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO exam (phase, subject, year, semester, date, time, room, examiner_t, examiner_s) VALUES ('$phase', '$subject', '$year', '$semester', '$date', '$time', '$room', '$examiner_t', '$examiner_s')";

$conn->query($sql);
$conn->close();

if ($sql) {
  echo "เพิ่มข้อมูลเรียบร้อยแล้ว <br><br>";
}
?>