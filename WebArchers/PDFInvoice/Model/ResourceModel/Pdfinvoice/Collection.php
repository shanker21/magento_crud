<?php

namespace WebArchers\PDFInvoice\Model\ResourceModel\Pdfinvoice;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use WebArchers\PDFInvoice\Model\Pdfinvoice as PdfinvoiceModel;
use WebArchers\PDFInvoice\Model\ResourceModel\Pdfinvoice as PdfinvoiceResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(PdfinvoiceModel::class, PdfinvoiceResourceModel::class);
    }
}
