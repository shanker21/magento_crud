<?php

namespace Demo\Form\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Session\SessionManagerInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Customer\Model\Session;

class Logout extends Action
{
    protected $sessionManager;
    protected $resultRedirectFactory;
    protected $session;

    public function __construct(
        Context $context,
        SessionManagerInterface $sessionManager,
        RedirectFactory $resultRedirectFactory,
        Session $session
    ) {
        $this->sessionManager = $sessionManager;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->session = $session;
        parent::__construct($context);
    }

    public function execute()
    {
        // Clear session data
        $this->sessionManager->destroy();
        $this->session->logout();
        
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('form/index/login'); 
        return $redirect;
    }
}
