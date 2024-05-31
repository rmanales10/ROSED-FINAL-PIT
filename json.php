<?php
function table($t){
    // Create a connection to the database
    $connect = mysqli_connect('localhost', 'root', 'root123', 'attendance');

    // Check the connection
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize the table name to prevent SQL injection
    $t = mysqli_real_escape_string($connect, $t);

    // Prepare the SQL query
    $credentials = 'SELECT * FROM ' . $t;

    try {
        // Execute the query
        $result = mysqli_query($connect, $credentials);

        // Check if the query was successful
        if (!$result) {
            throw new Exception('Query failed: ' . mysqli_error($connect));
        }

        // Fetch the result as an associative array
        $json_array = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $json_array[] = $row;
        }

        // Close the connection
        mysqli_close($connect);

        // Return the JSON encoded array
        return json_encode($json_array);
    } catch (Exception $e) {
        // Handle any exceptions
        echo 'Error: ' . $e->getMessage();
    }

    // Close the connection in case of an error
    if ($connect) {
        mysqli_close($connect);
    }

    return null;
}
print_r($json_result = json_decode(table('credentials'),true));
?>
