<?php


namespace Training\Vendors\Block\Adminhtml\Vendors\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic;
class DeleteButton extends Generic implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Delete Contact'),
            'on_click' => 'deleteConfirm(\'' . __('Are you sure you want to delete this contact ?') . '\', \'' . $this->getDeleteUrl() . '\')',
            'class' => 'delete',
            'sort_order' => 20
        ];
    }

    public function getDeleteUrl()
    {
        $urlInterface = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\UrlInterface');
        $url = $urlInterface->getCurrentUrl();

        $parts = explode('/', parse_url($url, PHP_URL_PATH));

        $id = $parts[6];

        return $this->getUrl('training_vendors/post/delete', ['id' => $id]);
    }
}
