<?php
session_start();

if(isset($_GET['id'])) {
    require("includes/dbconf.php");

    try {
        $journalId = $_GET['id'];

        $stmt = $dbcon->prepare("SELECT file_path FROM tbl_journals WHERE id = :id");
        $stmt->bindParam(":id", $journalId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
}
else {
    header("location: journal_list.php");
}