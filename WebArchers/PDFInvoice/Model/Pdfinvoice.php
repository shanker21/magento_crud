<?php

namespace WebArchers\PDFInvoice\Model;

use Magento\Framework\Model\AbstractModel;

use WebArchers\PDFInvoice\Model\ResourceModel\Pdfinvoice as PdfinvoiceResourceModel;

class Pdfinvoice extends AbstractModel
{
	
	protected function _construct()
    {
        $this->_init(PdfinvoiceResourceModel::class);
    }
    
}