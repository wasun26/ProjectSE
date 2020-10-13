<!doctype html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
<?php
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
?>

<?php
    $sql = "SELECT * FROM exam WHERE phase = '1' AND semester = '1' AND year = '2020'"; //final, semester, year ต้องรับค่าเข้ามา
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {  //begin if
        while ($row = $result->fetch_assoc())   {  //begin while
            $phase = $row['phase'];
            if ($phase == "1"){
                $phase = "Midterm";
            }else{
                $phase = "Final";
            } 
            $semester = $row['semester'];
            $year = $row['year'];
                    
            echo "<h1>ตารางสอบ " .$phase." ภาคเรียนที่ " .$semester. " ปีการศึกษา " .$year. "</h1>";
            break;
        }
    }
?>
<table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr align="center">
            <th> รหัสวิชา </th>  
            <th> วันที่ </th>
            <th> เวลา </th> 
            <th> ห้องสอบ </th>
            <th> ผู้คุมสอบ(อาจารย์) </th>
            <th> ผู้คุมสอบ(บุคลากร) </th>
         </tr>
     </thead>
     <tbody class="table hover">
        <?php
            $sql = "SELECT * FROM exam WHERE phase = '1' AND semester = '1' AND year = '2020'"; //final, semester, year ต้องรับค่าเข้ามา
            $result =$conn->query($sql);

            if ($result->num_rows > 0) {  //begin if
                while ($row = $result->fetch_assoc())   {  //begin while
                        $course = $row['subject'];
                        $day = $row['date']; 
                        $time = $row['time']; 
                        $room = $row['room'];
                        $examiner_t = $row['examiner_t'];
                        $examiner_s = $row['examiner_s'];
                    
                        echo "<tr align='center'>";

                        echo "<td>" .$course. "</td>";

                        echo "<td>" .$day. "</td>";

                        $sql_time = "SELECT * FROM timeexam WHERE id = $time";
                        $result_time =$conn->query($sql_time);
                        if ($result_time->num_rows > 0) {  //begin if
                            while ($row = $result_time->fetch_assoc())   {  //begin while
                                $timeStart = $row['timeStart'];
                                $timeFinish = $row['timeFinish'];
                                echo "<td>" .$timeStart." - ".$timeFinish. "</td>";
                            }
                        }

                        echo "<td>" .$room. "</td>";

                        $sql_t = "SELECT * FROM teacher WHERE id = $examiner_t";
                        $result_t =$conn->query($sql_t);
                        if ($result_t->num_rows > 0) {  //begin if
                            while ($row = $result_t->fetch_assoc())   {  //begin while
                                $fname = $row['fname'];
                                $lname = $row['lname'];
                                echo "<td>" .$fname." ".$lname. "</td>";
                            }
                        }

                        $sql_s = "SELECT * FROM staff WHERE id = $examiner_s";
                        $result_s =$conn->query($sql_s);
                        if ($result_s->num_rows > 0) {  //begin if
                            while ($row = $result_s->fetch_assoc())   {  //begin while
                                $fname = $row['fname'];
                                $lname = $row['lname'];
                                echo "<td>" .$fname." ".$lname. "</td>";
                            }
                        }
                        echo "</tr>";
                }  //end while
                echo "</table>";
            }else{
                echo "0 results";
            }
        $conn->close();
        ?>
    </tbody>
</table>
</body>
</html>