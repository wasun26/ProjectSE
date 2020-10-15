<!DOCTYPE html>
<?php
$conn = new mysqli($config['hostname'], $config['dbuser'], $config['dbpassword'], $config['dbname']);
$sql = "SELECT DISTINCT S.year
  FROM exam E, semester S
  WHERE E.semester=S.id";
$result = $conn->query($sql);
?>
<div class="form-group">
    <form action="?page=show_all">
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
            <option value="">1</option>
            <option value="">2</option>
        </select>
        <button type="submit" value="ค้นหา" class="btn btn-dark">ค้นหา</button>
    </form>
</div>