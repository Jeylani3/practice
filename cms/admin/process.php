<?php
include_once '../connect.php'; // Ensure database connection file is included properly

// Check if the form was submitted
if (isset($_POST['create'])) {
    // Retrieve and sanitize form data
    // $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
    // $content = isset($_POST['content']) ? htmlspecialchars($_POST['content']) : '';
    // $date = isset($_POST['date']) ? htmlspecialchars($_POST['date']) : '';
  
    // var_dump($_POST); // Debugging: Check what values are received from the form
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    // $date = $conn->real_escape_string($_POST['date']);
    $date = date('Y/m/d'); 

    echo $title . "<br />";
    echo $content . "<br />";
    echo $date . "<br />";
    $sql = "INSERT INTO posts (title, content, date) VALUES ('$title', '$content', '$date')";
    if ($conn->query($sql) === TRUE) { 
        echo "Data inserted successfully";
    } else {
        echo "Error: ". $sql. "<br>". mysqli_error($conn);
    }
    
    $ssql = "SELECT * FROM `cms`.`posts`";
    $result = $conn->query($ssql);

    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>TITLE</th><th>CONTENT</th><th>DATE</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . htmlspecialchars($row["title"]) . "</td><td>" . htmlspecialchars($row["content"]) . "</td><td>" . htmlspecialchars($row["date"]) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
    $conn->close();
}
else {
        echo "Form not submitted";
}

    // Validate form data
   // Get the current date in the correct format

    // Output the sanitized form data
    // echo "Title: " . $title . "<br>";
    // echo "Content: " . $content . "<br>";
    // echo "Date: " . $date;
    // Output the sanitized form data

?>