<?php
session_start();
if(isset($_SESSION['admin_login']) !== false)
{
    header("location: /tarabanovella/admin");
    exit(0);
}