<?php

class Acuna_MultiplySum_Model_Observer
{

    public function saveInvoiceData(Varien_Event_Observer $observer)
    {
        if (Mage::helper('multiplysum')->isEnabled())
        {
            $invoice = $observer->getEvent()->getInvoice();
            $multipliedSum = $this->multiplySumByDecimalFactor($invoice->getGrandTotal());

            $orderData = Mage::getModel('multiplysum/order');
            $orderData->setOrderId($invoice->getIncrementId())
                ->setMultipliedSum($multipliedSum)
                ->setCreatedAt(Varien_Date::now())
                ->save();
        }
    }

    /**
     * Multiply total order amount by user defined decimal factor
     */
    private function multiplySumByDecimalFactor($orderAmount)
    {
        return $orderAmount * Mage::helper('multiplysum')->getDecimalFactor();
    }

}