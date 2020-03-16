<?php


namespace Training\Vendors\Controller\Adminhtml\Post;

use Magento\Framework\App\Action\Context;
use Training\Vendors\Model\VendorsFactory;
class SavePost extends \Magento\Framework\App\Action\Action
{
    protected $_test;
    public function __construct(
        Context $context,
        VendorsFactory $vendors
    ) {
        $this->_test = $vendors;
        parent::__construct($context);
    }
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $vendors = $this->_test->create();
        $vendors->setData($data);
        if($vendors->save()){
            $this->messageManager->addSuccessMessage(__('You saved the data.'));
        }else{
            $this->messageManager->addErrorMessage(__('Data was not saved.'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('training_vendors/post/index');
        return $resultRedirect;
    }
}
