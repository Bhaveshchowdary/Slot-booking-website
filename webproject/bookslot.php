<!DOCTYPE html>
<html>

<head>
    <title>Book Slot</title>
    <link rel="stylesheet" href="bookslot.css">
</head>

<body>
    <div class="bookslottxt">
        <div class="backtohome">
            <a class="backtohomebutton" href="bookslotmainpage.html">
                Select Floor
            </a>
        </div>
        <div class="txt">
            BOOK SLOT
        </div>
        <div class="backtoviewslots">
            <a class="backtoviewslotsbutton" href="viewslotsmainpage.html">
                View Slots
            </a>
        </div>
    </div>

    <div class="formdata">
        <div class="leftspace"></div>
        <div class="formspace">
            <form action="bookslot.php" method="post">
                <p>SLOT:</p> <select name="Slottime" class="slottime" id="slots">
                    <option value="SELECT SLOT">SELECT SLOT</option>
                    <option value="6:00am-8:00am">6:00am-8:00am</option>
                    <option value="8:00am-10:00am">8:00am-10:00am</option>
                    <option value="10:00am-12:00pm">10:00am-12:00pm</option>
                    <option value="12:00pm-2:00pm">12:00pm-2:00pm</option>
                    <option value="2:00pm-4:00pm">2:00pm-4:00pm</option>
                    <option value="4:00pm-6:00pm">4:00pm-6:00pm</option>
                    <option value="6:00pm-8:00pm">6:00pm-8:00pm</option>
                    <option value="8:00pm-10:00pm">8:00pm-10:00pm</option>
                    <option value="10:00pm-12:00am">10:00pm-12:00am</option>
                </select>
                <p>NAME:</p> <input type="text" name="name" class="name">
                <p>PHONE NUMBER:</p> <input type="text" name="phoneno" class="phoneno">
                <p>ROOM NUMBER:</p> <input type="text" name="roomno" class="roomno"><br><br><br>
                <input type="submit" class="submit">
            </form>
        </div>
        <div class="rightspace"></div>
    </div>

    <?php
    /*ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);*/
    $servername = "localhost";
    $conn = new mysqli($servername, "root", "", "webproject");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $slottime = $_POST["Slottime"];
        $name = $_POST["name"];
        $phoneno = $_POST["phoneno"];
        $roomno = $_POST["roomno"];
    }

    $sql = " UPDATE slotsdata
                SET Name = '$name', contactno = '$phoneno', roomno = '$roomno', Slotstatus = 1
                WHERE Slottime = '$slottime';
                ";
    $result = $conn->query($sql);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($result === true){
            echo '<script> alert("SLOT BOOKED SUCCESSFULLY"); </script>';
        }
        $sql = null;
    }else{
        if($result !== true){
            echo '<script> alert("SOMETHING WENT WRONG TRY AGAIN"); </script>';
        }
        $sql=null;
    }
    for($i=1;$i<10;$i++){
        $query="select Slotstatus from slotsdata where Serialno='$i';";
        $result=$conn->query($query);
        $row=$result->fetch_assoc();
        //echo $row['Slotstatus'];
        if($row['Slotstatus']==1){
            echo '<script>var option = document.getElementById("slots").options['.$i.'];
            option.disabled = true;</script>';
        }
    }
    $conn->close();
    ?>
    
</body>

</html>