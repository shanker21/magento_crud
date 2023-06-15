<?php
namespace Demo\Form\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Demo\Form\Model\DetailsFactory;

class Login extends Template
{   
    private $detailsFactory;

    public function __construct(
        DetailsFactory $detailsFactory,
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->detailsFactory = $detailsFactory;
    }

    public function getFormAction()
    {
        return $this->getUrl('form/index/login', ['_secure' => true]);
    }
}
