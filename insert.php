<head>
  <meta charset="UTF-8">
</head>
<?php
if (!isset($_SESSION['login_true'])) {
  header("Location: login.php");
  exit;
}

if (!isset($_POST[''])) {
  # code...
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
$owner_id = $idUser;

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
$sql_check = "SELECT `phase`, `subject`, `year`, `semester`, `date`, `time`, `room`,`examiner_t`, `examiner_s` FROM `exam` WHERE (`phase` = '$phase' AND `year` = '$year' AND `semester` = '$semester') AND (`date` = '$date' OR `time` = '$time' OR `subject` = '$subject' OR `room` = '$room' OR `examiner_t` = '$examiner_t' OR `examiner_s` = '$examiner_s')";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {  //begin if
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
      echo "วิชานี้ได้ถูกลงทะเบียนแล้ว";
    } elseif ($room == $room_db and $time == $time_db and $date == $date_db) {
      echo "ห้องนี้ได้ถูกใช้แล้ว";
    } elseif ($examiner_t == $examiner_t_db and $time == $time_db and $date == $date_db) {
      echo "ผู้คุมสอบ(อาจารย์)มีหน้าที่ในเวลานี้แล้ว";
    } elseif ($examiner_s == $examiner_s_db and $time == $time_db and $date == $date_db) {
      echo "ผู้คุมสอบ(บุคลากร)มีหน้าที่ในเวลานี้แล้ว";
    }
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
?>
  <div class="card">
    <div class="card-header">
      เพิ่มข้อมูลเรียบร้อยแล้ว
    </div>
    <div class="card-body">
    <?php }
  $conn->close();
    ?>
    <a href='?page=staff' class="btn btn-primary">เพิ่มข้อมูล</a>&nbsp;&nbsp;&nbsp;<a href='?page=main' class="btn btn-primary">กลับไปหน้าหลัก</a>
    </div>
  </div>