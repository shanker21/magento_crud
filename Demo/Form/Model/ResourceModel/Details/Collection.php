<?php 
namespace Demo\Form\Model\ResourceModel\Details;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
	public function _construct(){
		$this->_init("Demo\Form\Model\Details","Demo\Form\Model\ResourceModel\Details");
	}
}
 ?>
