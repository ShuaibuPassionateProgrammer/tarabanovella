<?php require("includes/header.php"); ?>
<?php require("includes/nav.php"); ?>

    <header class="masthead" style="background-image:url('assets/img/home-bg.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="site-heading">
                        <h1>TARABA NOVELLA</h1><span class="subheading">Journal of multidisciplinary studies</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <?php 
        require("includes/dbconf.php");

        try {
            $stmt = $dbcon->prepare("SELECT * FROM tbl_journals ORDER BY publication_date DESC LIMIT 5");
            $stmt->execute();
            $journalEntries = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($journalEntries)) {
                echo '<p>No journals available.</p>';
            } else {
                foreach ($journalEntries as $entry) {
                    echo '<div class="card journal-card">';
                    echo '<div class="card-body">';
                    echo '<h2 class="card-title journal-title">' . $entry['title'] . '</h2>';
                    echo '<p class="card-text journal-excerpt">' . $entry['description'] . '</p>';
                    echo '<p class="card-text journal-date">' . date('F j, Y', strtotime($entry['publication_date'])) . '</p>';
                    echo '<a href="uploads/' . $entry['file_path'] . '" class="card-link journal-readmore" target="_blank">Read More</a>';
                    echo '</div>';
                    echo '</div>';
                }
            }
        }
        catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
        ?>

    </div>

<?php require("includes/footer.php"); ?>