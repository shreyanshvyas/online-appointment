<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webfont/1.6.28/webfontloader.js" integrity="sha512-v/wOVTkoU7mXEJC3hXnw9AA6v32qzpknvuUF6J2Lbkasxaxn2nYcl+HGB7fr/kChGfCqubVr1n2sq1UFu3Gh1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="assets/styles.css">
    <script src="assets/main.js"></script>
</head>
<body style="margin-top:20px">
    <header id="header">
        <div class="row">
            <div class="header_toggle d-flex col-md-5"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <h3 style="text-align:center; color:#5CACF3;" class="d-flex col-md-5"><strong>Admin Dashboard</strong> </h3>
            <hr class="w-100">
        </div>
        </div>
    </header>
    <body id="body-pd">
        <div class="l-navbar h-100" id="nav-bar" >
            <nav class="nav">
                <div> <a class="nav_logo"> <img src="../img/s2.svg" height="25" alt="Logo" style="margin-top: -1px;"><span class="nav_logo-name">S3
                            Hospital</span> </a>
                    <div class="nav_list">
                        <a href="apt.php" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Online Apt.</span> </a>
                        <a href="oc.php" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Video Conferencing</span> </a>
                        <a href="lab.php" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Lab Bookings</span> </a>
                        <a href="p1.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">VC</span> </a>
                        <a href="p2.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Apt. & Lab</span> </a>
                        <a href="fdb.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i>
                            <span class="nav_name">Feedback</span> </a>
                        <a href="faq.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i>
                            <span class="nav_name">Questions</span> </a>
                        <a href="users.php" class="nav_link"> <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Users</span> </a>
                    </div>
                </div> <a href="signout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                        class="nav_name">SignOut</span> </a>
            </nav>
        </div>