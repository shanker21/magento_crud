<?php

namespace WebArchers\PDFInvoice\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Pdfinvoice extends AbstractDb
{
    protected function _construct()
    {
        //call table name and primary id
        $this->_init('web_contact', 'id');
    }

}