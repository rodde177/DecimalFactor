<?php

class Acuna_MultiplySum_Helper_Data extends Mage_Core_Helper_Abstract
{
    const DEFAULT_DECIMAL_FACTOR = 1;

    public function isEnabled($store = null)
    {
        return Mage::getStoreConfigFlag('multiplysum/general/enabled', $store);
    }

    /**
     * Just check if there's a value, validate in system.xml, else use 1 as fallback
     * Global value right now...
     */
    public function getDecimalFactor()
    {
        $decimalFactor = Mage::getStoreConfig('multiplysum/general/decimal_factor');
        return strlen($decimalFactor) > 0 ? $decimalFactor: self::DEFAULT_DECIMAL_FACTOR;
    }
}