<?php
// search_journals.php

require('a_auth.php');
require('includes/header.php');
require('includes/sidebar.php');
require('includes/topbar.php');

require('includes/dbconf.php');

// Check if the search form is submitted
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

<div class="container m-4 p-4 pr-5" style="background-color: #fff;">
    <h2 class="mb-4">Search Journals</h2>

    <!-- Search Form -->
    <form action="search_journals.php" method="post">
        <div class="form-group">
            <label for="searchTerm">Search by Title or Author:</label>
            <input type="text" class="form-control form-control-lg" name="searchTerm" placeholder="Enter journal title or author" required>
        </div>
        <button type="submit" class="btn btn-primary" name="search">Search</button>
    </form>

    <?php if (isset($searchResults) && !empty($searchResults)): ?>
        <!-- Display search results in a table -->
        <h3 class="mt-4">Search Results</h3>
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
                <?php foreach ($searchResults as $result): ?>
                    <tr>
                        <td><?php echo $result['title']; ?></td>
                        <td><?php echo $result['author']; ?></td>
                        <td><?php echo $result['description']; ?></td>
                        <td><?php echo $result['publication_date']; ?></td>
                        <td>
                            <a href="<?php echo $result['file_path']; ?>" target="_blank">Download</a>
                            <a href="delete_journal.php?id=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this journal?')">
                                <i class="fa fa-trash"></i> <!-- Font Awesome delete icon -->
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif (isset($searchResults) && empty($searchResults)): ?>
        <p>No matching journals found.</p>
    <?php endif; ?>
</div>

<?php require('includes/footer.php'); ?>