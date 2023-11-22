<?php require('a_auth.php'); ?>
<?php require('includes/header.php'); ?>
<?php require('includes/sidebar.php'); ?>
<?php require('includes/topbar.php'); ?>

<?php
if(isset($_SESSION['journal_status']))
{
    ?>
    <div class="container m-4 p-4 pr-5">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close">&times;</button>
                    <strong><?= $_SESSION['journal_status']; ?></strong>
                </div>
            </div>
        </div>
    </div>
    <?php
    unset($_SESSION['journal_status']);
}
?>

<div class="container m-4 p-4 pr-5" style="background-color: #fff;">
    <h2 class="mb-4">Upload Journal</h2>

    <form action="process.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" name="author" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" style="height: 150px; resize: none;" required></textarea>
        </div>

        <div class="form-group">
            <label for="publication_date">Publication Date and Time:</label>
            <input type="datetime-local" class="form-control" name="publication_date" required>
        </div>

        <div class="form-group">
            <label for="file">Upload Journal (PDF):</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input border" id="customFile" name="file" accept=".pdf" required onchange="previewFile()">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
        </div>

        <div id="preview"></div>

        <button type="submit" class="btn btn-primary" name="upload_journals">Upload</button>
    </form>
</div>

<?php require('includes/footer.php'); ?>
<script>
    function previewFile() {
        var preview = document.getElementById('preview');
        var fileInput = document.querySelector('input[type=file]');
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.innerHTML = '<embed src="' + reader.result + '" width="100%" height="600px" />';
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = '';
        }
    }
</script>