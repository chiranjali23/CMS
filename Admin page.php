<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header('Location: log_in.html'); 
    exit();
}
?>


<html>
    <head>
        <title> admin page</title>
        <link rel="stylesheet" href="Admin pagestyle.css">    </head>
    <body>
        
        <div class="container">
            <dic class="content">
                <h3>Hi, <span>admin</span></h3>
                <h1>Welcome <span></span></h1>
                <p>This is an admin page</p>
                <a href="admin dash.html" class="btn">Admin dashboard</a>
                <a href ="#" class="btn">logout</a>

                
                
                </div>
        </div>

        

        
    </body>
</html> 