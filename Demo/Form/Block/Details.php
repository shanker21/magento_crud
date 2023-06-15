<?php
namespace Demo\Form\Block;
use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Demo\Form\Model\DetailsFactory;

class Details extends Template
{   
    private $detailsFactory;

    public function __construct(DetailsFactory $detailsFactory, Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->detailsFactory = $detailsFactory;
    }

    public function getAllData()
    {
        $id = $this->getRequest()->getParam("id");
        $model = $this->detailsFactory->create();
        return $model->load($id);
    }
}
    

