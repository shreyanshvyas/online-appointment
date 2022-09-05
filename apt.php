<?php include('partials/header.php'); ?>
<?php
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}?>
<div id="preview" class="preview">
    <div>
        <div data-draggable="true" class="" style="position: relative;" draggable="false">
            <section draggable="false" class="container pt-5" data-v-271253ee="">
                <section class="mb-10">
                    <h2 class="fw-bold mb-5 text-center">Departments</h2>
                    <div class="row mb-4">
                        <div class="col-md-3 mb-4 mb-md-0 ms-auto">
                            <div class="bg-image hover-overlay ripple shadow-1-strong rounded-4 mb-4"
                                data-mdb-ripple-color="light">
                                <img src="img/8.jpg" class="w-100" alt="" aria-controls="#picker-editor"
                                    draggable="false">
                            </div>
                        </div>
                        <div class="col-md-9 col-xl-7 mb-4 mb-md-0 me-auto">
                            <h5 class="fw-bold">General Physician</h5>
                            <div class="mb-2 text-warning small"> <i class="fas fa-money-bill me-2"
                                    aria-controls="#picker-editor"></i><span>What do we do?</span> </div>
                            <p class="text-muted">Expert recommended best General Physicians in Indore, Madhya Pradesh.
                                All of our general physicians actually face a rigorous 50-Point Inspection, which
                                includes customer reviews, history, complaints, ratings, satisfaction, trust, cost and
                                their general excellence. You deserve only the best!</p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 mb-4 mb-md-0 ms-auto">
                            <div class="bg-image hover-overlay ripple shadow-1-strong rounded-4 mb-4"
                                data-mdb-ripple-color="light">
                                <img src="img/4.jpg" class="w-100" alt="" aria-controls="#picker-editor"
                                    draggable="false">
                            </div>
                        </div>
                        <div class="col-md-9 col-xl-7 mb-4 mb-md-0 me-auto">
                            <h5 class="fw-bold">Dermatology</h5>
                            <div class="mb-2 text-danger small"> <i class="fas fa-globe-americas me-2"
                                    aria-controls="#picker-editor"></i><span>What We Do?</span> </div>
                            <p class="text-muted">The Department of Dermatology offers a comprehensive skin care
                                diagnostics and treatment. The department provides a wide variety of services including
                                treatment of Skin- Acne, Psoriasis, Vitiligo, Lichen Planus, Hair loss, Bald patch,
                                Alopecia aerate, Nail fungus, Nail discoloration, Brittle Nails, Skin allergies,
                                Sunburns, Pigmentation amongst others.</p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 mb-4 mb-md-0 ms-auto">
                            <div class="bg-image hover-overlay ripple shadow-1-strong rounded-4 mb-4"
                                data-mdb-ripple-color="light">
                                <img src="img/5.jpg" class="w-100" alt="" aria-controls="#picker-editor"
                                    draggable="false">
                            </div>
                        </div>
                        <div class="col-md-9 col-xl-7 mb-4 mb-md-0 me-auto">
                            <h5 class="fw-bold">ENT Specialists</h5>
                            <div class="mb-2 text-primary small"> <i class="fas fa-palette me-2"
                                    aria-controls="#picker-editor"></i><span></span>What We Do? </div>
                            <p class="text-muted">Treatment of ear, nose and throat conditions in adults and children,
                                along with problems in hearing, deafness, ringing in the ears, pain amongst others are
                                all treated in this centre. Procedures like Bronchoscopy, Esophagoscopy – diagnostics as
                                well as Therapeutic are all performed here by our expert team of doctors.</p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 mb-4 mb-md-0 ms-auto">
                            <div class="bg-image hover-overlay ripple shadow-1-strong rounded-4 mb-4"
                                data-mdb-ripple-color="light">
                                <img src="img/6.jpg" class="w-100" alt="" aria-controls="#picker-editor"
                                    draggable="false">
                            </div>
                        </div>
                        <div class="col-md-9 col-xl-7 mb-4 mb-md-0 me-auto">
                            <h5 class="fw-bold">Cardiology</h5>
                            <div class="mb-2 text-warning small"> <i class="fas fa-money-bill me-2"
                                    aria-controls="#picker-editor"></i><span>What we do?</span> </div>
                            <p class="text-muted">An integrated facility, it has a dedicated team of cardiologists and
                                cardiac surgeons that works with multi-disciplinary teams to provide the best possible
                                care to our patients. Our expertise in managing even acute cardiac emergencies is well
                                known.</p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 mb-4 mb-md-0 ms-auto">
                            <div class="bg-image hover-overlay ripple shadow-1-strong rounded-4 mb-4"
                                data-mdb-ripple-color="light">
                                <img src="img/7.jpg" class="w-100" alt="" aria-controls="#picker-editor"
                                    draggable="false">
                            </div>
                        </div>
                        <div class="col-md-9 col-xl-7 mb-4 mb-md-0 me-auto">
                            <h5 class="fw-bold">Paediatrics</h5>
                            <div class="mb-2 text-warning small"> <i class="fas fa-money-bill me-2"
                                    aria-controls="#picker-editor"></i><span>Business</span> </div>
                            <p class="text-muted">The Department of Paediatrics at SSS Hospitals provide specialised
                                support with development problems, infectious diseases, cancer, orthopaedics and genetic
                                disorders. The team has been well-appreciated for their work in new born care (Stable
                                and sick newborn), care of sick children in wards and vaccination and nutrition
                                counseling.</p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3 mb-4 mb-md-0 ms-auto">
                            <div class="bg-image hover-overlay ripple shadow-1-strong rounded-4 mb-4"
                                data-mdb-ripple-color="light">
                                <img src="img/9.webp" class="w-100" alt="" aria-controls="#picker-editor"
                                    draggable="false">
                            </div>
                        </div>
                        <div class="col-md-9 col-xl-7 mb-4 mb-md-0 me-auto">
                            <h5 class="fw-bold">Nephrology</h5>
                            <div class="mb-2 text-warning small"> <i class="fas fa-money-bill me-2"
                                    aria-controls="#picker-editor"></i><span></span>What do we do?</div>
                            <p class="text-muted">Department of Nephrology is a modern facility taking care of
                                diagnosis, treatment and management of various kidney diseases. Our hospital is a
                                leading centre for the management of all renal problems including acute and chronic
                                renal diseases caused by diabetes mellitus, hypertension, urinary tract infections,
                                kidney stone disease, Kidney Biopsy, HD Catheter insertion and childhood kidney
                                diseases.</p>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-primary btn-lg btn-rounded py-3 px-8 mb-2 mb-md-0 me-md-2" href="booking.php"
                            role="button" aria-controls="#picker-editor">book here</a>
                    </div>
                </section>
            </section>
        </div>
    </div>
</div>
<?php include('partials/footer.php'); ?>