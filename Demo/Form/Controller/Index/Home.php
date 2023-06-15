<?php
namespace Demo\Form\Controller\Index;

class Home extends \Magento\Framework\App\Action\Action

{
   protected $resultPageFactory;
   protected $sessionManager;
   public function __construct(
   \Magento\Framework\App\Action\Context $context,
   \Magento\Framework\View\Result\PageFactory $resultPageFactory,
   \Magento\Customer\Model\Session $session)
    {
      $this->resultPageFactory = $resultPageFactory;
      $this->_session = $session;
      parent::__construct($context);
    }
    public function execute()
    {
      $firstName = $this->_session->getFirstName();
    $lastName = $this->_session->getLastName();

     $resultPage = $this->resultPageFactory->create();

    $block = $resultPage->getLayout()->getBlock('home.block');
    if ($block) {
        $block->setData('first_name', $firstName);
        $block->setData('last_name', $lastName);
      }

      return $resultPage;
  }
  
  }
