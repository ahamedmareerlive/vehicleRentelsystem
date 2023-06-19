<?php
   /*
   Template Name: Manage Subscriptions Page
   */
?>

<?php include_once 'topnav.php'; ?>
<?php include_once 'Database/UnitOfWork.php'; ?>
<?php include_once 'util/core.php'; ?>
<?php startSession(); ?>
<?php 


$isEdit = isset($_GET['id']);
$uow = Uow::context();

$subscriptionsResult =(object) [
    'reference'=>null,
    'amount'=>0,
    'create_at'=>date('Y-m-d'),
    "ownerId"=> getUser()->id
];

if($isEdit){
    $subscriptionsResult = $uow->Subscription->Get($_GET['id'])[0];
    $create_at = new DateTime($subscriptionsResult->create_at);
    $subscriptionsResult->create_at = $create_at->format('Y-m-d');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manage Subscriptions | Colombo Taxi Sri Lanka</title>
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
                topNav('profile'); 
                heroHeader("Manage Subscriptions");
            ?>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <form class="p-5" id="subscriptions-form" method="POST">
                    <?php 
                        echo $isEdit ? "<input type='number' name='id' value='{$subscriptionsResult->id}' hidden/>" : "";
                    ?>
                    
                    <input type='number' name='ownerId' value="<?php echo $subscriptionsResult->ownerId; ?>" hidden/>

                    <div class="d-flex justify-content-end">
                        <?php echo $isEdit ? "<a  class='btn btn-danger w-auto text-white d-flex justify-content-center align-items-center' href='/wordpress/remove-subscription?id=$subscriptionsResult->id' > Delete Subscription </a>" : ""; ?>
                    </div>
                    
                    <div class="d-flex flex-wrap">
                        <div class="form-group m-3">
                            <label>Amount</label>
                            <input type="number" class="form-control" value="<?php echo $subscriptionsResult->amount; ?>" id="amount" name="amount">
                        </div>
                        <div class="form-group m-3">
                            <label>Reference</label>
                            <input type="text" class="form-control" value="<?php echo $subscriptionsResult->reference; ?>" id="reference" name="reference">
                        </div>
                        <div class="form-group m-3">
                            <label>Pay Date</label>
                            <input type="date" class="form-control" id="create_at" name="create_at" value="<?php echo $subscriptionsResult->create_at; ?>">
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

            $isSave = $isEdit ? $uow->Subscription->UpdateSubscription($_POST) : $uow->Subscription->AddSubscription($_POST);

            if($isSave){
                if(!$isEdit){
                    pageRedirect("profile");
                }
                else{
                    pageRedirect("manage-subscription/?id=".$_POST['id']);
                }
            }
        }
    ?>


    <script type="text/javascript">
        window.onload=()=>{
            $("#subscriptions-form").validate({
                rules:{
                    create_at: "required",
                    reference :"required",
                    amount : {required:true, min: 1}
                },
                messages:{
                    reference : "required*",
                    create_at : "required*",
                    amount : {
                        required: "required*",
                        min: "Amount least Rs 1.00"
                    },
                },
                errorElement: "div"
            });
        };
    </script>

</body>

</html>