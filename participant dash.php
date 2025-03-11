<?php
include 'config.php';

// Fetch tracks
$tracks_query = "SELECT * FROM tracks";
$tracks_result = mysqli_query($conn, $tracks);

$session_query ="SELECT session.session_id,
                session.title,
                session.speaker,
                session.datetime,
                session.venue,
                track.title as track_title
                FORM session
                JOIN track on session.track_id = track.track_id
                ORDER BY session.datetime ASC"

?>