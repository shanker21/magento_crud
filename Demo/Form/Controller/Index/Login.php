<?php

namespace Demo\Form\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Demo\Form\Model\DetailsFactory;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\Data\Form\FormKey\Validator;

class Login extends Action
{
    protected $_pageFactory;
    protected $detailsFactory;
    protected $resultRedirectFactory;
    protected $formKeyValidator;
    protected $_session;
    public function __construct(
         Context $context,
         Session $session,
         DetailsFactory $detailsFactory,
         PageFactory $pageFactory,
         Validator $formKeyValidator,
         RedirectFactory $resultRedirectFactory
         )
        {
            $this->_pageFactory = $pageFactory;
            $this->detailsFactory = $detailsFactory;
            $this->resultRedirectFactory = $resultRedirectFactory;
            
            $this->formKeyValidator = $formKeyValidator;
            $this->_session = $session;
            return parent::__construct($context);
        }
        public function execute()
        {
            
             // Check if the user is already logged in
             $isLoggedIn = $this->_session->isLoggedIn();
             
            if ($isLoggedIn || !$this->formKeyValidator->validate($this->getRequest())) {
                // User is already logged in, redirect to the welcome page
                $redirect = $this->resultRedirectFactory->create();
                $redirect->setPath('form/index/home');
                return $redirect;
            } elseif ($this->getRequest()->getParam('logout')) {
                // User clicked on the logout button
                $redirect = $this->resultRedirectFactory->create();
                $redirect->setPath('form/index/login');
                return $redirect;
            }
                $params = $this->getRequest()->getParams();
    
                // Retrieve the email and password values from the request parameters
                $email = isset($params['email_id']) ? $params['email_id'] : '';
               
                $password = isset($params['password']) ? $params['password'] : '';
                
                // Load the model by email
                $model = $this->detailsFactory->create();
                $model->load($email, 'email_id');

                // If the login is successful
                if ($model->getId() && $model->getPassword() === $password) {
                    $firstName = $model->getFirstName();
                    $lastName = $model->getLastName();

                    //store the value in session    
                    $this->_session->setFirstName($firstName);
                    $this->_session->setLastName($lastName);
            
                    $redirect = $this->resultRedirectFactory->create();
                    $redirect->setPath('form/index/home');
                    return $redirect;    
                } else {
                    // Login failed, display an error message
                    $this->messageManager->addWarning(__("Warning"));
                }
            
            
            return $this->_pageFactory->create();
        }

}

