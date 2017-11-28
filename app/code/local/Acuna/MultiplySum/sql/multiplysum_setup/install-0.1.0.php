<?php

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

/* var $connection Varien_Db_Adapter_Pdo_Mysql */
$connection = $installer->getConnection();

$multiplySumOrderDataTable = $installer->getTable('multiplysum/order');
// Table 'multiplysum/order'
if (!$installer->getConnection()->isTableExists($multiplySumOrderDataTable)) 
{
    $table = $installer->getConnection()
        ->newTable($multiplySumOrderDataTable)
        ->addColumn(
            'id',
            Varien_Db_Ddl_Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary'  => true
            ]
            , 'The table\'s PK'
        )
        ->addColumn(
            'order_id',
            Varien_Db_Ddl_Table::TYPE_INTEGER,
            null,
            [
                'unsigned' => true,
                'nullable' => false
            ]
            , 'Order ID'
        )
        ->addColumn(
            'multiplied_sum',
            Varien_Db_Ddl_Table::TYPE_VARCHAR, 
            255,  
            []
            , 'Order sum multiplied by decimal factor'
        )
        ->addColumn(
            'created_at', 
            Varien_Db_Ddl_Table::TYPE_TIMESTAMP, 
            null, 
            ['nullable' => false]
            , 'Created At'
        )
    ;
    // Create Table
    $installer->getConnection()->createTable($table);
}

$installer->endSetup();