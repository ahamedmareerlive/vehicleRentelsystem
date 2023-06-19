<?php
   /*
   Template Name: Book Vehicle Page
   */
?>

<?php 
include_once 'util/core.php';
startSession(); 
?>
<?php include_once 'topnav.php'; ?>
<?php include_once 'Database/UnitOfWork.php'; ?>

<?php 
$uow = Uow::context();
$selectedVehicle = $uow->Vehicle->Get($_GET['id'])[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Book The Vehicle | Colombo Taxi Sri Lanka</title>
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
                topNav('vehicle'); 
                heroHeader("Book Your Vehicle");
            ?>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Reservation Start -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="video">
                        <img class="w-100 h-100" src="https://media.istockphoto.com/id/1313215118/photo/your-new-car-key.jpg?b=1&s=170667a&w=0&k=20&c=uaXD3pMgxxsB8vTDsFhzPHJksz-GNx--hq7at2jKZa8="/>
                    </div>
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                        <h1 class="text-white mb-4">Book A Vehicle</h1>
                        <form id="booking-form" method="POST">

                            <div class="row g-3">
                                <input type="number" name="vehicleId" value="<?php echo $selectedVehicle->id; ?>" hidden/>
                                <input type="number" name="customerId" value="<?php echo getUser()->id; ?>" hidden/>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" value="<?php echo $selectedVehicle->name; ?>" class="form-control" readonly/>
                                        <label>Vehicle Name</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating date">
                                        <input type="date" name="needFrom" min="<?php echo date("Y-m-d"); ?>" value="<?php echo date('Y-m-d'); ?>"  class="form-control" id="needFrom" placeholder="Date & Time"/>
                                        <label for="needFrom">Need From</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date">
                                        <input type="date" name="needTo" min="<?php echo date("Y-m-d"); ?>" value="<?php echo date('Y-m-d'); ?>"  class="form-control" id="needTo" placeholder="Date & Time" />
                                        <label for="needTo">Need To</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="isNeedAc">
                                          <option value="1">Yes</option>
                                          <option value="0">No</option>
                                        </select>
                                        <label for="select1">Need Ac</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="isNeedDriver">
                                          <option value="1">Yes</option>
                                          <option value="0">No</option>
                                        </select>
                                        <label for="select1">Need Driver</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="fromAddress" required/>
                                        <label>From Address</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="toAddress" required/>
                                        <label>To Address</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <input class="btn btn-primary w-100" type="submit" name="save" value="Book Now">
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservation Start -->
        


        <!-- Footer Start -->
             <?php include_once 'footer.php'; ?>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include_once 'js.php'; ?>

    <?php
        if(isset($_POST['vehicleId'])){
            $uow = Uow::context();
            $uow->Booking->AddBooking($_POST);
            pageRedirect("profile");
        }
    ?>


    <script type="text/javascript">
        window.onload=()=>{
            $("#booking-form").validate({
                rules:{
                    needFrom: "required",
                    needTo : "required",
                },
                messages:{
                    needTo : "required*",
                    needFrom : "required*"
                },
                errorElement: "div",
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    var needFrom = $('input[name="needFrom"]').val();
                    var needTo = $('input[name="needTo"]').val();
                    var vehicleId = $('input[name="vehicleId"]').val();

                    const endPoint = window.location.protocol + "//" + window.location.host + "/wordpress";

                    $.ajax({url: `${endPoint}/checkBookingDate/?needFrom=${needFrom}&needTo=${needTo}&vehicleId=${vehicleId}` , method:'GET',dataType:'json',success:({isAllowed})=>{
                        if(isAllowed){
                            form.submit();
                        }
                        else{
                            alert("This booking date is already booked. Please select another date range");
                        }
                    }});

                }
            });
        };
    </script>

</body>

</html>