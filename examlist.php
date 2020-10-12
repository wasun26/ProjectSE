<!doctype html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  include("config.php");
  $conn = new mysqli($config['hostname'], $config['dbuser'], $config['dbpassword'], $config['dbname']);
  $sql = "SELECT DAY(E.date), T.timeStart, T.timeFinish, P.start, P.end
  FROM timeexam T, student S, exam E, enroll EN, phase P
  WHERE EN.sid=610510999 AND E.subject=EN.subjectid AND E.time=T.id AND E.phase=E.phase";
  $result = $conn->query($sql); 
  if ($result->num_rows > 0) {
    echo "Name";
    while ($row = $result->fetch_assoc()) {
      echo ($row['timeStart']);
      echo ($row['timeStop']);
    }
  }
  ?>
  <table class="table table-striped table-hover">
    <thead class="thead-dark">
      <tr align="center">
        <th>วัน</th>
        <th>8.00 - 11.00</th>
        <th>12.00 - 15.00</th>
        <th>15.30 - 18.00</th>
      </tr>
    </thead>
    <tbody class="table hover">
      <?php
      #for ($i = 0; $i < 7; $i++) {
        #echo ("
        #<tr>
        #<td>&nbsp;</td>
        #<td>&nbsp;</td>
        #<td>&nbsp;</td>
        #<td>&nbsp;</td>
      #</tr>
        #");
      #}
      ?>
    </tbody>
  </table>
</body>

</html>