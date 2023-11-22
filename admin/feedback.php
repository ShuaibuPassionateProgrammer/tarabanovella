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

echo '<div class="container mt-3">';
echo '<div class="row">';

foreach ($messages as $message) {
    $cardClass = ($message['status'] == 'success') ? 'border-success' : 'border-danger';
    $cardIcon = ($message['status'] == 'success') ? 'fa-check-circle' : 'fa-exclamation-circle';
    $cardColor = ($message['status'] == 'success') ? 'text-success' : 'text-danger';
    $cardTitle = ($message['status'] == 'success') ? 'Success' : 'Error';

    echo '<div class="col-md-4 mb-4">';
    echo '<div class="card ' . $cardClass . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title ' . $cardColor . '">' . $cardTitle . '</h5>';
    echo '<p class="card-text">' . $message['message'] . '</p>';
    echo '<p class="card-text">Sent By: <strong>'.$message['email'].'</strong></p>';
    echo '</div>';
    echo '<div class="card-footer text-muted">';
    echo '<i class="fas ' . $cardIcon . '"></i> ' . $message['created_at'];
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

echo '</div>';
echo '</div>';

require('includes/footer.php');
?>