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

if (isset($_POST['upload_journals'])) {
    try {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        $publication_date = $_POST['publication_date'];

        // Convert the publication date to MySQL format
        $publication_date = date('Y-m-d H:i:s', strtotime($publication_date));

        // File upload handling
        $targetDir = "../uploads/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

        $stmt = $dbcon->prepare("INSERT INTO tbl_journals (title, author, description, publication_date, file_path) 
                                VALUES (:title, :author, :description, :publication_date, :file_path)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':publication_date', $publication_date);
        $stmt->bindParam(':file_path', $targetFilePath);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $_SESSION['journal_status'] = "Journal uploaded successfully!";
            header("location: journal_list.php");
        } else {
            $_SESSION['journal_status'] = "Error: Journal not uploaded. Please check your inputs and try again.";
            header("location: add_journals.php");
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
