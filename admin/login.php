<?php
session_start();
if(isset($_SESSION['admin_login']) !== false)
{
    header("location: /tarabanovella/admin");
    exit(0);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    
</body>
</html>