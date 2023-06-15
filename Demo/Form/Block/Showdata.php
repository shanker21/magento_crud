<?php

namespace Demo\Form\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Demo\Form\Model\ResourceModel\Details\CollectionFactory;
 
class Showdata extends Template
{
    private $collectionFactory;

    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getAlldetails()
    {
        return $this->collectionFactory->create();
    }
    public function getDeleteAction()
    {
        return $this->getUrl('form/index/delete', ['_secure' => true]);
    }   
    public function getEditAction()
    {
        return $this->getUrl('form/index/details',['_secure' =>true]);
    }
    
}