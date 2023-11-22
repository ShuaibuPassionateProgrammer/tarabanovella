<?php
require('a_auth.php');
require('includes/header.php');
require('includes/sidebar.php');
require('includes/topbar.php');

require('includes/dbconf.php');

if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];

    // Fetch journals based on the search term in title or author
    try {
        $stmt = $dbcon->prepare("SELECT * FROM tbl_journals WHERE title LIKE :searchTerm OR author LIKE :searchTerm ORDER BY publication_date DESC");
        $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
        $stmt->execute();
        $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>