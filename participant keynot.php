<?php
// Include database configuration
@include 'config.php';

// Set the response header to JSON for returning a JSON response
header('Content-Type: application/json');

// Query to fetch keynote speaker details
$query = "
    SELECT 
        speaker_id, 
        name, 
        topic, 
        time, 
        venue 
    FROM 
        speakers 
    ORDER BY 
        time ASC";

$result = mysqli_query($conn, $query); 

//create array
$keynotes = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $keynotes[] = $row; 
    }
}

// Return the keynote data as a JSON response
echo json_encode($keynotes);

// Close the database connection (optional but recommended)
mysqli_close($conn);
?>
