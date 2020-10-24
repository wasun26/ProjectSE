<head>
  <meta charset="UTF-8">
</head>
<?php
if (!isset($_SESSION['login_true'])) {
  header("Location: login.php");
  exit;
}

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
$owner_id = $idUser;

$conn = new mysqli(
  $config['hostname'],
  $config['dbuser'],
  $config['dbpassword'],
  $config['dbname']
);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if ($examiner_s == 'NULL') {
  $sql_check = "SELECT `phase`, `subject`, `year`, `semester`, `date`, `time`, `room`,`examiner_t`, `examiner_s` FROM `exam` WHERE (`phase` = '$phase' AND `year` = '$year' AND `semester` = '$semester')";
} else {
  $sql_check = "SELECT `phase`, `subject`, `year`, `semester`, `date`, `time`, `room`,`examiner_t`, `examiner_s` FROM `exam` WHERE (`phase` = '$phase' AND `year` = '$year' AND `semester` = '$semester')";
}
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $phase_db = $row['phase'];
    $yea_db = $row['year'];
    $semester_db = $row['semester'];
    $subject_db = $row['subject'];
    $date_db = $row['date'];
    $room_db = $row['room'];
    $time_db = $row['time'];
    $examiner_t_db = $row['examiner_t'];
    $examiner_s_db = $row['examiner_s'];

    if ($subject == $subject_db) {
      echo ("<div class='swal2-icon swal2-error swal2-animate-error-icon' style='display: flex;'>
      <span class='swal2-x-mark'>
      <span class='swal2-x-mark-line-left'></span>
      <span class='swal2-x-mark-line-right'></span>
      </span>
      </div>");
      echo "<b>วิชา $subject</b> ได้ถูกลงทะเบียนแล้ว";
    } else {
      mysqli_set_charset($conn, "utf8");
      if ($examiner_s == 'NULL') {
        $sql = "INSERT INTO `exam` (`id`, `phase`, `subject`, `year`, `semester`, `date`, `time`, `room`, `examiner_t`, `examiner_s`, `ownerID`) VALUES  
                                   (NULL, '$phase', '$subject', '$year', '$semester', '$date', '$time', '$room', '$examiner_t', NULL, '$owner_id')";
      } else {
        $sql = "INSERT INTO `exam` (`id`, `phase`, `subject`, `year`, `semester`, `date`, `time`, `room`, `examiner_t`, `examiner_s`, `ownerID`) VALUES  
                                   (NULL, '$phase', '$subject', '$year', '$semester', '$date', '$time', '$room', '$examiner_t', '$examiner_s', '$owner_id')";
      }
      $conn->query($sql);
    }
    if ($room == $room_db and $time == $time_db and $date == $date_db) {
      echo "<b>ห้อง $room</b> นี้ได้ถูกใช้แล้ว";
    }
    if ($examiner_t == $examiner_t_db and $time == $time_db and $date == $date_db) {
      echo "<b>ผู้คุมสอบ(อาจารย์) $examiner_t</b> มีหน้าที่ในเวลานี้แล้ว";
    }
    if ($examiner_s == $examiner_s_db and $time == $time_db and $date == $date_db) {
      echo "<b>ผู้คุมสอบ(บุคลากร) $examiner_s</b> มีหน้าที่ในเวลานี้แล้ว";
    }
    echo ("<br>");
    break;
  }
} else {
  mysqli_set_charset($conn, "utf8");
  if ($examiner_s == 'NULL') {
    $sql = "INSERT INTO `exam` (`id`, `phase`, `subject`, `year`, `semester`, `date`, `time`, `room`, `examiner_t`, `examiner_s`, `ownerID`) VALUES  
                               (NULL, '$phase', '$subject', '$year', '$semester', '$date', '$time', '$room', '$examiner_t', NULL, '$owner_id')";
  } else {
    $sql = "INSERT INTO `exam` (`id`, `phase`, `subject`, `year`, `semester`, `date`, `time`, `room`, `examiner_t`, `examiner_s`, `ownerID`) VALUES  
                               (NULL, '$phase', '$subject', '$year', '$semester', '$date', '$time', '$room', '$examiner_t', '$examiner_s', '$owner_id')";
  }
  $conn->query($sql);
}
$conn->close();
?>
<div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
  <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
  <span class="swal2-success-line-tip"></span>
  <span class="swal2-success-line-long"></span>
  <div class="swal2-success-ring"></div>
  <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
  <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
</div>
เพิ่มข้อมูลเรียบร้อยแล้ว<br>
<a href='?page=staff' class="btn btn-primary">เพิ่มข้อมูล</a>&nbsp;&nbsp;&nbsp;<a href='?page=main' class="btn btn-primary">กลับไปหน้าหลัก</a>