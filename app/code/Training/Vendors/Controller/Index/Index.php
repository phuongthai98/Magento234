<?php
namespace Training\Vendors\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_vendorsFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Training\Vendors\Model\VendorsFactory $vendorsFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_vendorsFactory = $vendorsFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $vendors = $this->_vendorsFactory->create();
        $collection = $vendors->getCollection();
        foreach($collection as $item){
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();
        return $this->_pageFactory->create();
    }
}
