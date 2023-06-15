<?php
namespace Demo\Form\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Demo\Form\Model\ResourceModel\Details\CollectionFactory;

class Home extends Template
{ 
    private $collectionFactory;
    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ){
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);

    }
    public function getAlldetails()
    {
        return $this->collectionFactory->create();
    }

}