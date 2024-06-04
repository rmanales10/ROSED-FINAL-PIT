<?php
// Include your database connection script
include './db.php';

// Function to capture a 10-digit number from the input
function captureTenDigitNumber($input) {
    // Use regex to find a 10-digit number in the string
    preg_match('/\d{10}/', $input, $matches);
    
    if (!empty($matches)) {
        return $matches[0];
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['data'])) {
        $data = $_POST['data'];

        $result = captureTenDigitNumber($data);

        if ($result) {
            // Establish database connection
            $db = new mysqli('localhost', 'root', '', 'attendance');

            // Check connection
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            // Prepare and execute query to select student information
            $stmt = $db->prepare('SELECT * FROM users WHERE id_number = ?');
            $stmt->bind_param('s', $result);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $student = $result->fetch_assoc();
                $full_name = $student['full_name'];
                $section = $student['section'];
                $id_number = $student['id_number'];

                // Prepare and execute query to insert data into the database
                $stmt = $db->prepare('INSERT INTO record (full_name, section, id_number) VALUES (?, ?, ?)');
                $stmt->bind_param('sss', $full_name, $section, $id_number);
                $success = $stmt->execute();

                if ($success) {
                    echo "Data inserted successfully!";
                } else {
                    echo "Failed to insert data.";
                }
            } else {
                echo "No student found with the provided ID number.";
            }

            // Close the prepared statement and connection
            $stmt->close();
            $db->close();
        } else {
            echo "No 10-digit number found in the input.";
        }
    } else {
        echo "Data parameter missing.";
    }
} else {
    echo "Invalid request method.";
}
?>
