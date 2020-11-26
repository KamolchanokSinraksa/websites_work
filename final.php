<?php
$conn = mysqli_init();/*เป็นการเรียก SQL ทั้งหมด*/
mysqli_real_connect($conn, 'kamolchanok-server.mysql.database.azure.com', 'Kamolchanok@kamolchanok-server', 'Kmitl080445', 'ITFLab', 3306);
if (mysqli_connect_errno($conn))/*กรณี connect error*/
{
    echo "";/*ให้แสดงว่างเปล่า*/
    //die('Failed to connect to MySQL: '.mysqli_connect_error());
}
session_start();/* กรณีเริ่มการทำ session (ชั้นจะฝังคุกกี้ในเครื่องแก ฝังอยู่หลายวัน ฝังไว้ในเครื่อง)*/
?>
<html>
<head>
	<title>Comment Form</title>
    <style>
        body {
            background: url("https://images.hdqwalls.com/download/stars-over-queenstown-8k-q2-1600x900.jpg");/*ภาพพื้นหลังจากเว็บ*/
            background-repeat: no-repeat;/*repeat รูปภาพวนไปกรณีภาพเล็กๆ เว็บกาวๆบางเว็บ*/
            background-size: cover;/*ขนาดของพื้นหลัง*/
            background-attachment: fixed;/*เวลาเลื่อนหน้าจอ background ไม่ขยับ*/
            margin: 5%;/*ความหนาจากขอบ*/
            color:white;/*สีตัวอักษร*/
        }
        .form {/*ใช้ในไฟล์ฟอร์ม มันติดมาโว้ย*/
            background-color: white;/*สีพื้นหลัง*/
            width: 23%;/*ความกว้างพื้นหลัง*/
            border-radius: 25px;/*การทำให้กรอบโค้งเท่าไหร่ก้ตามจำนวนที่ระบุหน่วยเป็น pixel*/
            border: 5px solid #fff;/*ขอบหนาเท่าไหร่ก็ว่าไปหน่วยเป็น pixel + ลักษณะของขอบ + สี*/
            background-color: transparent;/*สีพื้นหลัง สามารถกำหนดให้โปร่งใสได้นะ*/
        }
        .btn {/*ปุ่มกด btn = button โว้ย*/
            color: #4CAF50;/*สี*/
            border: 2px solid #4CAF50;
            background-color: transparent;
            border-radius: 10px;
            width: 30%;
            height: auto;/*ความสูงของปุ่ม*/
        }
        .btn:hover{/*ถ้ามี":"แสดงว่ามีคำสั่งหรือฟังก์ชันอื่นต่อ, ฟังก์ชัน/คำสั่ง hover คือ การที่เมื่อเราเอาเมาส์ไปชี้ก็จะเปลี่ยนลักษณะเป็นดังคำสั่งข้างล่าง*/
            color: white;
            border: 2px solid #4CAF50;
            background-color: #4CAF50;
            border-radius: 10px;
        }
        .btn2 {
            color: #00c3ff;
            border: 2px solid #00c3ff;
            background-color: transparent;
            border-radius: 10px;
            width: auto;
            height: auto;
        }
        .btn2:hover{
            color: white;
            border: 2px solid #0ba6d6;
            background-color: #0ba6d6;
            border-radius: 10px;
        }
        .in{/*ชื่อ*/
            border: 2px solid #000;
            border-radius: 10px;
            background-color: #d6d6d6;
        }
        .del{/*ปุ่มลบ*/
            color: #fc6060;
            border: 2px solid #fc6060;
            background-color: transparent;
            border-radius: 8px;
        }
        .del:hover{
            background-color:#d93b3b;
            border: 2px solid #d93b3b;
            color: black;
            color:
        }
        .edit {/*ปุ่มแก้ไขไงละ*/
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
    </style>
</head>
<body>
    <center>
<?php
        if(isset($_SESSION["id"])){/*ถ้าในตัวที่อยู่ใน isset ถูกตั้งเอาไว้ก็จะเป็น True*/
            //edittttttt <---------------------------------------------
            $editt = "SELECT * FROM guestbook WHERE ID='".$_SESSION["id"]."'";
            $res = mysqli_query($conn, $editt);
            $Reedit = mysqli_fetch_array($res)
            ?>

            <form class="form" action="" method="post">
                <div style="opacity:0%;">.</div>
                Name:<br>
                    <input class="in" type="text" name = "ename" id="idName" placeholder="Enter Name" value="<?php echo $Reedit['Name'];?>"><br>
                Comment:<br>
                <textarea class="in"rows="10" cols="20" name = "ecomment" id="idComment" placeholder="Enter Comment"><?php echo $Reedit['Comment'];?></textarea><br><br>
                <button class="btn" type="submit" name="editBtn">Submit</button><br><br>
                <div style="opacity:0%;">.</div>
            </form><!-- เป็นการ edit ค่า โดยวิธีการก็คือมันจะไปหาตำแหน่งค่าที่เราต้องการแก้ เมื่อเสร็จแล้วมันก็จะทำการล็อกเฉพาะตำแหน่งตรงนั้นและแก้ตำแหน่งตรงนั้น จากนั้นส่งค่าคืน -->

        <?php
        }else{
        if(isset($_SESSION['dire'])){/* ใช้เวลา redirect หน้าเว็บ*/
    if($_SESSION['dire'] == "View"){

        //showwwwwwww <------------------------------------------------------


        ?>
        <table style="border-radius:10px;" width="60%" border="1">
          <tr>
            <th width="100"> <div align="center">Name</div></th>
            <th width="350"> <div align="center">Comment </div></th>
            <th width="150"> <div align="center">Action</div></th>
          </tr>
        <?php
        $res = mysqli_query($conn, 'SELECT * FROM guestbook');
        while($Result = mysqli_fetch_array($res))
        {
        ?>
          <tr>
                <td align="center"><?php echo $Result['Name'];?></td>
                <td align="center"><?php echo $Result['Comment'];?></td>
                <td align="center">
                    <form  action="" method="post">
                        <button class="edit" type="submit" name="edit" value="<?php echo $Result['ID'];?>">แก้ไข</button>
                        <button class="del" type="submit" name="del" value="<?php echo $Result['ID'];?>">ลบออก</button>
                    </form>
                </td>
          </tr>
        <?php
        }
        ?>
        </table>
        <form action="" method="post">
            <button class="btn" type="submit" name="redi" value="Create">Add comment</button>
        </form>



        <?php }else if($_SESSION['dire'] == "Create"){
            //Add <---------------------------------------------------------------------------------------------------------
        ?>
        <form class="form" action="" method="post">
            <div style="opacity:0%;">.</div>
            Name:<br>
                <input class="in" type="text" name = "name" id="idName" placeholder="Enter Name"><br>
            Comment:<br>
            <textarea class="in"rows="10" cols="20" name = "comment" id="idComment" placeholder="Enter Comment"></textarea><br><br>
            <button class="btn" type="submit" name="commentBtn">Submit</button><br><br>
            <button class="btn2" type="submit" name="redi" value="View">View comment</button>
            <div style="opacity:0%;">.</div>
        </form>
        <?php
    }
}else{
            //first view <-----------------------------------------------------------------------------------------------
    ?><form class="form" action="" method="post">
            <div style="opacity:0%;">.</div>
            Name:<br>
                <input class="in" type="text" name = "name" id="idName" placeholder="Enter Name"><br>
            Comment:<br>
            <textarea class="in"rows="10" cols="20" name = "comment" id="idComment" placeholder="Enter Comment"></textarea><br><br>
            <button class="btn" type="submit" name="commentBtn">Submit</button><br><br>
            <button class="btn2" type="submit" name="redi" value="View">View comment</button>
            <div style="opacity:0%;">.</div>
        </form>
        <?php }} ?>
    </center>
    </body>
</html>

<?php
if(isset($_POST['commentBtn'])){
    $sql = "INSERT INTO guestbook (Name , Comment) VALUES ('".$_POST['name']."', '".$_POST['comment']."')";
    $save = $conn->query($sql);
    header("Refresh:0");
}
if(isset($_POST['del'])){
    $del = "DELETE FROM guestbook WHERE ID='".$_POST['del']."'";
    $conn->query($del);
    header("Refresh:0");
}
if(isset($_POST['edit'])){
    $_SESSION["id"] = $_POST['edit'];
    header("Refresh:0");
}
if(isset($_POST['editBtn'])){
    $edit = "UPDATE guestbook SET Name='".$_POST['ename']."' , Comment='".$_POST['ecomment']."' WHERE id='".$_SESSION["id"]."'";
    $conn->query($edit);
    unset($_SESSION["id"]);
    header("Refresh:0");
}
if(isset($_POST['redi'])){/*ปุ่มเวลาเปลี่ยนหน้า */
    $_SESSION['dire'] = $_POST['redi'];
    header("Refresh:0");/*เวลา refresh หน้าจอ delay 0 วิ*/
}
mysqli_close($conn);
?>