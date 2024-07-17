<?php
    // Database credentials
    $servername = "localhost"; // or your database host
    $username = "root";
    $password = "";
    $database = "info";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully"; // You can remove this line after testing

    // Assuming you have received the form data via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $program_of_interest = $_POST['program_of_interest'];
        $message = $_POST['message'];

        // SQL query to insert data into your database table
        $sql = "INSERT INTO php (fullname, email, phone, country, program_of_interest, message) VALUES ('$fullname', '$email', '$phone', '$country', '$program_of_interest', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close connection
    $conn->close();
?>
