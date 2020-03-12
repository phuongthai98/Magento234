<?php


namespace Training\Vendors\Model\Vendors;

use Training\Vendors\Model\ResourceModel\Vendors\CollectionFactory;
use Training\Vendors\Model\Vendors;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $vendorsCollectionFactory,
        array $meta = [],
        array $data = []
    ){
        $this->collection = $vendorsCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(isset($this->_loadedData)) {
            return $this->_loadedData;
        }

        $items = $this->collection->getItems();

        foreach($items as $vendors)
        {
            $this->_loadedData[$vendors->getId()] = $vendors->getData();
        }

        return $this->_loadedData;
    }

}
