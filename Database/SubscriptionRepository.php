<?php
include_once "AbstractRepository.php";

class SubscriptionRepository extends AbstractRepository{
    public function __construct($context)
    {
        parent::__construct($context);
    }

    public function AddSubscription($subscriptions){
        $entity = $this->ToEntity($subscriptions);
        return $this->_context->insert('vbs_subscription', $entity);
    }

    public function UpdateSubscription($subscriptions){
        $entity = $this->ToEntity($subscriptions);
        return $this->_context->update('vbs_subscription', $entity ,  ['id' => $subscriptions['id']]);
    }

    public function GetAll($option){
        $q="SELECT vbs_subscription.*, vbs_user.name as ownerName FROM vbs_subscription JOIN vbs_user ON vbs_subscription.ownerId=vbs_user.id";

        if(!empty($option)){
            $q .= " WHERE vbs_subscription.ownerId=".$option['ownerId'];
        }

        return $this->_context->get_results($q);
    }

    public function Get($id){
        return $this->_context->get_results("SELECT * FROM vbs_subscription WHERE id=$id");
    }

    public function Remove($id){
        $result = $this->_context->delete( 'vbs_subscription', ['id' => $id]);
        return $result;
    }

    private function ToEntity($source){
        $entity = [];
        $entity['ownerId'] = $source['ownerId'];
        $entity['amount'] = $source['amount'];
        $entity['create_at'] = $source['create_at'];
        $entity['reference'] = $source['reference'];
        return $entity;
    }

}

?>