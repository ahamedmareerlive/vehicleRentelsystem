<?php
include_once "AbstractRepository.php";

class UserRepository extends AbstractRepository{
    public function __construct($context)
    {
        parent::__construct($context);
    }

    public function AddUser($user){
        $entity = $this->ToEntity($user);
        return $this->_context->insert('vbs_user', $entity);
    }

    public function GetAllUser(){
        $q = "SELECT * FROM vbs_user WHERE userType != 1" ;
        return $this->_context->get_results($q);
    }

    public function Get($id){
        return $this->_context->get_results("SELECT * FROM vbs_user WHERE id=$id");
    }


    public function UpdateUser($user){
        $entity = $this->ToEntity($user);
        return $this->_context->update('vbs_user', $entity ,  ['id' => $user['id']]);
    }


    public function LoginUser($user){
        $userName= $user['userName'];
        $password= $user['password'];
        $q = "SELECT * FROM vbs_user WHERE userName='$userName' AND password='$password'; ";
        return $this->_context->get_results($q);
    }

    public function Remove($id){
        $user = $this->Get($id)[0];
        $result = $this->_context->delete( 'vbs_user', ['id' => $id]);
        
        if($user->userType == 2){
            $this->_context->delete( 'vbs_booking', ['customerId' => $id]);
        }
        else{
            $this->_context->delete( 'vbs_vehicle', ['ownerId' => $id]);
            $this->_context->delete( 'vbs_subscription', ['ownerId' => $id]);
        }
        return $result;
    }



    private function ToEntity($source){
        $entity = [];
        $entity['name'] = $source['fullName'];
        $entity['contact'] = $source['contact'];
        $entity['nic'] = $source['nic'];
        $entity['userName'] = $source['userName'];
        $entity['password'] = $source['password'];
        $entity['userType'] = (int)$source['userType'];
        return $entity;
    }

}

?>