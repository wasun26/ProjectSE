<!doctype html>
<html>
<?php
include("config.php");
?>

<body>
  <?php
  if (isset($_POST['searchType']) && isset($_POST['searchData'])) {
    switch ($_POST['searchType']) {
      case 'studentID':
        $input = $_POST['searchData'];
        $sql = "SELECT E.subject, E.date, T.timeStart, T.timeFinish, E.room, P.name
        FROM timeexam T, exam E, enroll EN, phase P
        WHERE EN.sid=$input AND E.subject=EN.subjectid AND E.time=T.id AND E.phase=P.id";
        break;
      case 'courseID':
        $input = $_POST['searchData'];
        break;
      case 'multicourseID':
        $input = $_POST['searchData'];
        break;
      case 'examinerName':
        $input = $_POST['searchData'];
        break;
    }

    $conn = new mysqli($config['hostname'], $config['dbuser'], $config['dbpassword'], $config['dbname']);
    $result = $conn->query($sql);
  ?>
    <table class="table table-hover table-striped">
      <thead>
        <th>รหัสวิชา</th>
        <th>วันที่</th>
        <th>เวลาเริ่ม</th>
        <th>เวลาสิ้นสุด</th>
        <th>ห้อง</th>
        <th>ห้วงสอบ</th>
        <th>กรรมการคุมสอบ</th>
      </thead>
      <tbody class="table-hover">
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo ("<tr><td>" . $row['subject'] . "</td>");
          echo ("<td>" . $row['date'] . "</td>");
          echo ("<td>" . $row['timeStart'] . "</td>");
          echo ("<td>" . $row['timeFinish'] . "</td>");
          echo ("<td>" . $row['room'] . "</td>");
          echo ("<td>" . $row['name'] . "</td>");
          echo ("<td>");
          $examiner = "SELECT T.fname tfname, T.lname tlname, S.fname sfname, s.lname slname
          FROM user T, user S, exam E
          WHERE E.examiner_t=T.id AND E.examiner_S=S.id AND E.id=9";
          $result = $conn->query($examiner);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo($row['tfname']." ".$row('tlname'));
              echo($row['sfname']." ".$row('slname'));
          }
        }
        echo("</td></tr>");
      }
      $conn->close();
      echo ("</tbody></table>");
    } else {
      echo ("ไม่มีข้อมูล");
    }
      ?>

</body>

</html>