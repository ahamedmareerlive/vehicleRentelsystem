<?php
global $wpdb;
include_once "UserRepository.php";
include_once "VehicleRepository.php";
include_once "BookingRepository.php";
include_once "SubscriptionRepository.php";


class Uow{
    private $_context;
    public $User;
    public $Vehicle;
    public $Booking;
    public $Subscription;

    public function __construct()
    {
        $this->_context = $GLOBALS['wpdb'];
        $this->User = new UserRepository($this->_context);
        $this->Vehicle = new VehicleRepository($this->_context);
        $this->Booking = new BookingRepository($this->_context);
        $this->Subscription = new SubscriptionRepository($this->_context);
    }
    public static function context(){
        return new Uow();
    }
}

?>