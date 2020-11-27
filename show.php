<html>
<head>
<title>ITF Lab</title>
</head>
<body>
<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'kamolchanok-server.mysql.database.azure.com', 'Kamolchanok@kamolchanok-server', 'Kmitl080445', 'ITFLab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
$res = mysqli_query($conn, 'SELECT * FROM bmi');
?>
<table style="border-radius:10px;" width="600" border="1">
  <tr>
    <th width="100"> <div align="center">ชื่อ</div></th>
    <th width="350"> <div align="center">น้ำหนัก</div></th>
    <th width="150"> <div align="center">ความสูง</div></th>
    <th width="150"> <div align="center">bmi</div></th>
    <th width="150"> <div align="center">การจัดการ</div></th>
  </tr>
<?php
while($Result = mysqli_fetch_array($res))
{
?>
  <tr>
        <td><?php echo $Result['name'];?></td>
        <td><?php echo $Result['weight'];?></td>
        <td><?php echo $Result['height'];?></td>
        <td><?php echo $Result['bmi'];?></td>
            <form  action="" method="post">
                <button class="edit" type="submit" name="edit" value="<?php $Result['ID'];?>">update</button>
            </form>
        </td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($conn);
?>
    </center>
</body>
</html>
