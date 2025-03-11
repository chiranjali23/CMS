<?php
include 'config.php';
include "phpqrcode/qrlib.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize error array to store validation messages
    $errors = [];

    // Validate full name
    if (empty($_POST['name'])) {
        $errors['name'] = "Full name is required.";
    }

    // Validate email
    if (empty($_POST['email'])) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    // Validate contact number
    if (empty($_POST['number'])) {
        $errors['number'] = "Contact number is required.";
    } elseif (!preg_match("/^[0-9]{10}$/", $_POST['number'])) {
        $errors['number'] = "Invalid contact number. It must be 10 digits.";
    }

    // Validate gender
    if (empty($_POST['gender'])) {
        $errors['gender'] = "Gender is required.";
    }

    // Validate role
    if (empty($_POST['role'])) {
        $errors['role'] = "Role is required.";
    }

    // Validate conference track
    if (empty($_POST['track'])) {
        $errors['track'] = "Conference track is required.";
    }

    // Validate session selection (at least one session)
    if (empty($_POST['session'])) {
        $errors['session'] = "At least one session must be selected.";
    }

    // Validate session preference (morning, afternoon, evening)
    if (empty($_POST['preference'])) {
        $errors['preference'] = "Session preference is required.";
    }



    
    






    // Handle special requests (no validation needed here, but sanitize input)
    $specialRequests = htmlspecialchars($_POST['requests']);

    // If there are errors, display them, else success message
    if (!empty($errors)) {
        foreach ($errors as $field => $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    } else {
        // Sanitize form data before using in SQL query
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $session = mysqli_real_escape_string($conn, $_POST['session']);
        $preference = mysqli_real_escape_string($conn, $_POST['preference']);

        // Insert data into the database using a prepared statement
        $sql = "INSERT INTO participant_new (full_name, email,  session_register) 
                VALUES ('$name', '$email',  '$session')";

        if (mysqli_query($conn, $sql)) {
            
           //generate qr code 
            $PNG_TEMP_DIR = 'temp/';
            if(!file_exists($PNG_TEMP_DIR))
            mkdir($PNG_TEMP_DIR);
    
            $filename = $PNG_TEMP_DIR . 'test.png';
    
            if (isset($_POST["submit"])){
                //qr code read value
            $codestring ="Name: $name\nEmail: $email\nSession: $session\n";
           
                //qr code image
            $filename = $PNG_TEMP_DIR . 'test'.
            md5($codestring)  . '.png';
    
            QRcode:: png($codestring, $filename);

            $update_sql = "UPDATE participant_new SET Qr_code = '$filename' WHERE email = '$email'";
    
            // Display success message and dawnload QR code
            echo "<script>alert('Registration successful! Your QR code has been generated.');</script>";
            echo '<h3>QR Code:</h3>';
            echo '<img src="' . $filename . '" alt="QR Code" /><br/>';
            echo '<a href="' . $filename . '" download="qr_code.png">Download QR Code</a>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
}


    mysqli_close($conn);


?>



<!--html code-->
<html>
<head>
<title>conference register </title>

<link rel="stylesheet" href = "registerstyle.css">
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
              <li><a href ="log in.html">Sign in</a></li>
          </ul>
      </nav>
      
      <div class="logo">
          <img src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxwURlz-WQ4P2pcJ6114846CsS_J1iFHhoPhvJeoGjJUnZ4R2izgoH4P9TeFlCdIdAohY&usqp=CAU" >
       </div>
      
      </header>
      <br>
  


<div class = form-body>
    <div class = "container">
<h2> Conference Register </h2>


<form id ="registrationForm" action = "register form.php"  method ="POST">

<label for = "fname" > Full Name : </label>
	<input type ="text" name = "name"  required><br>

<label for = "Email"> Email : </lable>
	<input type = "text" name = "email" required><br>

<label for = "number"> contact Number : </label>
	<input type ="text" name = "number" required><br>

<label for ="gender"> Gender : </label>
	Male <input type="radio" value ="male" name="gender" required >
	Female <input type ="radio" value = "female" name = "gender" required><br><br>

<label for="role">Role :</label>
       <select id="role" name="role" >
             <option value="participant" required>Participant</option>
             <option value="speaker">Speaker</option>
             <option value="volunteer">Volunteer</option>
             <option value="organizer">Organizer</option>
       </select><br>


<label for="track">Conference Track:</label>
    <select id="track" name="track" required>
        <option value="technical">Technical</option>
        <option value="business">Business</option>
        <option value="educational">Educational</option>
</select><br><br>

<label for = "session-part" >Session:</label>
    <select id="session_part" name="session" required>
        <option value="opening remarks">opening remarks<br>
        <option value="AI and Machine Learning"> AI and Machine Learning<br>
        <option value="Cyber Security"> Cyber Security
    </select>  
        <br><br>


<label for="session">Session Preferences:</label>
           Morning <input type="radio" id="morning" name="preference" value="morning">
            
            Afternoon<input type="radio" id="afternoon" name="preference" value="afternoon">
            
            Evening<input type="radio" id="evening" name="preference" value="evening">
            
            <br><br>

<label for="requests">Special Requests (Dietary, Accessibility, etc.):</label><br>
<textarea id="requests" name="requests"></textarea><br>


<button type="submit"  name="submit"> Register </button>

</form>
</div>
</body>
</html>