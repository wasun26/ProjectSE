<!DOCTYPE html>
<?php
if (!isset($_SESSION['login_true'])) {
    header("Location: login.php");
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
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $year = $row['year'];
                            echo ("<option value = '$year'> $year </option>");
                        }
                    }
                    ?>
                </select>
                <input type="hidden" name="searchType" value="byterm">
                <input type="hidden" name="searchData" value="0">
                <button type="submit" value="ค้นหา" class="btn btn-primary">ค้นหา</button>
            </form>
        </div>
    </div>
</div>