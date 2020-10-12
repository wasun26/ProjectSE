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

<<<<<<< HEAD
// Create connection
=======
>>>>>>> 65f25652bdb7a036108e4a6ceeb9807582398a69
$conn = new mysqli(
  $config['hostname'],
  $config['dbuser'],
  $config['dbpassword'],
  $config['dbname']
);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

<<<<<<< HEAD
mysqli_set_charset($conn, "utf8");

//Connected successfully

$sql = "INSERT INTO `exam` (`id`, `phase`, `subject`, `semester`, `date`, `time`, `room`, `examiner_t`, `examiner_s`) VALUES  
                 (NULL, '$phase', '$subject', '$semester', '$date', '$time', '$room', '$examiner_t', '$examiner_s')";
=======
$sql = "INSERT INTO exam (id, phase, subject, year, semester, date, time, room, examiner_t, examiner_s) VALUES (NULL, '$phase', '$subject', '$year', '$semester', '$date', '$time', '$room', '$examiner_t', '$examiner_s')";
>>>>>>> 65f25652bdb7a036108e4a6ceeb9807582398a69

$conn->query($sql);
$conn->close();

if ($sql) {
  echo "เพิ่มข้อมูลเรียบร้อยแล้ว <br><br>";
}
?>