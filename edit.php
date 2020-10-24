<head>
  <meta charset="UTF-8">
</head>
<?php
if (!isset($_SESSION['login_true'])) {
  header("Location: login.php");
  exit;
}

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


// $sql = "UPDATE exam SET 
// WHERE  exam.id  = '$id'";
?>
<?php
$sql = "SELECT phase, semester, date, room, time, examiner_t, examiner_s from exam where id != $id";
$result = $conn->query($sql);
$update = TRUE;
if ($result->num_rows > 0) {  //begin if
  while ($row = $result->fetch_assoc()) {
    $phase_db = $row['phase'];
    $semester_db = $row['semester'];
    $date_db = $row['date'];
    $room_db = $row['room'];
    $time_db = $row['time'];
    $examiner_t_db = $row['examiner_t'];
    $examiner_s_db = $row['examiner_s'];
    if ($room == $room_db and $time == $time_db and $date == $date_db) {
      echo "ห้องนี้ได้ถูกใช้แล้ว";
      $update = FALSE;
    } elseif ($examiner_t == $examiner_t_db and $time == $time_db and $date == $date_db) {
      echo "ผู้คุมสอบ(อาจารย์)มีหน้าที่ในเวลานี้แล้ว";
      $update = FALSE;
    } elseif ($examiner_s == $examiner_s_db and $time == $time_db and $date == $date_db) {
      echo "ผู้คุมสอบ(บุคลากร)มีหน้าที่ในเวลานี้แล้ว";
      $update = FALSE;
    }
    break;
  }
}
if ($update == TRUE) {
  if ($examiner_s != 'NULL') {
    $sql = "UPDATE exam SET exam.phase = '$phase',
    exam.semester = '$semester',
    exam.date = '$date',
    exam.room = '$room',
    exam.time = '$time',
    exam.examiner_t = '$examiner_t',
    exam.examiner_s = '$examiner_s'
    WHERE  exam.id  = '$id'";
  } else {
    $sql = "UPDATE exam SET exam.phase = '$phase',
    exam.semester = '$semester',
    exam.date = '$date',
    exam.room = '$room',
    exam.time = '$time',
    exam.examiner_t = '$examiner_t',
    exam.examiner_s = NULL
    WHERE  exam.id  = '$id'";
  }
}
$conn->query($sql);
$conn->close();

if ($sql and $update == TRUE) {
  echo "<div class='swal2-icon swal2-success swal2-animate-success-icon' style='display: flex;'>
  <div class='swal2-success-circular-line-left' style='background-color: rgb(255, 255, 255);'></div>
  <span class='swal2-success-line-tip'></span>
  <span class='swal2-success-line-long'></span>
  <div class='swal2-success-ring'></div>
  <div class='swal2-success-fix' style='background-color: rgb(255, 255, 255);'></div>
  <div class='swal2-success-circular-line-right' style='background-color: rgb(255, 255, 255);'></div>
</div>
    แก้ไขเสร็จแล้ว <br><br>";
}
?>