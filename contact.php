<?php require("includes/header.php"); ?>
<?php require("includes/nav.php"); ?>

<?php
require("includes/dbconf.php");

if(isset($_POST['sendMessageButton'])) {
    try {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
    }
    catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
}
?>

<header class="masthead" style="background-image: url('assets/img/contact-bg.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">
                <div class="site-heading">
                    <h1>Contact Us</h1>
                    <span class="subheading">Have questions? We have answers.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto">
            <p>Want to get in touch? Fill out the form below to send us a message, and we will get back to you as soon as possible!</p>
            <form id="contactForm" name="contactForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" novalidate="novalidate">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your name">
                    <div class="invalid-feedback">Please enter your name.</div>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required placeholder="Enter your phone number">
                    <div class="invalid-feedback">Please enter a valid phone number.</div>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" required placeholder="Enter your message" rows="5"></textarea>
                    <div class="invalid-feedback">Please enter your message.</div>
                </div>
                <div id="success"></div>
                <button class="btn btn-primary" id="sendMessageButton" name="sendMessageButton" type="submit">Send Message</button>
            </form>
        </div>
    </div>
</div>

<?php require('includes/footer.php'); ?>