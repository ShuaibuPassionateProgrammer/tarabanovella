<?php
session_start();

if(isset($_GET['id'])) {
    require("includes/dbconf.php");
}
else {
    header("location: journal_list.php");
}