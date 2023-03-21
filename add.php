<html>

<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trysite";
 
// Create connection
$conn = new mysqli($servername,
    $username, $password, $dbname);
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}
 
$sqlquery = "INSERT INTO testing VALUES
    ('John', 'Doe', 'john@example.com')";
 
if ($conn->query($sqlquery) === TRUE) {
    echo "record inserted successfully";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
<script>
function myFunction() {
  alert("Inserted Successfulyy!!");
}

myFunction();
</script>

</html>
