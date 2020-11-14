<html>
<head>
<title>ITF Lab</title>
    <style>
        body {
            background: url("https://images.hdqwalls.com/download/stars-over-queenstown-8k-q2-1600x900.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            margin: 5%;
            color:white;
        }
        .form {
            background-color: white;
            width: 23%;
            border-radius: 8px;
            border: 5px solid #fff;
            background-color: transparent;
        }
        .btn {
            color: #4CAF50;
            border: 2px solid #4CAF50;
            background-color: transparent;
            border-radius: 10px;
            width: 30%;
            height: auto;
        }
        .btn:hover{
            color: white;
            border: 2px solid #4CAF50;
            background-color: #4CAF50;
            border-radius: 10px;
        }
        .in{
            border: 2px solid #000;
            border-radius: 10px;
            background-color: #d6d6d6;
        }
        td {
            text-align: center;
        }
        .edit {
            color: #ffb700;
            border: 2px solid #ffb700;
            background-color: transparent;
            border-radius: 8px;
        }
        .edit:hover {
            background-color: #d19702;
            border: 2px solid #d19702;
            color: black;
        }
        .del{
            color: #fc6060;
            border: 2px solid #fc6060;
            background-color: transparent;
            border-radius: 8px;
        }
        .del:hover{
            background-color:#d93b3b;
            border: 2px solid #d93b3b;
            color: black;
        }
    </style>
</head>
<body>
    <center>
<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'kamolchanok-server.mysql.database.azure.com', 'Kamolchanok@kamolchanok-server', 'Kmitl080445', 'ITFLab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
$res = mysqli_query($conn, 'SELECT * FROM guestbook');
?>
<table style="border-radius:10px;" width="600" border="1">
  <tr>
    <th width="100"> <div align="center">Name</div></th>
    <th width="350"> <div align="center">Comment </div></th>
    <th width="150"> <div align="center">Link </div></th>
    <th width="150"> <div align="center">Action</div></th>
  </tr>
<?php
while($Result = mysqli_fetch_array($res))
{
?>
  <tr>
        <td><?php echo $Result['Name'];?></td>
        <td><?php echo $Result['Comment'];?></td>
        <td><?php echo $Result['Link'];?></td>
        <td>
            <form  action="" method="post">
                <button class="edit" type="submit" name="edit" value="<?php $Result['ID'];?>">แก้ไข</button> <button class="del" type="submit" name="del" value="<?php $Result['ID'];?>">ลบออก</button>
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
