<?php

namespace WebArchers\PDFInvoice\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Result\PageFactory;
use WebArchers\PDFInvoice\Model\PdfinvoiceFactory;

class Index extends Action
{
    protected $resultPageFactory;

    private $pdfinvoiceFactory;

    private $url;

    public function __construct(UrlInterface $url, PdfinvoiceFactory $pdfinvoiceFactory, Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->pdfinvoiceFactory = $pdfinvoiceFactory;
        $this->url = $url;
    }

    public function execute()
    {
        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/webarcher.log');
$logger = new \Zend_Log();
$logger->addWriter($writer);
$logger->info('text message');
        if ($this->isCorrectData()) {
            $logger->info($this->isCorrectData());
            return $this->resultPageFactory->create();
        } else {
            $this->messageManager->addErrorMessage(__("Record Not Found"));
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->url->getUrl('pdfinvoice/index/showdata'));
            return $resultRedirect;
        }
    }

    public function isCorrectData()
    {
        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/webarchers.log');
$logger = new \Zend_Log();
$logger->addWriter($writer);
$logger->info('text message');
        if ($id = $this->getRequest()->getParam("id")) {
            $logger->info($id = $this->getRequest()->getParam("id"));
            $model = $this->pdfinvoiceFactory->create();
            $model->load($id);
            $logger->info($model->load($id),true);
            if ($model->getId()) {
                $logger->info('true');
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
}