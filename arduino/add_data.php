<?php
    // Connect to MySQL
    include("dbconnect.php");

    // Prepare the SQL statement
    $SQL = "INSERT INTO test.test.temperature (temperature ,humidity) VALUES ('".$_GET["temperature"]."', '".$_GET["humidity="]."')";

    // Execute SQL statement
    mysql_query($SQL);

    // Go to the review_data.php (optional)
    header("Location: review_data.php");
?>