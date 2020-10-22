<!doctype html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if (!isset($_SESSION['login_true'])) {
        header("Location: login.php");
        exit;
    }

    $phase = $_POST['phase'];
    $semester = $_POST['semester'];
    $year = $_POST['year'];

    include("config.php");

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

    $sql = "SELECT * FROM exam LEFT JOIN timeexam ON time = timeexam.id WHERE phase = $phase AND semester = $semester AND year = $year GROUP BY date, timeStart"; //final, semester, year ต้องรับค่าเข้ามา
    if ($phase == "1") {
        $phase = "Midterm";
    } else {
        $phase = "Final";
    }
    ?>
    <div class="d-flex justify-content-center text-primary">
        <?php
        echo "<h2>ตารางสอบ " . $phase . " ภาคเรียนที่ " . $semester . " ปีการศึกษา " . $year . "</h2>";
        ?>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr align="center">
                <th> รหัสวิชา </th>
                <th> วันที่ </th>
                <th> เวลา </th>
                <th> ห้องสอบ </th>
                <th> ผู้คุมสอบ(อาจารย์) </th>
                <th> ผู้คุมสอบ(บุคลากร) </th>
                <?php
                if ($access == 3){
                ?>
                <th> ดำเนินการ </th>
                <?php
                } ?>
            </tr>
        </thead>
        <tbody class="table hover">
            <?php
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {  //begin if                
                while ($row = $result->fetch_assoc()) {  //begin while
                    $id = $row['id'];
                    $course = $row['subject'];
                    $day = $row['date'];
                    $time = $row['time'];
                    $room = $row['room'];
                    $examiner_t = $row['examiner_t'];
                    $examiner_s = $row['examiner_s'];
                    echo "<tr align='center'>";
                    echo "<td>" . $course . "</td>";
                    echo "<td>" . $day . "</td>";
                    $timeStart = $row['timeStart'];
                    $timeFinish = $row['timeFinish'];
                    echo "<td>" . $timeStart . " - " . $timeFinish . "</td>";
                    echo "<td>" . $room . "</td>";
                    if (!is_null($examiner_t)) {
                        $sql_t = "SELECT fname, lname FROM user WHERE id = '$examiner_t'";
                        $result_t = $conn->query($sql_t);
                        if ($result_t->num_rows > 0) {  //begin if
                            while ($row = $result_t->fetch_assoc()) {  //begin while
                                $fname = $row['fname'];
                                $lname = $row['lname'];
                                echo "<td>" . $fname . " " . $lname . "</td>";
                            }
                        }
                    } else {
                        echo "<td> - </td>";
                    }
                    if (!is_null($examiner_s)) {
                        $sql_s = "SELECT fname, lname FROM user WHERE id = '$examiner_s'";
                        $result_s = $conn->query($sql_s);
                        if ($result_s->num_rows > 0) {  //begin if
                            while ($row = $result_s->fetch_assoc()) {  //begin while
                                $fname = $row['fname'];
                                $lname = $row['lname'];
                                echo "<td>" . $fname . " " . $lname . "</td>";
                            }
                        }
                    } else {
                        echo "<td> - </td>";
                    }
                    
                    if ($access == 3){
                      echo"<td><form action='?page=update' method='POST'>
                      <button class = 'btn btn-link'>
                      <i class='fas fa-cog text-warning'></i>
                      </button>
                      <input type='hidden' name = 'id' value = '$id'>
                      </form>
                      </td>
                      </tr>";
                      }      
                }  //end while
                
                echo "</table>";
            } else {
                echo "ไม่มีข้อมูล";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>

</html>