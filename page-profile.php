<?php
/*
Template Name: Profile Page
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

if(isAdmin()){
    $results = $uow->Booking->GetAll([]);
}
elseif(isCustomer()){
    $results = $uow->Booking->GetAll(["customerId"=> getUser()->id]);
}
else{
    $results = $uow->Booking->GetAll(['ownerId'=> getUser()->id]);
}

$subscriptions  = $uow->Subscription->GetAll( isAdmin() || isCustomer() ? [] : ["ownerId"=> getUser()->id]);
$user = getUser();

$allUser = $uow->User->GetAllUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Profile | Colombo Taxi Sri Lanka</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php include_once 'css.php'; ?>
    <style>
        h1 {
  text-align: center;
}
.nav-tabs-outer{
overflow-x:scroll;
  margin: 20px;
}
.nav-tabs-outer > ul > li{
  display: block;
  width: 33.33%;
} 

.tab-content {
  background: #eee;
}
.tab-content img {
  padding: 15px;
  float: left;
}
.tab-content p {
  height: 180px;
  font-size: 18px;
  letter-spacing: 2px;
  display: flex;
  align-items: center;
}
.tab-pane:after {
  content: "";
  display: block;
  clear: both;
}

    </style>
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
                heroHeader("Personal Profile");
            ?>


        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">

            <div class="container">
                <div class="profile-area d-flex justify-content-center">
                    <table cellpadding="0" cellspacing="0" style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Raleway;">
                        <tbody>
                            <tr>
                            <td>
                                <table cellpadding="0" cellspacing="0" style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Raleway;">
                                <tbody>
                                    <tr>
                                    <td width="150" style="vertical-align: middle;"><span style="margin-right: 20px; display: block;"><img src="https://tinypic.host/images/2023/02/21/pikrepo.com-2.jpg" role="presentation" width="130" style="max-width: 130px;"></span></td>
                                    <td style="vertical-align: middle;">
                                        <h3 color="#000000" style="margin: 0px; font-size: 18px; color: rgb(0, 0, 0);">
                                        <?php echo $user->name; ?>

                                    </h3>
                                        <p color="#000000" font-size="medium" style="margin: 0px; color: rgb(0, 0, 0); font-size: 14px; line-height: 22px;">
                                            <span>
                                                <?php
                                                if(isAdmin()){
                                                    echo "Admin";
                                                }
                                                elseif(isVehicleOwner()){
                                                    echo "Vehicle Owner";
                                                }
                                                else{
                                                    echo "Customer";
                                                }
                                                ?>
                                            </span>
                                        </p>
                                        <p color="#000000" font-size="medium" style="margin: 0px; font-weight: 500; color: rgb(0, 0, 0); font-size: 14px; line-height: 22px;">
                                        <span><?php echo "User Code : #".$user->id; ?></span>
                                        </p>
                                    </td>
                                    <td width="30">
                                        <div style="width: 30px;"></div>
                                    </td>
                                    <td color="#f50606" direction="vertical" width="1" style="width: 1px; border-bottom: none; border-left: 1px solid rgb(6, 6, 6);"></td>
                                    <td width="30">
                                        <div style="width: 30px;"></div>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <table cellpadding="0" cellspacing="0" style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Raleway;">
                                        <tbody>
                                            <tr height="25" style="vertical-align: middle;">
                                            <td width="30" style="vertical-align: middle;">
                                                <table cellpadding="0" cellspacing="0" style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Raleway;">
                                                <tbody>
                                                    <tr>
                                                    <td style="vertical-align: bottom;">
                                                    <span color="#f50606" width="11" style="display: block; margin-right:10px;">
                                                    Contact
                                                </span></td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </td>
                                            <td style="padding: 0px; color: rgb(0, 0, 0);"><a  color="#000000" style="text-decoration: none; color: rgb(0, 0, 0); font-size: 12px;"><span><?php echo $user->contact; ?></span></a></td>
                                            </tr>
                                            <tr height="25" style="vertical-align: middle;">
                                            <td width="30" style="vertical-align: middle;">
                                                <table cellpadding="0" cellspacing="0" style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Raleway;">
                                                <tbody>
                                                    <tr>
                                                    <td style="vertical-align: bottom;">
                                                    <span color="#f50606" width="11" style="display: block; margin-right:10px;">
                                                    NIC
                                                </span>
                                            </td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </td>
                                            <td style="padding: 0px;"><a color="#000000" class="sc-gipzik iyhjGb" style="text-decoration: none; color: rgb(0, 0, 0); font-size: 12px;"><span><?php echo $user->nic; ?></span></a></td>
                                            </tr>
                                            <tr height="25" style="vertical-align: middle;">
                                            <td width="30" style="vertical-align: middle;">
                                                <table cellpadding="0" cellspacing="0" style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Raleway;">
                                                <tbody>
                                                    <tr>
                                                    <td style="vertical-align: bottom;">
                                                    <span color="#f50606" width="15px" style="display: block; margin-right:10px;">
                                                    Joined
                                                </span>
                                                    </td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </td>
                                            <td style="padding: 0px;"><a  color="#000000" class="sc-gipzik iyhjGb" style="text-decoration: none; color: rgb(0, 0, 0); font-size: 12px;"><span><span>
                                                <?php
                                                 $joinedOn = new DateTime($user->create_at);
                                                 $joinedOn = $joinedOn->format('Y/M/d');
                                                 echo $joinedOn; 
                                                ?>
                                            </span></a></td>
                                            </tr>

                                        </tbody>
                                        </table>
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                            </td>
                            </tr>
                            <tr>
                            <td>
                                <table cellpadding="0" cellspacing="0" style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Raleway; width: 100%;">
                                <tbody>
                                    <tr>
                                    <td height="30"></td>
                                    </tr>
                                    <tr>
                                    <td color="#f50606" direction="horizontal" height="1" style="width: 100%; border-bottom: 1px solid rgb(6, 6, 6); border-left: none; display: block;"></td>
                                    </tr>
                                    <tr>
                                    <td height="30"></td>
                                    </tr>
                                </tbody>
                                </table>
                            </td>
                            </tr>
                            <tr>
                            <td>
                                <table cellpadding="0" cellspacing="0" class="sc-gPEVay eQYmiW" style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Raleway; width: 100%;">
                                <tbody>
                                    <tr>
                                    <td style="vertical-align: top;"></td>
                                    </tr>
                                </tbody>
                                </table>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Bookings</button>
                    </li>
                    <li class="nav-item <?php echo isAdmin() || isVehicleOwner() ? '' : 'd-none';?>" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Subscriptions</button>
                    </li>
                    <li class="nav-item <?php echo isAdmin() ? '' : 'd-none';?>" role="presentation">
                        <button class="nav-link" id="pills-user-tab" data-bs-toggle="pill" data-bs-target="#pills-user" type="button" role="tab" aria-controls="pills-user" aria-selected="false">Users</button>
                    </li>
                    
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">BN</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Vehicle</th>
                                    <th scope="col">Booked From</th>
                                    <th scope="col">Booked To</th>
                                    <th scope="col">Need Ac</th>
                                    <th scope="col">Need Driver</th>
                                    <th scope="col">Customer Contact</th>
                                    <th scope="col">From Address</th>
                                    <th scope="col">To Address</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($results  as $result ){
                                    $isNeedAc= $result->isNeedAc ? 'Yes' : 'No';
                                    $isNeedDriver= $result->isNeedDriver ? 'Yes' : 'No';
                                    $needFrom = new DateTime($result->needFrom);
                                    $needFrom = $needFrom->format('Y/M/d');

                                    $needTo = new DateTime($result->needTo);
                                    $needTo = $needTo->format('Y/M/d');
                                    echo 
                                    "
                                    <tr>
                                        <th>$result->id</th>
                                        <td>$result->customerName</td>
                                        <td>$result->vehicleName</td>
                                        <td>$needFrom</td>
                                        <td>$needTo</td>
                                        <td>$isNeedAc</td>
                                        <td>$isNeedDriver</td>
                                        <td>$result->customerContact</td>
                                        <td>$result->fromAddress</td>
                                        <td>$result->toAddress</td>
                                        <td>
                                            <a href='/wordpress/remove-booking?id=$result->id' class='btn btn-danger w-auto text-white d-flex justify-content-center align-items-center'> Remove </a>
                                        </td>
                                    </tr>
                                    ";
                                }
                                
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    
                        <a class="btn btn-primary w-auto text-white d-flex justify-content-center align-items-center" href="/wordpress/manage-subscription"> Add Subscription </a>
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Owner</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Pay Date</th>
                                        <th scope="col">Reference</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($subscriptions  as $subscription ){
                                            $payDate = new DateTime($subscription->create_at);
                                            $payDate = $payDate->format('Y/M/d');
                                            echo 
                                            "<tr>
                                                <td>$subscription->ownerName</td>
                                                <td>$subscription->amount</td>
                                                <td>$payDate</td>
                                                <td>$subscription->reference</td>
                                                <td>
                                                    <a class='btn btn-primary w-auto text-white d-flex justify-content-center align-items-center' href='/wordpress/manage-subscription?id=$subscription->id' > Edit </a>
                                                </td>
                                            </tr>
                                            
                                            ";
                                        }   
                                    ?>

                                </tbody>
                        </table>
                    </div>
                    
                    <div class="tab-pane fade" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
                    <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">NIC</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($allUser  as $u ){
                                            $userType = $u->userType == 2 ? 'Customer' : 'Vehicle Owner';
                                            echo 
                                            "<tr>
                                                <td>$u->id</td>
                                                <td>$u->name</td>
                                                <td>$u->userName</td>
                                                <td>$userType</td>
                                                <td>$u->nic</td>
                                                <td>$u->contact</td>
                                                <td>
                                                    <a class='btn btn-danger w-auto text-white d-flex justify-content-center align-items-center' href='/wordpress/remove-user?id=$u->id' > Remove </a>
                                                </td>
                                            </tr>
                                            
                                            ";
                                        }   
                                    ?>

                                </tbody>
                        </table>
                    </div>
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