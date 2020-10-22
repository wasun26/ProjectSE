<!DOCTYPE html>
<?php
include("config.php");
session_start();
?>
<html>

<head>
    <title><?php print($config['title']); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include("nav.php"); ?>
    <div class="container">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = "";
        }
        switch ($page) {
            case "show_all":
                include("show_all.php");
                break;
            case "selectexamall":
                include("selectexamall.php");
                break;
            case "login":
                include("login.php");
                break;
            case "examlist":
                include("examlist.php");
                break;
            case "timelist":
                include("timelist.php");
                break;
            case "main":
                include("main.php");
                break;
            case "staff":
                include("staff.php");
                break;
            case "logout":
                include("logout.php");
                break;
            case "update":
                include("update.php");
                break;
            case "edit":
                include("edit.php");
                break;
            case "insert":
                include("insert.php");
                break;
            default:
                include("home.php");
                break;
        }
        ?>
    </div>
    <footer class="mt-auto">
        <?php
        include("footer.php");
        ?>
    </footer>
</body>

</html>