<?php
session_start();

if(isset($_GET['id'])) {}
else {
    header("location: journal_list.php");
}