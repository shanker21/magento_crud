<?php
namespace WebArchers\PDFInvoice\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use WebArchers\PDFInvoice\Model\PdfinvoiceFactory;

class Delete extends Action
{
    protected $pdfinvoiceFactory;
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        PdfinvoiceFactory $pdfinvoiceFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->pdfinvoiceFactory = $pdfinvoiceFactory;
    }

    public function execute()
    {
        try {
            $data = $this->getRequest()->getParams();
            if (!empty($data)) {
                $model = $this->pdfinvoiceFactory->create()->load($data['id']);
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
