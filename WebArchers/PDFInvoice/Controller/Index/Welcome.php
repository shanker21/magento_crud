<?php
namespace WebArchers\PDFInvoice\Controller\Index;

class Welcome extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $sessionManager;
    public function __construct(
    \Magento\Framework\App\Action\Context $context,
    \Magento\Framework\View\Result\PageFactory $resultPageFactory,
    \Magento\Framework\Session\SessionManagerInterface $sessionManager
    )
    {

    $this->resultPageFactory = $resultPageFactory;
    $this->sessionManager = $sessionManager;
    parent::__construct($context);
    }
    public function execute()
{
    $firstName = $this->sessionManager->getFirstName();
    $lastName = $this->sessionManager->getLastName();

     $resultPage = $this->resultPageFactory->create();
    // $resultPage->getConfig()->getTitle()->set(__('Welcome, %1 %2', $firstName, $lastName));

    $block = $resultPage->getLayout()->getBlock('welcome.block');
    if ($block) {
        $block->setData('first_name', $firstName);
        $block->setData('last_name', $lastName);
    }

    return $resultPage;
}

}