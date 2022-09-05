<?php include('partials/header.php'); ?>
<?php
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
$insert = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    // echo "Success connecting to the db";
    // Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $sql = "INSERT INTO `users`.`feedback` (`name`, `email`, `subject`, `message`, `today`) VALUES ('$name', '$email', '$subject', '$message', current_timestamp());";
    // Execute the query
    if($con->query($sql) == true){
        // Flag for successful insertion
        $insert = true;
        echo'<div class="alert alert-success m-0" role="alert" data-mdb-color="success" id="customxD">
        <i class="fas fa-check-circle me-3"> </i>
        <strong>Yayy!</strong> Your feedback has been submitted succesfully. We will get back to you soon.
        </div>';
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    // Close the database connection
    $con->close();
}
?>
<div class="container my-4">
    <section class="my-5">
        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center my-5">Contact us</h2>
        <!-- Section description -->
        <p class="text-center w-responsive mx-auto pb-5">We here, collect your feedback and your issues. And resolve
            them as soon as possible. Drop here any of your problem or suggestions we will get in touch with you soon.
            Here we have given our contact details so that you can call us and can mail us at any time. Thank you.. </p>
        <!-- Grid row -->
        <div class="row">
            <!-- Grid column -->
            <div class="col-lg-5 mb-lg-0 mb-4">
                <!-- Form with header -->
                <form method="post">
                    <div class="card">
                        <div class="card-body">
                            <!-- Header -->
                            <div class="form-header blue accent-1">
                                <h3 class="mt-2"><i class="fas fa-envelope"></i> Write to us:</h3>
                            </div>
                            <p class="dark-grey-text">We'll write rarely, but only the best content.</p>
                            <!-- Body -->
                            <div class="md-form mb-3">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label for="name">Your name</label>
                                <input type="text" id="name" name="name" oninput="validate(this)" class="form-control" required />
                            </div>
                            <div class="md-form mb-3">
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <label for="email">Your email</label>
                                <input type="text" id="email" name="email" oninput="validate(this)" class="form-control" required />
                            </div>
                            <div class="md-form mb-3">
                                <i class="fas fa-tag prefix grey-text"></i>
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" name="subject" oninput="validate(this)" class="form-control" required />
                            </div>
                            <div class="md-form mb-3">
                                <i class="fas fa-pencil-alt prefix grey-text"></i>
                                <label for="message">Send message</label>
                                <textarea id="message" name="message" class="form-control md-textarea" rows="3"
                                    required></textarea>
                            </div>
                            <div class="text-center mb-3">
                                <button class="btn btn-light-blue">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-7">
                <!--Google map-->
                <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 400px">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3679.2937957630074!2d75.88336161476417!3d22.754475685089375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396302a7afffffff%3A0xc62987376e443149!2sSoftvision%20College%20-%20Management%20(BBA)%20%2C%20Commerce%20(BCOM%20%2C%20BCOM%20HONORS%20%2C%20MCOM)%20%2C%20Science%20(BSC%20%2C%20MSC%20%2C%20PHD)%20%2C%20Computers%20(BCA)!5e0!3m2!1sen!2sin!4v1651466546950!5m2!1sen!2sin"
                        width="800" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- Buttons-->
                <div class="row text-center">
                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1">
                            <i class="fas fa-map-marker-alt"></i>
                        </a>
                        <p>Indore, 452010</p>
                        <p class="mb-md-0">Madhya pradesh </p>
                    </div>
                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1">
                            <i class="fas fa-phone"></i>
                        </a>
                        <p><a href="tel:0731-2990644">0731-2990644</a></p>
                        <p class="mb-md-0">Mon - Fri, 6:00-22:00</p>
                    </div>
                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <p><a href="mailto:s3hospital@gmail.com">s3hospital@gmail.com</a></p>
                        <p class="mb-0"><a href="mailto:sssprojectworks@gmail.com">sssprojectworks@gmail.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('partials/footer.php'); ?>