<head>
<meta charset="UTF-8">
</head>

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
    $sql = "SELECT * FROM exam";
    $result =$conn->query($sql);
?>

<?php
    echo "<h1>ตารางFinal ภาคเรียนที่ 1 ปีการศึกษา 2563</h1>";
?>

<table border="1" cellspacing="2" cellpadding="2">
<tr>
<th>รหัสวิชา</th>  
<th>วันที่</th>
<th>เวลา</th>  
<th>ห้องสอบ</th>
</tr>

<?php
	if ($result->num_rows > 0) {  //begin if
		 while ($row=$result->fetch_assoc())   {  //begin while
			   $course=$row['subject'];
			   $day=$row['date']; 
			   $time= $row['time']; 
			   $room=$row['room'];
			  
				echo "<tr>";
			   echo "<td>$row</td>";
			   echo "<td>$course</td>";
			   echo "<td>$day</td>";
			   echo "<td>$time</td>";
			   echo "<td>$room/td>";
			   echo "</tr>";
		}  //end while
	}  //end if
$conn->close();
?>
