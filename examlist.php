<!doctype html>
<html>
<?php
include("config.php");
?>

<body>
  <table class='table table-hover table-striped'>
    <thead>
      <th>รหัสวิชา</th>
      <th>วันที่</th>
      <th>เวลาเริ่ม</th>
      <th>เวลาสิ้นสุด</th>
      <th>ห้อง</th>
      <th>ห้วงสอบ</th>
      <th>กรรมการคุมสอบ</th>
    </thead>
    <tbody class='table-hover'>
      <?php
      if (isset($_POST['searchType']) && isset($_POST['searchData'])) {
        switch ($_POST['searchType']) {
          case 'studentID':
            $input = $_POST['searchData'];
            $sql = "SELECT E.id, E.subject, E.date, T.timeStart, T.timeFinish, E.room, P.name
        FROM timeexam T, exam E, enroll EN, phase P
        WHERE EN.sid=$input AND E.subject=EN.subjectid AND E.time=T.id AND E.phase=P.id";
            break;
          case 'subjectID':
            $input = $_POST['searchData'];
            $sql = "SELECT E.id, E.subject, E.date, T.timeStart, T.timeFinish, E.room, P.name
            FROM timeexam T, exam E, phase P
            WHERE E.phase=P.id AND E.time=T.id OR E.id LIKE '$input%'";
            break;
          case 'multisubjectID':
            $input = $_POST['searchData'];
            break;
          case 'examinerName':
            $input = $_POST['searchData'];
            break;
        }
        $conn = new mysqli($config['hostname'], $config['dbuser'], $config['dbpassword'], $config['dbname']);
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            echo ("<tr><td>" . $row['subject'] . "</td>");
            echo ("<td>" . $row['date'] . "</td>");
            echo ("<td>" . $row['timeStart'] . "</td>");
            echo ("<td>" . $row['timeFinish'] . "</td>");
            echo ("<td>" . $row['room'] . "</td>");
            echo ("<td>" . $row['name'] . "</td>");
            echo ("<td>");
            $examiner_t = "SELECT U.fname, U.lname
          FROM user U, exam E
          WHERE E.examiner_t=U.id AND E.id=$id";
            $result2 = $conn->query($examiner_t);
            if ($result2->num_rows > 0) {
              while ($row2 = $result2->fetch_assoc()) {
                echo ($row2['fname']);
                echo (" " . $row2['lname'] . "<br>");
              }
            }
            $examiner_s = "SELECT U.fname, U.lname
          FROM user U, exam E
          WHERE E.examiner_s=U.id AND E.id=$id";
            $result3 = $conn->query($examiner_s);
            if ($result3->num_rows > 0) {
              while ($row3 = $result3->fetch_assoc()) {
                echo ($row3['fname']);
                echo (" " . $row3['lname']);
              }
            }
            echo ("</td></tr>");
          }
          $conn->close();
        } else {
          echo ("<tr><td colspan='7'><h3 class='text-danger d-flex justify-content-center'>ไม่มีข้อมูล</h3></td></tr>");
        }
      }
      ?>
    </tbody>
  </table>
</body>

</html>