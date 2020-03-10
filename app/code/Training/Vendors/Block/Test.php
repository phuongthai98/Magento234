<?php
namespace Training\Vendors\Block;
class Test extends \Magento\Framework\View\Element\Template
{
    protected $_vendorsFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Training\Vendors\Model\VendorsFactory $vendorsFactory
    )
    {
        $this->_vendorsFactory = $vendorsFactory;
        parent::__construct($context);
    }
    public function getVendorsCollection(){
        $vendors = $this->_vendorsFactory->create();
        return $vendors->getCollection();
    }
}
