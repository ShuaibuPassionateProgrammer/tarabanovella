<?php
session_start();

if(isset($_GET['id'])) {
    require('includes/dbconf.php');

    try {
        $journalId = $_GET['id'];
        
        $stmt = $dbcon->prepare("SELECT file_path FROM tbl_journals WHERE id = :id");
        $stmt->bindParam(':id', $journalId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $deleteStmt = $dbcon->prepare("DELETE FROM tbl_journals WHERE id = :id");
            $deleteStmt->bindParam(':id', $journalId);
            $deleteStmt->execute();

            unlink($result['file_path']);

            $_SESSION['del_journal_status'] = "Journal deleted successfully!";
        } else {
            $_SESSION['del_journal_status'] = "Error: Journal not found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    header("location: journal_list.php");
    exit();
} else {
    header("location: journal_list.php");
    exit();
}
?>
