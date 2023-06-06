<?php

namespace WebArchers\PDFInvoice\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use WebArchers\PDFInvoice\Model\PdfinvoiceFactory;

class Login extends Template
{   
    private $pdfinvoiceFactory;

    public function __construct(
        PdfinvoiceFactory $pdfinvoiceFactory,
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->pdfinvoiceFactory = $pdfinvoiceFactory;
    }

    public function getFormAction()
    {
        return $this->getUrl('pdfinvoice/index/login', ['_secure' => true]);
    }
}
