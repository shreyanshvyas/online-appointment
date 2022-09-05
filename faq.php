<?php include('partials/header.php'); ?>
<?php
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

$insert = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    // Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['msg'];
    $sql = "INSERT INTO `users`.`que` (`name`, `email`, `msg`, `today`) VALUES ('$name', '$email', '$message', current_timestamp());";
    // Execute the query
    if($con->query($sql) == true){
        // Flag for successful insertion
        $insert = true;
        echo'<div class="alert alert-success m-0" role="alert" data-mdb-color="success" id="customxD">
        <i class="fas fa-check-circle me-3"> </i>
        <strong>Great!</strong>Your question has been taken in our database. We will make sure to answer it as soon as possible.
        </div>';
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    // Close the database connection
    $con->close();
}
?>
<div data-draggable="true" class="" style="position: relative;" draggable="false">
    <section draggable="false" class="container pt-5" data-v-271253ee="">
        <section class="mb-10">
            <div class="row gx-lg-5">
                <div class="col-md-5 mb-4 mb-md-0">
                    <h2 class="fw-bold mb-4">Frequently asked questions</h2>
                    <p class="text-muted mb-5">Didn't find your answer in the FAQ? Contact our sales team.</p>
                    <form method="post">
                        <div class="form-outline mb-4"> <input type="text" id="name" name="name" oninput="validate(this)" class="form-control"
                                required> <label class="form-label" for="name" style="margin-left: 0px;">Name</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 42.4px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div> 
                        <div class="form-outline mb-4"> <input type="email" id="email" name="email" oninput="validate(this)" class="form-control"
                                required> <label class="form-label" for="email" style="margin-left: 0px;">Email
                                address</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 88.8px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div> 
                        <div class="form-outline mb-4"> <textarea class="form-control" id="message" name="msg" oninput="validate(this)" rows="5"
                                required></textarea>
                            <label class="form-label" for="message" style="margin-left: 0px;">Message</label>
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 60px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div> 
                        <button type="submit" class="btn  btn-primary btn-block mb-4"
                            aria-controls="#picker-editor">Send</button>
                    </form>
                </div>
                <div class="col-md-7 mb-4 mb-md-0">
                    <p class="fw-bold">How does an online consultation work?</p>
                    <p class="text-muted mb-5">We help you connect to a doctor in just 60 seconds. All you have to do is
                        tell us your symptoms or health problems, choose the speciality, make a payment. Once payment is
                        made, we alert our panel of verified, high-quality doctors and allocate a doctor to your
                        consultation. In 60 seconds, you can start talking to a doctor. Once your consultation is
                        completed, you can even follow up with the doctor for free for a period of 7 days, if required.
                    </p>
                    <p class="fw-bold">Will online doctors be able to solve my medical issue?</p>
                    <p class="text-muted mb-5">Our doctors will give you qualified medical advice on your health issues
                        and help you identify the next steps, which may include further tests, a prescription, or
                        lifestyle tips. We have built features like image sharing, voice calling and video call (only on
                        the app) to ensure that doctors get all the required information for a diagnosis. On the off
                        chance that our doctors can not form a conclusive diagnosis without a physical examination, they
                        will cancel the consultation & refund your money. 93% of patients who initiate an online
                        consultation find it useful.</p>
                    <p class="fw-bold">Are your doctors qualified?</p>
                    <p class="text-muted mb-5">We have a thorough verification process for every doctor on Practo. Any
                        doctor that you consult with is a verified medical practitioner with all their qualifications
                        documents manually and electronically verified by our team. We also take feedback from patients
                        to ensure that doctors maintain high standards on online consultation.</p>
                    <p class="fw-bold">Do you have a refund policy?</p>
                    <p class="text-muted mb-5">We have a refund policy. If for any reason you are not satisfied with
                        your online consultation, simply reach out to us on support, and we will refund your money after
                        checking with the doctor</p>
                    <p class="fw-bold">Are the audio/video calls done during a consultation recorded?</p>
                    <p class="text-muted mb-5">As per regulatory requirements, all audio and video calls done during an
                        online consultation with the doctor, will be recorded and stored in a secure manner. The audio
                        calls will be shared with you at the end of the consultation which you can access inside the
                        Google meet app. The video calls are recorded, but will not be shared with you or the doctor.
                        They will only be shared with a competent authority upon explicit request, in case of a
                        medico-legal requirement.</p>
                </div>
            </div>
        </section>
    </section>
</div>
<?php include('partials/footer.php'); ?>