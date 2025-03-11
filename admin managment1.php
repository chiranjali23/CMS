<?php
    include 'config.php';
    

    if (isset($_POST['create_track'])){
        $track_id = $['track_id'];
        $track_title = $['track_title'];
        $desription = $['discription'];

        $sql = "INSERT INTO track (track_id,track_title,discription) VALUES ($track_id,$track_title,$discription)";

        if (mysqli_query($conn,$sql)==TRUE){
             echo"<script> alert ('Details Added')";
            window.location.href ="admin managment1.php";
        }else{
            echo "ERROR : " $sql."<br>".mysqli_error($conn);
    
    }

    mysqli_close($conn);
    }

?>

<html>
<head>
    <title>admin management</title>
    <link rel="stylesheet" href="admin mange style.css">
</head>
<body>
<!--header create -->
    <header>


        <nav class="navbar">
            <ul>
                <li><a href="Home page CA.html">Home</a></li>
                <li><a href="AboutUs.html">About</a></li>
                <li><a href="conforence information.html">Conference Information</a></li>
                <li><a href="#">Participant Dashboard</a></li>
                <li><a href="#">Admin Dashboard</a></li>
                <li><a href ="log in.html">Sign in</a></li>
            </ul>
        </nav>
        
        <div class="logo">
            <img src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxwURlz-WQ4P2pcJ6114846CsS_J1iFHhoPhvJeoGjJUnZ4R2izgoH4P9TeFlCdIdAohY&usqp=CAU" >
         </div>
        
        </header>
        <br>
    
        <!--body create-->
    <section>
        <div class="dashboard-section">
            <h2>Participant List</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Organization</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!--track session create-->
        <div class="dashboard-section">
            <h2>Create Track</h2>
            <form method="POST" action="admin managment1.php">

                <label for="track_id">Track ID:</label>
                <input type="text" name="track_id" id="track_title" required>

                <label for="track_title">Track Title:</label>
                <input type="text" name="track_title" id="track_title" required>

                <label for="track_description">Description:</label>
                <textarea name="track_description" id="track_description" required></textarea>

                <button type="submit" name="create_track">Create Track</button>
            </form>
        </div>

        <div class="dashboard-section">
            <h2>Create Session</h2>
            <form method="POST" action="admin management1.php">

                <label for="track_id">Select Track:</label>
                <select name="track_id" id="track_id" required>

                    

                </select>
                <label for="session_title">Session Title:</label>
                <input type="text" name="session_title"  required>

                <label for="session_speaker">Speaker:</label>
                <input type="text" name="session_speaker"  required>

                <label for="session_time">Time:</label>
                <input type="datetime-local" name="session_time" required>

                <label for="session_venue">Venue:</label>
                <input type="text" name="session_venue"  required>

                <label for="session_capacity">Capacity:</label>
                <input type="number" name="session_capacity"  required>

                <button type="submit" name="create_session">Create Session</button>
            </form>
        </div>

        <div class="dashboard-section">
            <h2>Upload Proceedings</h2>
            <form method="POST" action="admin management1.php" enctype="multipart/form-data">

                <label for="proceedings_file">Upload File:</label>
                <input type="file" name="proceedings_file" id="proceedings_file" required>

                <button type="submit">Upload</button>
            </form>
        </div>
    </section>



    <!--Footer Session-->
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 International Research Conference</p>
            <p>Contact us at <a href="mailto:info@conference.com">info@conference.com</a></p>
            <p>Follow us on: <a href="#">Twitter</a> | <a href="#">LinkedIn</a></p>
        </div>
    </footer>
    

</body>
</html>
