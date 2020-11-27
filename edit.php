<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'ihost.it.kmitl.ac.th', 'it63070136_test1', 'testtest123', 'it63070136_test', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$sql = 'EDIT FROM testbook WHERE ID = '.$_GET['ID'].'';

if(mysqli_query($conn, $sql)) {
    echo "edit COMPLETED";
}
else {
    echo "FAILED TO EDIT";
}
    mysqli_close($conn);
?>
