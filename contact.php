<?php

include 'includes/config.php';
$pageTitle = "Contact Us | StudySync";
include 'includes/header.php';

if(isset($_POST['send'])){

$name=mysqli_real_escape_string($conn,$_POST['name']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$subject=mysqli_real_escape_string($conn,$_POST['subject']);
$message=mysqli_real_escape_string($conn,$_POST['message']);

mysqli_query($conn,"INSERT INTO contact_messages(name,email,subject,message)
VALUES('$name','$email','$subject','$message')");

echo "<script>alert('Message Sent Successfully!');</script>";

}

?>

<section class="contact-page">

    <div class="container">

        <div class="contact-heading">

        <span>CONTACT <span class="blue">US</span></span>

            <h1>Get In Touch</h1>

            <p>
                We're here to answer your questions and help you start your learning journey.
            </p>

        </div>

        <div class="contact-wrapper">

            <!-- LEFT -->

            <div class="contact-info">

                <h2>Contact Information</h2>

                <p class="info-text">
                    We'd love to hear from you. Feel free to contact us anytime.
                </p>

                <div class="info-box">

                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>

                    <div>

                        <h4>Email</h4>

                        <p>support@studysync.com</p>

                    </div>

                </div>

                <div class="info-box">

                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>

                    <div>

                        <h4>Phone</h4>

                        <p>+92 300 1234567</p>

                    </div>

                </div>

                <div class="info-box">

                    <div class="icon">
                        <i class="fas fa-location-dot"></i>
                    </div>

                    <div>

                        <h4>Address</h4>

                        <p>Lahore, Pakistan</p>

                    </div>

                </div>

                <div class="info-box">

                    <div class="icon">
                        <i class="fas fa-clock"></i>
                    </div>

                    <div>

                        <h4>Working Hours</h4>

                        <p>Mon - Sat : 9 AM - 6 PM</p>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->

            <div class="contact-form">

                <form method="POST">

                    <div class="row">

                     <input
type="text"
name="name"
placeholder="Your Name"
required>

            <input
type="email"
name="email"
placeholder="Your Email"
required>

                    </div>

                    <input
type="text"
name="subject"
placeholder="Subject"
required>

                  <textarea
name="message"
rows="8"
placeholder="Your Message"
required></textarea>

                  <button
type="submit"
name="send"
class="send-btn">

                        <i class="fas fa-paper-plane"></i>

                        Send Message

                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

<?php include 'includes/footer.php'; ?>