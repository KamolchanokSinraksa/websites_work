<!DOCTYPE html>
<html>
<head>
	<title>Comment Form</title>
    <style>
        body {
            background: url("https://images.hdqwalls.com/download/stars-over-queenstown-8k-q2-1600x900.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            margin: 5%;
            color:white;
        }
        form {
            background-color: white;
            width: 23%;
            border-radius: 25px;
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
    </style>
</head>
<body>
    <center>
        <form action="" method="post" id="CommentForm" >
            <div style="opacity:0%;">.</div>
            Name:<br>
                <input class="in" type="text" name = "name" id="idname" placeholder="Enter name"><br>
            Comment:<br>
            <textarea class="in"rows="10" cols="20" name = "height" id="idheight" placeholder="Enter height"></textarea><br>
            Link:<br>
            <input class="in" type="text" name = "weight" id="idweight" placeholder="Enter weight"><br><br>
            <input class="btn" type="submit" id="commentBtn">
            <div style="opacity:0%;">.</div>
        </form>
    </center>
    </body>
</html>

<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'kamolchanok-server.mysql.database.azure.com', 'Kamolchanok@kamolchanok-server', 'Kmitl080445', 'ITFLab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$name = $_POST['name']; 
$height = $_POST['height'];
$weight = $_POST['weight'];
if(isset($name)){
    $sql = "INSERT INTO testbook (name, height, weight) VALUES ('$name', '$height', '$weight')";
}

mysqli_close($conn);
?>

