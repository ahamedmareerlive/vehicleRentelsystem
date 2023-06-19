<!DOCTYPE html>
<html lang="en">
<?php 
include_once 'util/core.php';
include_once 'topnav.php';
startSession(); 
?>

<head>
    <meta charset="utf-8">
    <title>Colombo Taxi Sri Lanka</title>
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

            <?php topNav('home');?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">Pick Your<br>Favourite Vehicle</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2" style="text-align: justify;">
                            Welcome to our premier online vehicle rental website, specializing in reliable vans and cars for all your transportation needs. We understand that having the right vehicle is crucial, whether you're moving houses, planning a family trip,
                             or simply need a reliable set of wheels for your daily commute. With our extensive fleet of vans and cars, you can choose from a variety of sizes and models to suit your specific requirements. Our user-friendly platform makes booking quick and easy, ensuring that you can secure the perfect vehicle for your next adventure with just a few clicks. Experience convenience, flexibility, and exceptional customer service as you embark on your journey with our trusted online vehicle rental service.
                            </p>
                            <a href="/wordpress/vehicle" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Explore Vehicle!</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="img/hero.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

                <!-- Service Start -->
                <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-car text-primary mb-4"></i>
                                <h5>Flexible rentals</h5>
                                <p>Cancel your booking at any time, free of charge, and customize the duration of your rental to fit your plans. Enjoy peace of mind with our hassle-free cancellation policy. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x  fa-industry text-primary mb-4"></i>
                                <h5>No hidden fees</h5>
                                <p> When you choose our services, you can trust that the price you are quoted is the final price you'll pay. Know exactly what you are paying.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-dollar-sign text-primary mb-4"></i>
                                <h5>Price Match Guarantee</h5>
                                <p> We are committed to offering you the best prices in the market, and beat any competitor's price for the same Vehicle or service.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                <h5>24/7 Service</h5>
                                <p>Our dedicated team is available at any hour to address your needs and ensure that you receive prompt and reliable service. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
        
      <!-- Team Start -->
      <div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Day Based Plan</h5>
                    <h1 class="mb-5">Special Offers</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/Template/img/cla 200.jpg" alt="">
                            </div>
                            <h5 class="mb-0">Mercedes-Benz CLA-200 AMG</h5>
                            <small>25000/= per Day <br> Contact - 0775463721</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/Template/img/vazel.jpg" alt="">
                            </div>
                            <h5 class="mb-0">Honda Vezel  RS 2019 White</h5>
                            <small>15000/= per Day <br> Contact - 0775458971</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/Template/img/crown.jpg"  alt="">
                            </div>
                            <h5 class="mb-0">Toyota Crown <br> White </h5>
                            <small>30000/= per Day <br> Contact - 0774906431</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/Template/img/premio.jpg"   alt="">
                            </div>
                            <h5 class="mb-0">Toyota Premio G-SUPEIOR <br> White </h5>
                            <small>16000/= per Day <br> Contact - 0774906431</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->




        <!-- About Start -->
        
        <!-- About End -->


        <!-- Menu Start -->



        <!-- Reservation Start -->
       
        <!-- Reservation Start -->


  


        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
                    <h1 class="mb-5">Our Clients Say!!!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>The car rental website provided a seamless experience, with easy navigation and the perfect car for my vacation. The exceptional customer service and friendly staff made the process enjoyable. I highly recommend this service for reliable and hassle-free car rental.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="<?php echo get_stylesheet_directory_uri(); ?>/Template/img/testimonial-1.jpg"  style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Sarah</h5>
                                <small>Doctor</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>I've rented cars from various websites before, but this one exceeded all my expectations. The selection of cars was impressive, and the prices were competitive. What truly stood out was the level of transparency and no hidden fees. I will definitely be using this website for all my future car rentals. </p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="<?php echo get_stylesheet_directory_uri(); ?>/Template/img/testimonial-2.jpg"   style="width: 50px; height: 50px; ">
                            <div class="ps-3">
                                <h5 class="mb-1">George</h5>
                                <small>Farmer</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>I recently rented a van for a cross-country road trip, and I couldn't be happier with my experience. The website made it incredibly easy to find the perfect van to accommodate my family and our luggage. I highly recommend this car rental website for anyone in search of quality vehicles and excellent customer service.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="<?php echo get_stylesheet_directory_uri(); ?>/Template/img/testimonial-3.jpg"   style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Jhon</h5>
                                <small>Teacher</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>I'm a frequent traveler, and this car rental website has become my go-to platform. The convenience and reliability they offer are unmatched. I love the wide selection of cars available, from compact to luxury models. I highly recommend this website to all fellow travelers.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="<?php echo get_stylesheet_directory_uri(); ?>/Template/img/testimonial-4.jpg"   style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Sofiya</h5>
                                <small>Softwaer Engineer</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        
        <!-- Footer Start -->
        <?php include_once 'footer.php'; ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include_once 'js.php'; ?>
</body>

</html>