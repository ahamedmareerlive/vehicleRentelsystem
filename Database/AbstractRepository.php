<?php

abstract class AbstractRepository{
    public $_context;
    public function __construct($context){
        $this->_context = $context;
    }
}

?>
