<?php


namespace Training\Vendors\Controller\Adminhtml\Post;

class Save extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Post';

    protected $resultPageFactory;
    protected $vendorsFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Training\Vendors\Model\VendorsFactory $vendorsFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->vendorsFactory = $vendorsFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if($data)
        {
            try{
                $id = $data['id'];

                $vendors = $this->vendorsFactory->create()->load($id);

                $data = array_filter($data, function($value) {return $value !== ''; });

                $vendors->setData($data);
                $vendors->save();
                $this->messageManager->addSuccess(__('Successfully saved the item.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('training_vendors/post/index');
            }
            catch(\Exception $e)
            {
                $this->messageManager->addError($e->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('training_vendors/post/edit', ['id' => $vendors->getId()]);
            }
        }

        return $resultRedirect->setPath('training_vendors/post/index');
    }
}
