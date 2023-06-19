<?php
   /*
   Template Name: Vehicle Page
   */
?>

<?php include_once 'topnav.php'; ?>
<?php include_once 'Database/UnitOfWork.php'; ?>
<?php include_once 'util/core.php'; ?>
<?php
startSession(); 
$uow = Uow::context();
$results  = $uow->Vehicle->GetAll($_GET);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pick Your Favourite Vehicle | Colombo Taxi Sri Lanka</title>
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
                heroHeader("Vehicle");
            ?>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">

                <div class="wrapper h-auto">
                    <div class="card mb-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <form class="d-flex w-75 align-items-center">
                                <select class="form-select w-auto" name="type">
                                    <option value="">-- choose one --</option>
                                    <option value="car" <?php echo isset($_GET['type']) && $_GET['type']=="car" ? "selected" : ""; ?> >CAR</option>
                                    <option value="van" <?php echo isset($_GET['type']) && $_GET['type']=="van" ? "selected" : ""; ?> >VAN</option>
                                </select>
                                <input type="text" class="form-control w-50" placeholder="search!" name="q" value="<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>">
                                <div class="form-group form-check d-flex align-items-center m-2">
                                    <?php
                                        if(isLogin() && !isCustomer()){
                                            $isCheckedMy = isset($_GET['id']) ? 'checked' :'';
                                            $isCheckedMyID = getUser()->id;
                                            echo "
                                                <input type='checkbox' name='id' class='form-check-input' value='$isCheckedMyID' $isCheckedMy>
                                                <label class='form-check-label' style='margin-left: 5px; margin-top:5px;'>My</label>
                                            ";
                                        }
                                    ?>
                                    
                                </div>
                                <input type="submit" class="btn btn-light border" value="Filter"/>
                                <a href="/wordpress/vehicle" class="btn btn-danger d-flex justify-content-center align-items-center">Reset</a>
                            </form>
                            <?php
                                echo isLogin() && !isCustomer() ? "<a href='/wordpress/manage-vehicle' class='btn btn-primary w-auto text-white d-flex justify-content-center align-items-center'> Add Vehicle </a>" : "";
                            ?>
                            
                        </div>
                    </div>

                    <?php  
                    foreach($results  as $result ){
                        $isAc = $result->acCharges ? $result->acCharges : 'No';
                        $isDriver = $result->driverCharges ? $result->driverCharges : 'No';  
                        $ManageVehicle = isAdmin() || (isVehicleOwner() &&  $result->ownerId == getUser()->id) ? "<a href='/wordpress/manage-vehicle?id=$result->id' target='_blank' class='btn secondary'>Manage</a>": "";
                        $BookVehicle = isCustomer() ?  "<a href='/wordpress/book-vehicle?id=$result->id' target='_blank' class='btn primary'>Book</a>" : "";
                        echo 
                        "
                        <div class='vehicle-card'>
                            <div class='details'>
                                <div class='thumb-gallery'>
                                    <img class='first' src='data:image/jpeg;base64,$result->image' />
                                </div>
                                <div class='info'>
                                    <h3>$result->name</h3>
                                    <div class='price'>
                                        <span>Price Starting at</span>
                                        <h4>Rs $result->price / Km</h4>
                                    </div>
                            
                                    <div class='ctas'>
                                        $BookVehicle
                                        $ManageVehicle
                                        <div style='clear:both;'></div>
                                    </div>

                                    <div class='specs'>
                                        <div class='spec mpg'>
                                            <span>Seats</span>
                                            <p>$result->seatCount</p>
                                        </div>

                                        <div class='spec mpg'>
                                            <span>Type</span>
                                            <p>$result->vType</p>
                                        </div>
                                        
                                        <div class='spec mpg'>
                                            <span>AC</span>
                                            <p>$isAc</p>
                                        </div>

                                        <div class='spec mpg'>
                                            <span>Driver</span>
                                            <p>$isDriver</p>
                                        </div>
                                        
                                        <div class='spec mpg'>
                                            <span>Owner</span>
                                            <p>$result->ownerName</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        ";
                    }
                    ?>

                </div>

            </div>
        </div>
        <!-- Contact End -->

        <!-- Footer Start -->
        <?php include_once 'footer.php'; ?>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include_once 'js.php'; ?>
</body>

</html>