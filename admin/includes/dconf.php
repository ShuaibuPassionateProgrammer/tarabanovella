<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "taraba_novella");

try {}
catch (PDOException $e) {
    echo "Error: " .$e->getMessage();
}