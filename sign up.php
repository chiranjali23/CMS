<?php
include 'config.php';  // Ensure your database connection is included here

if (isset($_POST['submit'])) {
    $error = []; // Initialize error array

    // Collect form data
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['number'];
    $password = $_POST['password'];
    $conformpassword = $_POST['cpassword'];
    $role = $_POST['role'];
    $session = $_POST['session'];

    // Validate form data
    if (empty($fullname) || empty($email) || empty($telephone) || empty($password) || empty($conformpassword) || empty($role) || empty($session)) {
        $error[] = "All fields are required.";
    }
    if (!preg_match("/^[a-zA-Z\s]+$/", $fullname)) {
        $error[] = "Name can only contain letters and spaces.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Invalid email format.";
    }
    if (!preg_match("/^[0-9]{10}$/", $telephone)) {
        $error[] = "Phone number must be 10 digits.";
    }
    if ($password !== $conformpassword) {
        $error[] = "Passwords do not match.";
    }
    if (strlen($password) < 6) {
        $error[] = "Password must be at least 6 characters long.";
    }

    // Check if user already exists
    $select = "SELECT * FROM signup_details WHERE email = '$email'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $error[] = "User already exists with this email.";
    }

    // If no errors, hash the password and insert into the database
    if (empty($error)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $insert = "INSERT INTO signup_details (full_name, email, password, role, session_registed) 
                   VALUES ('$fullname', '$email', '$hashedPassword', '$role', '$session')";

        if (mysqli_query($conn, $insert)) {
            header('Location: log in.php'); // Redirect to login page
            exit();
        } else {
            $error[] = "Error creating account. Please try again.";
        }
    }
}
?>



<html>
    <head>
        <title>create new account</title>
        <link rel="stylesheet" href="sign upstyle.css">
        </head>
    <body>
        

 <!--HEADER SESSION-->

<header>


    <nav class="navbar">
        <ul>
            <li><a href="Home page CA.html">Home</a></li>
            <li><a href="AboutUs.html">About</a></li>
            <li><a href="conforence information.html">Conference Information</a></li>
            <li><a href="#">Participant Dashboard</a></li>
            <li><a href="#">Admin Dashboard</a></li>
            <li><a href ="log in.php">Sign in</a></li>
        </ul>
    </nav>
    
    <div class="logo">
        <img src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxwURlz-WQ4P2pcJ6114846CsS_J1iFHhoPhvJeoGjJUnZ4R2izgoH4P9TeFlCdIdAohY&usqp=CAU" >
     </div>
    
    </header>
    <br>

    <!--create sign up form-->
    

        <div class="sign">
            
                <h1>sign up </h1>
                <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    }
                }
                ?>

                <form class="signup-form"  action="sign up.php"  method="POST">
                <label for="Full Name">Full Name : </label><br>
                <input type ="text" id="fname"  name="name"  required ><br>

                <label for="short Name">Short Name : </label><br>
                <input type ="text" id="sname" name="sname"  required><br>

                <labe for ="Email">Email :</labe><br>
                <input type ="text" id="email" name ="email" required><br>

                <label for ="Telphone Number">Telephone Number:</label><br> 
                <input type ="text" id="pnumber" name="number" required><br>
                
                <label for ="password" >Passwaord</label><br>
                <input type="password" id="password" name="password" required><br>

                <label for="conform password">Conform Password</label><br>
                <input type ="password" id="cpassword" name="cpassword" required><br>
                
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="participant">participant</option>
                    <option value="admin">admin</option>
                </select><br>

                <label for="session">Session</label>
                <select id="session" name="session" required>
                <option value="session_101">Session 101: Keynote</option>
                <option value="session_102">Session 102: AI Research</option>
                <option value="session_103">Session 103: Quantum Computing</option>
                </select>

            <!--submit button-->
                <button type="submit" name="submit" >Sign Up</button>


            </form>
        </div>

        
        <br>

        <script src="sign upjs.js"> </script>

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