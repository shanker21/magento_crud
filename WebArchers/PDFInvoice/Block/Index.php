<?php

namespace WebArchers\PDFInvoice\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use WebArchers\PDFInvoice\Model\PdfinvoiceFactory;

class Index extends Template
{   
    private $pdfinvoiceFactory;

    public function __construct(PdfinvoiceFactory $pdfinvoiceFactory, Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->pdfinvoiceFactory = $pdfinvoiceFactory;
    }

    public function getFormAction()
    {
        return $this->getUrl('pdfinvoice/index/save', ['_secure' => true]);
    }

    public function getAllData()
    {
        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/web.log');
$logger = new \Zend_Log();
$logger->addWriter($writer);
$logger->info('text message');
        $id = $this->getRequest()->getParam("id");
        $logger->info($id);
        
        $model = $this->pdfinvoiceFactory->create();
        return $model->load($id);
    }
}
    

