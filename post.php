<?php require('includes/header.php'); ?>
<?php require('includes/nav.php'); ?>

    <header class="masthead" style="background-image:url('assets/img/post-bg.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="post-heading">
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <article>
        <div class="container">
            <div class="row">
                <?php
                require("includes/dbconf.php");

                if(isset($_POST['search'])) {
                    $searchTerm = $_POST['searchTerm'];

                    try {
                        $stmt = $dbcon->prepare("SELECT * tbl_journals WHERE title LIKE :searchTerm OR author LIKE :searchTerm ORDER BY publication_date DESC");
                        $stmt->bindValue(":searchTerm", "%" . $searchTerm . "%", PDO::PARAM_STR);
                        $stmt->execute();
                        $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }
                    catch (PDOException $e) {
                        echo "Error: ". $e->getMessage();
                    }
                }
                ?>

                <div class="container m-4 p-4 pr-5" style="background-color: #fff;">
                    <h2 class="mb-4">Search Journals</h2>

                    <form action="post.php" method="post">
                        <div class="form-group">
                            <label for="searchTerm">Search by Title or Author:</label>
                            <input type="text" class="form-control form-control-lg" name="searchTerm" placeholder="Enter journal title or author" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="search">Search</button>
                    </form>

                    <?php if(isset($searchResults) && !empty($searchResults)) : ?>
                        <h3 class="mt-4">Search Results</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Description</th>
                                    <th>Publication</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($searchResults as $result): ?>
                                    <tr>
                                        <td><?php echo $result['title']; ?></td>
                                        <td><?php echo $result['author']; ?></td>
                                        <td><?php echo $result['description']; ?></td>
                                        <td><?php echo $result['publication_date']; ?></td>
                                        <td>
                                            <a href="uploads/<?php echo $result['file_path']; ?>" target="_blank">Download</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php elseif(isset($searchResults) && empty($searchResults)) : ?>
                        <p>No matching journals found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </article>

<?php require('includes/footer.php'); ?>