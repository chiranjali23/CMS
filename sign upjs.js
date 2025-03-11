<html>
    <head>
        <title>sign upJS</title>

    </head>
    <body>
        <script>
        function validateForm() {
      // Get field values
      const fullName = document.getElementById("fname").value.trim();
      const shortName = document.getElementById("sname").value.trim();
      const phoneNumber = document.getElementById("pnumber").value.trim();
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("cpassword").value;
      

     // Validate full name (must not be empty and contain only letters/spaces)
     const fullNameRegex = /^[a-zA-Z\s]+$/;
     if (!fullNameRegex.test(fullName)) {
       alert("Full Name must contain only letters and spaces.")
       return false;
     }

     // Validate short name (must not be empty and contain only letters)
     const shortNameRegex = /^[a-zA-Z]+$/;
     if (!shortNameRegex.test(shortName)) {
       alert("Short Name must contain only letters.");
       return false;
     }

     // Validate phone number (10 digits)
     const phoneRegex = /^[0-9]{10}$/;
     if (!phoneRegex.test(phoneNumber)) {
       alert("Please enter a valid 10-digit phone number.");
       return false;
     }

     // Validate password (minimum 8 characters, 1 uppercase, 1 lowercase, 1 number, 1 special character)
     const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
     if (!passwordRegex.test(password)) {
       alert(
         "Password must be at least 8 characters long, include an uppercase letter, a lowercase letter, a number, and a special character."
       );
       return false;
     }

     // Check if passwords match
     if (password !== confirmPassword) {
       alert("Passwords do not match.");
       return false;
     }

     // If all validations pass
     return true;
   }

        </script>
    </body>
</html>