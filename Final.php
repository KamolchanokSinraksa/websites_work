<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'ihost.it.kmitl.ac.th', 'it63070237_keng', 'keng1234', 'it63070237_testITF', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}


$A = $_POST['A'];
$B = $_POST['B'];
$C = $_POST['A'] + $_POST['B'];


$sql = "INSERT INTO test_example (A , B, C) VALUES ('$A', '$B', '$C')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
|   <a href="http://www.it.kmitl.ac.th/~it63070237/show.php" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Show Table</a>
</body>
</html>
