<?php
include_once "AbstractRepository.php";

class VehicleRepository extends AbstractRepository{
    public function __construct($context)
    {
        parent::__construct($context);
    }

    public function AddVehicle($vehicle){
        $entity = $this->ToEntity($vehicle);
        return $this->_context->insert('vbs_vehicle', $entity);
    }

    public function UpdateVehicle($vehicle){
        $entity = $this->ToEntity($vehicle);
        return $this->_context->update('vbs_vehicle', $entity ,  ['id' => $vehicle['id']]);
    }

    public function GetAll($option){
        $whereConditions = [];
        $q="SELECT vbs_vehicle.*, vbs_user.name as ownerName FROM vbs_vehicle JOIN vbs_user ON vbs_vehicle.ownerId=vbs_user.id";
        $whereQuery = "";

        if(!empty($option)){
            if(isset($option['q']) && !empty($option['q']) ){
                array_push($whereConditions, "vbs_vehicle.name LIKE '%{$option['q']}%'");
            }
            if(isset($option['type']) && !empty($option['type'])){
                array_push($whereConditions, "vType='{$option['type']}'");
            }
            if(isset($option['id']) && !empty($option['id'])){
                array_push($whereConditions, "ownerId={$option['id']}");
            }
        }

        for($i=0; $i < count($whereConditions); $i++){
            if($i== count($whereConditions) - 1){
                $whereQuery .= $whereConditions[$i];
            }
            else{
                $whereQuery .= $whereConditions[$i]. " AND ";
            }
        }

        if(!empty($whereQuery)){
            $q = $q . " WHERE ". $whereQuery;
        }

        return $this->_context->get_results($q);
    }

    public function Get($id){
        return $this->_context->get_results("SELECT * FROM vbs_vehicle WHERE id=$id");
    }

    public function Remove($id){
        $result = $this->_context->delete( 'vbs_vehicle', ['id' => $id]);
        $this->_context->delete( 'vbs_booking', ['vehicleId' => $id]);
        return $result;
    }

    private function ToEntity($source){
        $entity = [];
        $entity['name'] = $source['vName'];
        $entity['seatCount'] = $source['seatCount'];
        $entity['acCharges'] = $source['acCharges'];
        $entity['driverCharges'] = $source['driverCharges'];
        $entity['price'] = $source['price'];
        $entity['vType'] = $source['vType'];
        $entity['ownerId'] = $source['ownerId'];
        $entity['image'] = $source['image'];
        return $entity;
    }

}

?>