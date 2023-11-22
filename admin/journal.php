<?php require("a_auth.php"); ?>
<?php require('includes/header.php'); ?>
<?php require('includes/sidebar.php'); ?>
<?php require('includes/topbar.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Manage Journals</h2>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Add New Journal</h5>
                    <p class="card-text">Add a new journal entry to the system.</p>
                    <a href="add_journals.php" class="btn btn-primary">Add Journal</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">View Journal List</h5>
                    <p class="card-text">View the details of a journal, including the author and content.</p>
                    <a href="journal_list.php" class="btn btn-primary">View Journal</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Search Journal</h5>
                    <p class="card-text">Search for journals by title, author, or publication date.</p>
                    <a href="search_journals.php" class="btn btn-primary">Search Journals</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <pre>




            </pre>
            <pre>



            
            </pre>
        </div>
    </div>
</div>

<?php require('includes/footer.php'); ?>