<?php

namespace WebArchers\PDFInvoice\Controller\Index;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use WebArchers\PDFInvoice\Model\PdfinvoiceFactory;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Session\SessionManagerInterface;

class Login extends Action
{
    protected $_pageFactory;
    protected $pdfinvoiceFactory;
    protected $resultRedirectFactory;
    protected $sessionManager;
    public function __construct(
         Context $context,
         SessionManagerInterface $sessionManager,
         PdfinvoiceFactory $pdfinvoiceFactory,
         PageFactory $pageFactory,
         RedirectFactory $resultRedirectFactory
         )
        {
            $this->_pageFactory = $pageFactory;
            $this->pdfinvoiceFactory = $pdfinvoiceFactory;
            $this->resultRedirectFactory = $resultRedirectFactory;
            $this->sessionManager = $sessionManager;
            
            return parent::__construct($context);
        }
        public function execute()
        {
            // Start the session
        $this->sessionManager->start();
             // Check if the user is already logged in
             $isLoggedIn = $this->sessionManager->isLoggedIn();


            if ($isLoggedIn) {
                // User is already logged in, redirect to the welcome page
                $redirect = $this->resultRedirectFactory->create();
                $redirect->setPath('pdfinvoice/index/welcome');
                return $redirect;
            }
                $params = $this->getRequest()->getParams();
    
                // Retrieve the email and password values from the request parameters
                $email = isset($params['email_id']) ? $params['email_id'] : '';
               
                $password = isset($params['password']) ? $params['password'] : '';
                
                // Load the model by email
                $model = $this->pdfinvoiceFactory->create();
                $model->load($email, 'email_id');

                // If the login is successful
                if ($model->getId() && $model->getPassword() === $password) {
                    $firstName = $model->getFirstName();
                    $lastName = $model->getLastName();

                    //store the value in session
                    // Store the login status in the session
                        
                    $this->sessionManager->setFirstName($firstName);
                    $this->sessionManager->setLastName($lastName);
            
                    $redirect = $this->resultRedirectFactory->create();
                    $redirect->setPath('pdfinvoice/index/welcome');
                    return $redirect;    
                } else {
                    // Login failed, display an error message
                    $this->messageManager->addWarning(__("Warning"));
                }
            
            
            return $this->_pageFactory->create();
        }

}

