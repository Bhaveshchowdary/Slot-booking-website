<!DOCTYPE html>
<html>
    <head>
        <title>View Slots</title>
        <link rel="stylesheet" href="viewslots.css">
    </head>
    <body>
        <div class="bookslottxt">
            <div class="backtohome">
                <a class="backtohomebutton" href="viewslotsmainpage.html">
                    Select Floor
                </a>
            </div>
            <div class="txt">
                VIEW SLOTS
            </div>
            <div class="backtobookslot">
                <a class="backtobookslotbutton" href="bookslotmainpage.html">
                    Book Slot
                </a>
            </div>
        </div>

    <div class="mainbody">
    <h1><span class="slotheading">Booked Slots</span>:-</h1>
        <div class="table">
        <?php 
            $servername = "localhost";
            $conn = new mysqli($servername, "root", "", "webproject");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT Slottime,Name,contactno,roomno FROM slotsdata3 WHERE Slotstatus = 1;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th>SLOTTIME</th><th>NAME</th><th>PHONE NUMBER</th><th>ROOM NO</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "<tr><td>".$row["Slottime"]."</td><td>".$row["Name"]."</td><td>".$row["contactno"]."</td><td>".$row["roomno"]."</td></tr>";
                }
                echo "</table>";
              } else {
                echo "0 results";
              }
              $conn->close();
        ?>
        </div>

        <h1><span class="slotheading">Empty Slots</span>:-</h1>
        <div class="table">
        <?php 
            $servername = "localhost";
            $conn = new mysqli($servername, "root", "", "webproject");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT Slottime,Name,contactno,roomno FROM slotsdata3 WHERE Slotstatus = 0;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th>SLOTTIME</th><th>NAME</th><th>PHONE NUMBER</th><th>ROOM NO</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "<tr><td>".$row["Slottime"]."</td><td>".$row["Name"]."</td><td>".$row["contactno"]."</td><td>".$row["roomno"]."</td></tr>";
                }
                echo "</table>";
              } else {
                echo "0 results";
              }
              $conn->close();
        ?>
        </div>
    </div>
    </body>
</html>