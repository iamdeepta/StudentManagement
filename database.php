<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students;";
//$result = mysqli_query($conn, $sql);
//$resultCheck = mysqli_num_rows($result);
$result = $conn->query($sql);

/*if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['name'];
    }
}else {
    echo "0 results";
}*/

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["fname"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

