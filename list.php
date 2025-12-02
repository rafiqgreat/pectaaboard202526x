<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Database credentials
$servername = "localhost";
$username = "dbuser";
$password = "Rs2mp9aZ@rafiq";
$dbname = "pectrainingdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select all users from ci_admin table
$sql = "SELECT * FROM ci_admin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>";
    echo "<tr>
            <th>Admin ID</th>
            <th>Admin Role ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Mobile No</th>
            <th>Image</th>
            <th>Last Login</th>
            <th>Is Verify</th>
            <th>Is Login</th>
            <th>Is Active</th>           
          </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["admin_id"] . "</td>
                <td>" . $row["admin_role_id"] . "</td>
                <td>" . $row["username"] . "</td>
                <td>" . $row["firstname"] . "</td>
                <td>" . $row["lastname"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["address"] . "</td>
                <td>" . $row["mobile_no"] . "</td>
                <td>" . $row["image"] . "</td>
                <td>" . $row["last_login"] . "</td>
                <td>" . $row["is_verify"] . "</td>
                <td>" . $row["is_login"] . "</td>
                <td>" . $row["is_active"] . "</td>               
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
