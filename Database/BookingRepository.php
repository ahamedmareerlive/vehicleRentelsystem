<?php
class BookingRepository extends AbstractRepository{
    public function __construct($context)
    {
        parent::__construct($context);
    }

    public function AddBooking($booking){
        $entity = $this->ToEntity($booking);
        return $this->_context->insert('vbs_booking', $entity);
    }

    public function GetAll($option){
        $q = "SELECT vbs_booking.*, vbs_user.name as customerName, vbs_user.contact as customerContact, vbs_vehicle.name as vehicleName  
        FROM vbs_booking
        JOIN vbs_vehicle ON vbs_booking.vehicleId=vbs_vehicle.id
        JOIN vbs_user ON vbs_booking.customerId=vbs_user.id";
        
        if(!empty($option)){
            
            if(isset($option['customerId'])){
                $q .= " WHERE vbs_booking.customerId=".$option['customerId'];
            }
            elseif(isset($option['ownerId'])){
                $q .= " WHERE vbs_vehicle.ownerId=".$option['ownerId'];
            }
            
        }
        
        return $this->_context->get_results($q);
    }

    public function CheckDateIsAlreadyBooked($needFrom, $needTo, $vehicleId){
        $q="SELECT COUNT(*) AS total FROM vbs_booking WHERE needFrom BETWEEN '$needFrom' AND '$needTo' OR needTo BETWEEN '$needFrom' AND '$needTo' AND vehicleId=$vehicleId";
        $result = $this->_context->get_results($q)[0]->total;

        if($result > 0){
            return false;
        }  
        else{
            return true;
        }
    }

    public function Remove($id){
        $result = $this->_context->delete( 'vbs_booking', ['id' => $id]);
        return $result;
    }

    private function ToEntity($source){
        $entity = [];
        $entity['vehicleId'] = $source['vehicleId'];
        $entity['customerId'] = $source['customerId'];
        $entity['isNeedAc'] = $source['isNeedAc'];
        $entity['isNeedDriver'] = $source['isNeedDriver'];
        $entity['needFrom'] = $source['needFrom'];
        $entity['needTo'] = $source['needTo'];
        $entity['fromAddress'] = $source['fromAddress'];
        $entity['toAddress'] = $source['toAddress'];
        return $entity;
    }
}

?>