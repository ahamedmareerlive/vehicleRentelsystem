
<?php
   /*
   Template Name: checkBookingDate
   */
?>
<?php include_once 'Database/UnitOfWork.php'; ?>

<?php
    $uow = Uow::context();

    $needFrom = $_GET['needFrom'];
    $needTo = $_GET['needTo'];
    $vehicleId = $_GET['vehicleId'];

    $isAllowed = $uow->Booking->CheckDateIsAlreadyBooked($needFrom, $needTo, $vehicleId); 
    
    $jsonResponse = json_encode(['isAllowed' => $isAllowed]);
    header('Content-Type: application/json');
    echo $jsonResponse;
?>