<?php require('a_auth.php'); ?>
<?php require('includes/header.php'); ?>
<?php require('includes/sidebar.php'); ?>
<?php require('includes/topbar.php'); ?>

<?php
require('includes/dbconf.php');

try {
    $stmt = $dbcon->prepare("SELECT * FROM tbl_journals ORDER BY publication_date DESC");
    $stmt->execute();
    $journals = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<?php
if(isset($_SESSION['journal_status']))
{
    ?>
    <div class="container m-4 p-4 pr-5">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?= $_SESSION['journal_status']; ?></strong>
                </div>
            </div>
        </div>
    </div>
    <?php
    unset($_SESSION['journal_status']);
}
?>

<?php
if(isset($_SESSION['del_journal_status']))
{
    ?>
    <div class="container m-4 p-4 pr-5">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?= $_SESSION['del_journal_status']; ?></strong>
                </div>
            </div>
        </div>
    </div>
    <?php
    unset($_SESSION['del_journal_status']);
}
?>

<div class="container m-4 p-4 pr-5" style="background-color: #fff;">
    <h2 class="mb-4">View Journals</h2>

    <?php if (!empty($journals)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Publication Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($journals as $journal): ?>
                    <tr>
                        <td><?php echo $journal['title']; ?></td>
                        <td><?php echo $journal['author']; ?></td>
                        <td><?php echo $journal['description']; ?></td>
                        <td><?php echo $journal['publication_date']; ?></td>
                        <td>
                            <a href="<?php echo $journal['file_path']; ?>" target="_blank">Download</a>
                            <a href="delete_journal.php?id=<?php echo $journal['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this journal?')">
                                <i class="fa fa-trash"></i> <!-- Font Awesome delete icon -->
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No journals found.</p>
    <?php endif; ?>

</div>

<?php require('includes/footer.php'); ?>