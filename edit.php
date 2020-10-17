<head>
  <meta charset="UTF-8">
</head>
<?php
include("config.php");
$id = $_POST['id'];
$phase = $_POST['phase'];
$semester = $_POST['semester'];
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

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

mysqli_set_charset($conn, "utf8");


$sql = "UPDATE exam SET exam.phase = '$phase',
                        exam.semester = '$semester',
                        exam.date = '$date',
                        exam.room = '$room',
                        exam.time = '$time',
                        exam.examiner_t = '$examiner_t',
                        exam.examiner_s = '$examiner_s'
 WHERE  exam.id  = '$id'" ;

$conn->query($sql);
$conn->close();

if ($sql) {
    
    echo "แก้ไขเสร็จแล้ว <br><br>";
}
?>