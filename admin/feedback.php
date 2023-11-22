<?php
require('a_auth.php');
require('includes/header.php');
require('includes/sidebar.php');
require('includes/topbar.php');
require('includes/dbconf.php');

try {
    $stmt = $dbcon->prepare("SELECT * FROM tbl_contact_messages");
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


require('includes/footer.php');
?>