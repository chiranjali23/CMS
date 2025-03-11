<?php
// Include database configuration
@include 'config.php';

// Set the response header to JSON for returning a JSON response
header('Content-Type: application/json');

// Query to fetch session details including track information
$query = "
    SELECT 
        session.session_id, 
        session.title, 
        session.speaker, 
        session.datetime, 
        session.venue, 
        track.title AS track_title 
    FROM 
        sessions s 
    JOIN 
        tracks t 
    ON 
        session.track_id = track.track_id 
    ORDER BY 
        session.time ASC";

$result = mysqli_query($conn, $query); // Execute the query

// Initialize an array to hold session data
$sessions = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sessions[] = $row; // Add each session row to the array
    }
}

// Return the session data as a JSON response
echo json_encode($sessions);

// Close the database connection (optional but recommended)
mysqli_close($conn);
?>