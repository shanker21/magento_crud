<?php

namespace Demo\Form\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Demo\Form\Model\DetailsFactory;
use Magento\Framework\UrlInterface;

class Delete extends Action
{
    protected $detailsFactory;
    protected $resultPageFactory;
    protected $url;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        DetailsFactory $detailsFactory,
        UrlInterface $url
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->detailsFactory = $detailsFactory;
        $this->url = $url;
    }

    public function execute()
    {
        try {
            $data = $this->getRequest()->getParams();
            if (!empty($data)) {
                $model = $this->detailsFactory->create()->load($data['id']);
                $model->delete();
                $this->messageManager->addSuccessMessage(__("Record Delete Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can't delete the record. Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
    }
}
