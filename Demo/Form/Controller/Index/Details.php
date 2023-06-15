<?php

namespace Demo\Form\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Result\PageFactory;
use Demo\Form\Model\DetailsFactory;

class Details extends Action
{
    protected $resultPageFactory;
    private $detailsFactory;
    private $url;

    public function __construct(UrlInterface $url, DetailsFactory $detailsFactory, Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->detailsFactory = $detailsFactory;
        $this->url = $url;
    }

    public function execute()
    {
        if ($this->isCorrectData()) {
            return $this->resultPageFactory->create();
        } else {
            $this->messageManager->addErrorMessage(__("Record Not Found"));
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->url->getUrl('form/index/showdata'));
            return $resultRedirect;
        }
    }

    public function isCorrectData()
    {
        if ($id = $this->getRequest()->getParam("id")) {
            $model = $this->detailsFactory->create();
            $model->load($id);
            if ($model->getId()) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
}