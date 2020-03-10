<?php
namespace Training\Vendors\Model;
class Vendors extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'training_vendors';

    protected $_cacheTag = 'training_vendors';

    protected $_eventPrefix = 'training_vendors';

    protected function _construct()
    {
        $this->_init('Training\Vendors\Model\ResourceModel\Vendors');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
