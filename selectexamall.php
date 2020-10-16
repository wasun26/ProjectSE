<!DOCTYPE html>
<?php
$conn = new mysqli($config['hostname'], $config['dbuser'], $config['dbpassword'], $config['dbname']);
$sql = "SELECT DISTINCT S.year
  FROM exam E, semester S
  WHERE E.semester=S.id";
$result = $conn->query($sql);
?><br>
<div class="form-inline d-flex justify-content-center">
    <form action="?page=examlist" method="POST">
        <select name="phase" class="form-control">
            <option value="1">Midterm</option>
            <option value="2">Final</option>
        </select>
        <select name="semester" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">Summer</option>
        </select>
        <select name="year" class="form-control">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo ("<option value=");
                    echo ($row['year'] . ">");
                    echo ($row['year'] . "</option>");
                }
            }
            ?>
        </select>
        <input type="hidden" name="searchType" value="byterm">
        <input type="hidden" name="searchData" value="0">
        <button type="submit" value="ค้นหา" class="btn btn-primary">ค้นหา</button>
    </form>
</div>