<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
<meta charset="UTF-8">
</head>
<body>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "se";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

   mysqli_set_charset($conn, "utf8");

   //Connected successfully
    $sql = "SELECT * FROM exam WHERE phase = 'final' AND semester = '1' AND year = '2020'"; //final, semester, year ต้องรับค่าเข้ามา
    $result =$conn->query($sql);
?>

<?php
    if ($result->num_rows > 0) {  //begin if
        while ($row=$result->fetch_assoc())   {  //begin while
            $phase=$row['phase'];
            if ($phase == "mid"){
                $phase = "Midterm";
            }else{
                $phase = "Final";
            } 
            $semester=$row['semester'];
            $year= $row['year'];
                    
            echo "<h1>ตาราง " .$phase." ภาคเรียนที่ " .$semester. " ปีการศึกษา " .$year. "</h1>";
        }
    }
?>

<?php
    $sql = "SELECT * FROM exam WHERE phase = 'final' AND semester = '1' AND year = '2020'"; //final, semester, year ต้องรับค่าเข้ามา
    $result =$conn->query($sql);

    if ($result->num_rows > 0) {  //begin if
        echo "<table>";
        echo "<tr>";
        echo "<th> รหัสวิชา </th>";  
        echo "<th> วันที่ </th>";
        echo "<th> เวลา </th>";  
        echo "<th> ห้องสอบ </th>";
        echo "</tr>";

		while ($row=$result->fetch_assoc())   {  //begin while
			    $course=$row['subject'];
			    $day=$row['date']; 
			    $time= $row['time']; 
			    $room=$row['room'];
			  
			    echo "<tr>";
			    echo "<td>" .$course. "</td>";
			    echo "<td>" .$day. "</td>";
			    echo "<td>" .$time. "</td>";
			    echo "<td>" .$room. "</td>";
			    echo "</tr>";
        }  //end while
        echo "</table>";
	}else{
        echo "0 results";
    }
$conn->close();
?>
</body>
</html>