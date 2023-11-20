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
        }
        catch (e) {}
        ?>

    </div>

<?php require("includes/footer.php"); ?>