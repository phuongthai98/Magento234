<?php


namespace Training\Vendors\Block\Adminhtml\Vendors\Edit;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic;
class ResetButton extends Generic implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Reset'),
            'on_click' => 'javascript: location.reload();',
            'class' => 'reset',
            'sort_order' => 30
        ];
    }
}
