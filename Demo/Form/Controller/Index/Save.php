<?php 

namespace Demo\Form\Controller\Index;
use Demo\Form\Model\DetailsFactory;
use Demo\Form\Model\ResourceModel\Details as DetailsResourceModel;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;

class Save extends Action 
{
    protected $detailsFactory;
    protected $detailsResource;
    protected $jsonFactory;
    protected $resultRedirectFactory;
    protected $messageManager;

    public function __construct(
        Context $context,
        DetailsFactory $detailsFactory,
        DetailsResourceModel $resource,
        JsonFactory $resultJsonFactory,
        RedirectFactory $resultRedirectFactory,
        ManagerInterface $messageManager
    ) {
        parent::__construct($context);
        $this->detailsFactory = $detailsFactory;
        $this->resource = $resource;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->messageManager = $messageManager;
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $params = $this->getRequest()->getParams();
        $model = $this->detailsFactory->create()->setData($params);

        try {
            $this->resource->save($model);
            $this->messageManager->addSuccessMessage(__("Data has been saved successfully"));    
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Something went wrong'));
        }
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('form/index/login');
        return $redirect;

        
    }
       
}
