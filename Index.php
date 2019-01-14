<!DOCTYPE html>
<html>
<style>
table,th,td {
  border: 1px solid black;
  border-collapse:  collapse;
}
th,td {
  padding: 5px;
}
</style>
<body>

<?php
// Create connection, 127.0.0.1 for windows and localhost for linux
$conn = new mysqli("127.0.0.1", "yourusername", "yourpassword", "animals", 3307);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM animals";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   echo "<table><tr><th>Id</th><th>Species</th><th>Amount</th><th>Price</th>
    <th>Owner</th></tr>";
   // output data of each row
   while($row = $result->fetch_assoc()) {
       echo "<tr><td>".$row["Id"]."</td><td>".$row["Species"]."</td>
        <td>".$row["Amount"]."</td><td>".$row["Price"]."</td>
        <td>".$row["Owner"]."</td></tr>";
   }
   echo "</table>";
} else {
   echo "0 results";
}
$conn->close();
?>

</body>
</html>
