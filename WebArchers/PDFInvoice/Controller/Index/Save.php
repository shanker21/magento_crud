<?php

declare(strict_types=1);

namespace WebArchers\PDFInvoice\Controller\Index;

use WebArchers\PDFInvoice\Model\PdfinvoiceFactory;
use WebArchers\PDFInvoice\Model\ResourceModel\Pdfinvoice as PdfinvoiceResourceModel;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;

class Save extends Action 
{
    protected $pdfinvoiceFactory;
    protected $pdfinvoiceResource;
    protected $jsonFactory;
    protected $resultRedirectFactory;
    protected $messageManager;

    public function __construct(
        Context $context,
        PdfinvoiceFactory $pdfinvoiceFactory,
        PdfinvoiceResourceModel $resource,
        JsonFactory $resultJsonFactory,
        RedirectFactory $resultRedirectFactory,
        ManagerInterface $messageManager
    ) {
        parent::__construct($context);
        $this->pdfinvoiceFactory = $pdfinvoiceFactory;
        $this->resource = $resource;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->messageManager = $messageManager;
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $params = $this->getRequest()->getParams();
        //var_dump($params);
        $model = $this->pdfinvoiceFactory->create()->setData($params);

        try {
            $this->resource->save($model);
            $this->messageManager->addSuccessMessage(__("Data has been saved successfully"));    
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Something went wrong'));
        }
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('pdfinvoice/index/showdata');
        return $redirect;

        
    }
       
}
