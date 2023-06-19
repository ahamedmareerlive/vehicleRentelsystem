<?php
   /*
   Template Name: About Page
   */
?>
<?php 
include_once 'util/core.php';
startSession(); 
?>

<?php include_once 'topnav.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>About Us | Colombo Taxi Sri Lanka</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php include_once 'css.php'; ?>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">

            <?php 
                topNav('about'); 
                heroHeader("About Us");
            ?>

        </div>
        <!-- Navbar & Hero End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?php echo get_stylesheet_directory_uri(); ?>/Template/img/c1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="<?php echo get_stylesheet_directory_uri(); ?>/Template/img/c2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="<?php echo get_stylesheet_directory_uri(); ?>/Template/img/c3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="<?php echo get_stylesheet_directory_uri(); ?>/Template/img/c4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                        <h1 class="mb-4">Welcome to <i class='fas fa-car' style='margin-right: 20px;'></i>Colombo Taxi</h1>
                        <p class="mb-4">Welcome to Colombo Taxi, your trusted online car rental service based in Colombo! We take pride in providing reliable transportation solutions for customers looking to explore the beautiful island of Sri Lanka. Whether you're a local resident or a visitor, we offer a wide range of vehicles to suit your needs, with the option to choose between self-drive or hiring a vehicle with a professional driver.</p>
                        <p class="mb-4">At Colombo Taxi, we understand that each customer has unique requirements, which is why we offer the flexibility of both self-drive and chauffeur-driven options. If you prefer to drive yourself and enjoy the freedom of exploring at your own pace, we have a diverse fleet of well-maintained vehicles available for you to choose from. On the other hand, if you'd rather sit back and relax while someone else takes the wheel, we provide experienced and professional drivers who will ensure a safe and comfortable journey for you.</p>
                        <p class="mb-4">We take customer satisfaction seriously and strive to provide exceptional service at every step. Our drivers are courteous, knowledgeable, and familiar with the best routes and attractions across the island. They will be your trusted companions, ensuring that you have a memorable and enjoyable experience during your travels.
                            At Colombo Taxi, we believe in transparent pricing. When hiring a vehicle with a driver, we have specific charges for their services, allowing you to easily plan and budget your trip. Our rates are competitive and offer great value for the quality of service we provide.</p>
                        <p class="mb-4">Whether you're planning to explore Colombo itself or venture out to other destinations across the island, we've got you covered. Our services are available island-wide, allowing you to conveniently travel to your desired locations without any hassle.
                                Experience convenience, reliability, and personalized service with Colombo Taxi. We are committed to making your car rental experience seamless and enjoyable, whether you choose to drive yourself or hire a professional driver. Join us and embark on unforgettable journeys across the stunning landscapes and cultural wonders of Sri Lanka.</p>
                      
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Years of</p>
                                        <h6 class="text-uppercase mb-0">Experience</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Experienced</p>
                                        <h6 class="text-uppercase mb-0">Drivers</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


       

        <!-- Footer Start -->
        <?php include_once 'footer.php'; ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include_once 'js.php'; ?>
</body>

</html>