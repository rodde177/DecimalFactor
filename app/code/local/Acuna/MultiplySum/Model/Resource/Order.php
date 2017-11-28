<?php

class Acuna_MultiplySum_Model_Resource_Order 
    extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Init the main table and id field name
     */
    protected function _construct()
    {
        $this->_init('multiplysum/order', 'id');
    }
}