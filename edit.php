<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'kamolchanok-server.mysql.database.azure.com', 'Kamolchanok@kamolchanok-server', 'Kmitl080445', 'ITFLab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$sql = 'EDIT FROM bmi WHERE ID = '.$_GET['id'].'';

if(mysqli_query($conn, $sql)) {
    echo "edit COMPLETED";
}
else {
    echo "FAILED TO EDIT";
}
    mysqli_close($conn);
?>
