<!doctype html>
<html>
<?php



if (!isset($_SESSION['login_true'])) {
  echo("<meta http-equiv=refresh content=0;URL=login.php>");
  exit;
}

include("config.php");
?>
<head>
  <style>
        .top {
            margin-top: 3.5%;
        }
    </style>
</head>
<body>
  <div class='card top'>
  <table class='table table-hover table-striped'>
    <thead>
      <th>รหัสวิชา</th>
      <th>วันที่</th>
      <th>เวลาเริ่ม</th>
      <th>เวลาสิ้นสุด</th>
      <th>ห้อง</th>
      <th>ห้วงสอบ</th>
      <th>กรรมการคุมสอบ</th>
      <?php
      if ($_POST['searchType'] == 'owner') {
      ?>
        <th>ดำเนินการ</th>
      <?php
      }
      ?>
    </thead>
    <tbody class='table-hover'>
      <?php
      if (isset($_POST['searchType']) && isset($_POST['searchData']) && is_numeric($_POST['searchData']) || is_array($_POST['searchData'])) {
        switch ($_POST['searchType']) {
          case 'studentID':
            $input = $_POST['searchData'];
            $sql = "SELECT E.id, E.subject, E.date, T.timeStart, T.timeFinish, E.room, P.name
            FROM timeexam T, exam E, enroll EN, phase P
            WHERE EN.sid=$input AND E.subject=EN.subjectid AND E.time=T.id AND E.phase=P.id
            ORDER BY E.date";
            break;
          case 'subjectID':
            $input = $_POST['searchData'];
            $sql = "SELECT E.id, E.subject, E.date, T.timeStart, T.timeFinish, E.room, P.name
            FROM timeexam T, exam E, phase P
            WHERE E.phase=P.id AND E.time=T.id AND E.subject LIKE '$input%'
            ORDER BY E.date";
            break;
          case 'multisubjectID':
            $input = $_POST['searchData'];
            $sum = $input[0];
            for ($i = 1; $i < 5; $i++) {
              if ($input[$i] == "") {
                break;
              }
              $sum .= ",$input[$i]";
            }
            $sql = "SELECT E.id, E.subject, E.date, T.timeStart, T.timeFinish, E.room, P.name
            FROM timeexam T, exam E, phase P
            WHERE E.phase=P.id AND E.time=T.id AND E.subject IN ($sum)";
            break;
          case 'examinerName':
            $input = $_POST['searchData'];
            $name = explode(" ", $input);
            $sql = "SELECT E.id, E.subject, E.date, T.timeStart, T.timeFinish, E.room, P.name
            FROM timeexam T, exam E, phase P, user U
            WHERE E.phase=P.id AND E.time=T.id AND (E.examiner_t=U.id OR E.examiner_s=U.id) AND (U.fanem LIKE ('%$name[0]%') OR U.lname LIKE ('%$name[1]%'))";
            break;
          case 'byterm':
            $phase = $_POST['phase'];
            $semester = $_POST['semester'];
            $year = $_POST['year'];
            $sql = "SELECT E.id, E.subject, E.date, T.timeStart, T.timeFinish, E.room, P.name,YEAR(E.date)
              FROM exam E, phase P, timeexam T
              WHERE E.phase=$phase AND E.semester=$semester AND YEAR(E.date)=$year-543 AND E.time=T.id
              GROUP BY E.subject";
            break;
          case 'owner':
            $input = $_POST['searchData'];
            // echo "$input";
            $sql = "SELECT E.id, E.subject, E.date, T.timeStart, T.timeFinish, E.room, P.name, E.ownerID
            FROM timeexam T, exam E, phase P
            WHERE E.ownerID='$input'
            GROUP BY E.subject
            ORDER BY E.date";
            break;
        }
        $conn = new mysqli($config['hostname'], $config['dbuser'], $config['dbpassword'], $config['dbname']);
        $result = $conn->query($sql);
        echo ("
        <div class='d-flex justify-content-between'>
        <div class='p-0'>พบ " . $result->num_rows . " รายการ</div>
        <div class='p-0'><a href='?page=main' class='btn btn-outline-primary'><i class='fas fa-search'></i></a></div>
        </div>
        ");
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
            echo ("</td>");
            if ($access > 1) {
              if ($access == 2 and $_POST['searchData']  == $idUser) {
                echo "<td><form action='?page=update' method='POST'>
            <button class = 'btn btn-link'>
            <i class='fas fa-cog text-warning'></i>
            </button>
            <input type='hidden' name = 'id' value = '$id'>
            </form>
            </td>
            </tr>";
              }
            }
          }
          $conn->close();
        } else {
          echo ("<tr><td colspan='7'><h3 class='text-danger d-flex justify-content-center'>ไม่มีข้อมูล</h3></td></tr>");
        }
      } else {
        echo ("<tr><td colspan='7'><h3 class='text-danger d-flex justify-content-center'>ไม่มีข้อมูล</h3></td></tr>");
      }
      ?>
    </tbody>
  </table>
  </div>
</body>

</html>