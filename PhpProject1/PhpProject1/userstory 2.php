<?php
$servername = "kunet.kingston.ac.uk";
$username = "//";
$password = "//";
$dbname = "db_k1116774";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 




$sql = "SELECT c00 FROM `tvshow` ORDER BY `idShow` ";

$result = $conn->query($sql);
echo "list of shows from kodi";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["c00"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();




?>