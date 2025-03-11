 <?php

include 'config.php'; // Include database connection

session_start();

$error = []; // Initialize error array

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    echo("<script>console.log('email: " . $email . "');</script>");
    echo("<script>console.log('password: " . $password . "');</script>");

   
    // Prepared statement
    $select = $conn->prepare("SELECT * FROM signup_details WHERE email = ?");
    $select->bind_param("s", $email);
    $select->execute();
    $result = $select->get_result();

   

    
    echo("<script>console.log('hello world');</script>");
    if ($result->num_rows > 0) {
    echo("<script>console.log('hi php');</script>");
        $row = $result->fetch_assoc();
        
    

        echo("<script>console.log('password: " . $row['password'] . "');</script>");
        echo("<script>console.log('password: " . $password . "');</script>");
        // Verify password
        if (password_verify($password, $row['password'])) {
            if ($row['role'] === "admin") {
                $_SESSION['admin_name'] = $row['full_name'];
                header('Location: Admin page.php');
                exit();
            } elseif ($row['role'] === "participant") {
                $_SESSION['user_name'] = $row['full_name'];
                header('Location: User page.php');
                exit();
            }
        } else {
            $error[] = "Incorrect password. Please try again.";
        }
        } else {
        $error[] = "No user found with this email.";
    }
}
?>



<!--html code-->
<!--header session-->

<html>
    <head>
        <title>Log In</title>
        <link rel="stylesheet" href="log instyle.css">
    </head>
    <body>

        
        <header>
            <nav class="navbar">
                <ul>
                    <li><a href="Home page CA.html">Home</a></li>
                    <li><a href="AboutUs.html">About</a></li>
                    <li><a href="conforence information.html">Conference Information</a></li>
                    <li><a href="#">Participant Dashboard</a></li>
                    <li><a href="#">Admin Dashboard</a></li>
                    <li><a href="log in.php">Sign in</a></li>
                </ul>
            </nav>
            
            <div class="logo">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxwURlz-WQ4P2pcJ6114846CsS_J1iFHhoPhvJeoGjJUnZ4R2izgoH4P9TeFlCdIdAohY&usqp=CAU" />
            </div>
        </header>

        <!-- Login Container -->
        <div class="line">
            <ul>
                <li><a href="sign up.php">Sign Up</a></li>
                <li><a href="log in.php">Sign In</a></li>
            </ul>
        </div>

        <!-- Login Form -->
        <div class="login-container">
            <h1>Log In</h1>

            <!-- Display error messages -->
        <?php
        if (!empty($error)) {
            foreach ($error as $err) {
            echo '<span class="error-msg">' . htmlspecialchars($err) . '</span><br>';
            }
            }
        ?>
    
        <form name="login-form" action="log in.php" method="POST">
            <label for="email">Email:</label>
            <input type="text" name="email" placeholder="Enter Email" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Enter Password" required><br><br>

            <a id="forgetpassword" href="#">Forgot Password?</a><br><br>

            <button type="submit" name="submit">Sign In</button>

            <p id="account">Don't have an account?</p>

            <div class="signup">
                <a href="sign up.php">Sign Up</a>
            </div>
        </form>
        </div><br><br>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-content">
                <p>&copy; 2024 International Research Conference</p>
                <p>Contact us at <a href="mailto:info@conference.com">info@conference.com</a></p>
                <p>Follow us on: <a href="#">Twitter</a> | <a href="#">LinkedIn</a></p>
            </div>
        </footer>

    </body>
</html>