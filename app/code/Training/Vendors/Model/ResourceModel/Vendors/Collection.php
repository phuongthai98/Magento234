<?php
namespace Training\Vendors\Model\ResourceModel\Vendors;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'training_vendors_collection';
    protected $_eventObject = 'vendors_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Training\Vendors\Model\Vendors', 'Training\Vendors\Model\ResourceModel\Vendors');
    }

}
