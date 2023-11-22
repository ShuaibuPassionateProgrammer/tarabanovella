<?php
session_start();

if(isset($_GET['id'])) {
    require("includes/dbconf.php");

    try {}
    catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
}
else {
    header("location: journal_list.php");
}