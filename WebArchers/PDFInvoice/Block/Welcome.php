<?php

namespace WebArchers\PDFInvoice\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use WebArchers\PDFInvoice\Model\ResourceModel\Pdfinvoice\CollectionFactory;
class Welcome extends Template
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
    public function getAllPdfInvoice()
    {
        return $this->collectionFactory->create();
    }

}