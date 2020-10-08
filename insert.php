<head>
<meta charset="UTF-8">
</head>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "company";

  //Receive data from the previous form
   $year = $_POST['year'];
   $semester = $_POST['semester'];
   $subject = $_POST['subject']
   $date = $_POST['date'];
   $room = $_POST['room'];
   $timeStart = $_POST['timeStart'];
   $timeFinish = $_POST['timeFinish'];
   $examiner = $_POST['examiner'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn -> connect_error);
    } 
    
    mysqli_set_charset($conn, "utf8");

    //Connected successfully

    $sql = "INSERT INTO employee (year, semester, subject, date, room, timeStart, timeFinish, examiner) VALUES  
                 ('$year', '$semester', '$subject', '$date', '$room', '$timeStart', '$timeFinish', '$examiner')";

    $conn -> query($sql);
    $conn -> close();

    echo "เพิ่มข้อมูลเรียบร้อยแล้ว <br><br>"; 
	echo "<a href='insert.html'>เพิ่มข้อมูลถัดไป</a>"
?>






		



