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
                </div>
            </div>
        </div>
    </article>

<?php require('includes/footer.php'); ?>