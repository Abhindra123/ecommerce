<?php

// Get the search query from the URL parameter
$searchQuery = $_GET['q'];

// Check if the search query is equal to the table name
if ($searchQuery !== 'watch') {
    echo "Invalid search query";
    exit;
}

// Connect to the database
$servername = "localhost";
$username = "dummy";
$password = "abi123abi";
$dbname = "products";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Construct the SQL query to search for the query in the products table
$sql = "SELECT * FROM watch";

// Execute the query
$result = $conn->query($sql);

// If the query returns any results, display them in a card view
if ($result->num_rows > 0) {
    echo "<div class='card-container'>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<img src='data:image/jpeg;base64," . base64_encode($row['pimg']) . "' alt='" . $row['pname'] . "' width='200px' height='200px'>";
        echo "<h2>" . $row['pname'] . "</h2>";
        echo "<p>" . $row['pprice'] . "</p>";
        echo "<p>" . $row['prating'] . "</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    // If no results were found, display a message to the user
    echo "No results found for '$searchQuery'";
}

// Close the database connection
$conn->close();

?>
