<html>
<head>
<meta charset = "UTF-8">
</head>
<body>
<h1>เจ้าหน้าที่</h1>
<form action = "insert.php" method = "post">
	ปีการศึกษา: <input type = "text" name = "year">&nbsp&nbsp
	ภาคการศึกษา: <input type = "text" name = "semester"><br>
	วิชา:<input type = "text" name = "subject"><br>
	วันที่: <input type = "text" name = "date"><br>
	ห้องสอบ: <input type = "text" name = "room"><br>
	เวลาเริ่มสอบ: <input type = "text" name = "timeStart">&nbsp&nbsp
	เวลาสิ้นสุดการสอบ: <input type ="text" name = "timeFinish"><br>
	ผู้คุมสอบ(อาจารย์): <input type = "text" name = "examiner_t"><br>
	ผู้คุมสอบ(เจ้าหน้าที่): <input type = "text" name = "examiner_s"><br><br>
 <input type = "submit" value = "Add">&nbsp&nbsp
 <input type = "reset" value = "Reset">
</form>
</body></html>
