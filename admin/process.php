<?php
session_start();
include('includes/dbconf.php');

if(isset($_POST['adlogin']))
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM tbl_admin WHERE email=:email AND password=:password";
    $stmt = $dbcon->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0)
    {
        $_SESSION['alogin'] = $email;
        $_SESSION['admin_login'] = true;
        $_SESSION['admin_login_status'] = "Admin! Logged In Successful...!";
        header("location: /tarabanovella/admin");
    }
    else
    {
        $_SESSION['admin_login_status'] = "Invalid Username or Password";
        header("location: login.php");
    }
}
