<?php
    include ("templates/header.php");
?>
<style>
    .bg-light {
  background-color: #f0f0f0 !important;
}

    .bg-secondary {
  background-color: #ccc !important;
}

.table-striped tbody tr.table-row-bg-secondary {
  background-color: #ccc !important;
}

</style>
<?php
// Database connection details
$db_host = 'localhost'; // Change this to your database host
$db_username = 'admin'; // Change this to your database username
$db_password = 'mansojey56'; // Change this to your database password
$db_name = 'items'; // Change this to your database name

// Establish MySQL database connection
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Escape user inputs for security
    $name = $mysqli->real_escape_string($_POST['name']);
    $price = $mysqli->real_escape_string($_POST['price']);

    $sql = "INSERT INTO item (name, price) VALUES ('$name', '$price')"; 

    if ($mysqli->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: ". $sql. "<br>". $mysqli->error;
    }
}   


// Select all rows from the items table
$sql = "SELECT * FROM item";
$result = $mysqli->query($sql);

// Display the results in an HTML table
if ($result->num_rows > 0) {
    echo "<div class='container bg-info-subtle w-100 mt-5'>"; // Container for the table (assuming you want to center it)
    echo "<table class='table table-bordered'>"; // Bootstrap table class and basic table-bordered style
    echo "<thead class='table-dark'>"; // Dark table header for better contrast
    echo "<tr><th style='width: 25%;'>Name</th><th>Price</th></tr>"; // Set column widths and table headers
    echo "</thead>";
    echo "<tbody>";
    
     $row_count = 0;

    while ($row = $result->fetch_assoc()) {
        // $row_class = ($row_count % 2) == 0 ? 'bg-light' : 'bg-secondary';
       // echo "<tr style='background-color: " . ($row_count % 2 == 0 ? "#f0f0f0 !important" : "#ccc !important") . "'>";
        // echo "<tr class='$row_class'>";
        echo "<tr class='table-striped'>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>"; // Use htmlspecialchars to prevent XSS attacks
        echo "<td>" . htmlspecialchars($row["price"]) . "</td>";
        echo "</tr>";
        $row_count++;
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>"; // Close the container
} else {
    echo "0 results";
}
?>
<div class="table-striped w-100 h-25">
    <h1>Testing Bootstrap</h1>
</div>
<?php
    include ("templates/footer.php");
?>