<?php
   /*
   Template Name: Manage Vehicle Page
   */
?>

<?php include_once 'topnav.php'; ?>
<?php include_once 'Database/UnitOfWork.php'; ?>

<?php 
include_once "util/core.php";
startSession();

$isEdit = isset($_GET['id']);
$uow = Uow::context();

$vehicleResult =(object) [
    'vType'=>'car',
    'seatCount'=>2,
    'acCharges'=> null,
    'driverCharges'=>null,
    'price'=>0,
    'name'=>"",
    "ownerId"=> getUser()->id
];

if($isEdit){
    $vehicleResult = $uow->Vehicle->Get($_GET['id'])[0];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manage Vehicle | Colombo Taxi Sri Lanka</title>
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
                heroHeader("Manage Vehicle");
            ?>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <form class="p-5" id="vehicle-form" method="POST" enctype="multipart/form-data">
                    <?php 
                        echo $isEdit ? "<input type='number' name='id' value='{$vehicleResult->id}' hidden/>" : "";
                    ?>
                    
                    <input type='number' name='ownerId' value="<?php echo $vehicleResult->ownerId; ?>" hidden/>

                    <div class="d-flex justify-content-end">
                        <?php echo $isEdit ? "<a href='/wordpress/remove-vehicle?id=$vehicleResult->id' class='btn btn-danger w-auto text-white d-flex justify-content-center align-items-center'> Delete Vehicle </a>" : ""; ?>
                    </div>
                    
                    <div class="d-flex flex-wrap">
                        <div class="form-group m-3">
                            <label for="inputEmail4">Vehicle Type</label>
                            <select class="form-select w-auto" name="vType">
                                <option class="car" <?php echo $vehicleResult->vType=="car" ? "selected" : ""; ?> >CAR</option>
                                <option class="van" <?php echo $vehicleResult->vType=="van" ? "selected" : ""; ?> >VAN</option>
                            </select>
                        </div>
                        <div class="form-group m-3">
                            <label>Vehicle Name</label>
                            <input type="text" class="form-control" value="<?php echo $vehicleResult->name; ?>" id="vName" name="vName">
                        </div>
                        <div class="form-group m-3">
                            <label>Price</label>
                            <input type="number" class="form-control" value="<?php echo $vehicleResult->price; ?>" id="price" name="price">
                        </div>
                        <div class="form-group m-3">
                            <label>Seat Count</label>
                            <input type="number" min="2" class="form-control" value="<?php echo $vehicleResult->seatCount; ?>" id="seatCount" name="seatCount">
                        </div>
                        <div class="form-group m-3">
                            <label>AC Charge</label>
                            <input type="number" class="form-control" value="<?php echo $vehicleResult->acCharges; ?>" id="acCharges" name="acCharges">
                        </div>
                        <div class="form-group m-3">
                            <label>Driver Charge</label>
                            <input type="number" class="form-control" value="<?php echo $vehicleResult->driverCharges; ?>" id="driverCharges" name="driverCharges">
                        </div>

                        <div class="form-group m-3">
                            <label>Vehicle Image</label>
                            <input type="file" class="form-control" accept="image/png, image/jpeg" name="image">
                        </div>

                        <div class="form-group m-3">
                            <input type="submit" style="margin-top: 30px;" class="btn btn-primary w-auto" value="Save Changes" name="save">
                        </div>
                    </div>
                </form>
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

    <?php
        if(isset($_POST['save'])){
            $isEdit = !empty($_POST['id']);
            unset($_POST['save']);
            $uow = Uow::context();

            if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK ) {
                $blob = base64_encode( file_get_contents( $_FILES['image']['tmp_name'] ) );
                $_POST['image'] = $blob;
            }
            else{
                if($isEdit){
                    $_POST['image'] = $uow->Vehicle->Get($_POST['id'])[0]->image;
                }
                else{
                    if($_POST['vType']=="CAR"){
                        $_POST['image'] = "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";
                    }
                    else{
                        $_POST['image'] = "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";
                    }
                    
                }
                
            }
            
            $isSave = $isEdit ? $uow->Vehicle->UpdateVehicle($_POST) : $uow->Vehicle->AddVehicle($_POST);

            if($isSave){
                if(!$isEdit){
                    pageRedirect("vehicle");
                }
                else{
                    pageRedirect("manage-vehicle/?id=".$_POST['id']);
                }
                  
            }
            
        }
    ?>


    <script type="text/javascript">
        window.onload=()=>{
            $("#vehicle-form").validate({
                rules:{
                    vName: "required",
                    seatCount : {required:true, min: 2},
                    price : {required:true, min: 1}
                },
                messages:{
                    vName : "required*",
                    price : "required*",
                    seatCount : {
                        required: "required*",
                        min: "Seat count least 2"
                    },
                    price : {
                        required: "required*",
                        min: "Price least 1"
                    },
                },
                errorElement: "div"
            });
        };
    </script>

</body>

</html>