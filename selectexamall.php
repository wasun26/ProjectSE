<!DOCTYPE html>
<?php
if (!isset($_SESSION['login_true'])) {
    echo("<meta http-equiv=refresh content=0;URL=login.php>");
    exit;
}

include("config.php");

$conn = new mysqli(
    $config['hostname'],
    $config['dbuser'],
    $config['dbpassword'],
    $config['dbname']
);

$sql = "SELECT DISTINCT year FROM exam";
$result = $conn->query($sql);
$num_row = $result->num_rows;
?><br>
<div class="form-inline d-flex justify-content-center">
    <div class="card">
        <div class="card-header text-light" style="background-color: #152F4F;">ค้นหารายเทอม</div>
        <div class="card-body">
            <form action="?page=show_all" method="POST">
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
                    if ($num_row > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $year = $row['year'];
                            echo ("<option value = '$year'> $year </option>");
                        }
                    } else {
                        echo ("<option> ไม่มีข้อมูล </option>");
                    }
                    ?>
                </select>
                <input type="hidden" name="searchType" value="byterm">
                <input type="hidden" name="searchData" value="0">
                <?php
                if ($num_row == 0) {
                    echo("<button type='submit' value='ค้นหา' class='btn btn-primary' disabled>ค้นหา</button>");
                } else {
                    echo("<button type='submit' value='ค้นหา' class='btn btn-primary'>ค้นหา</button>");
                }
                ?>
            </form>
        </div>
    </div>
</div>
<?php
$conn->close();
?>