<?php
    namespace Demo\Form\Observer;

    use Magento\Framework\Event\ObserverInterface;
    use Magento\Framework\App\RequestInterface;
    class NewPrice implements ObserverInterface
    {
        public function execute(\Magento\Framework\Event\Observer $observer) {
            $item = $observer->getEvent()->getData('quote_item');   
            // var_dump($item);
            // $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/customprice.log');
            // $logger = new \Zend_Log();
            // $logger->addWriter($writer);
            // $logger->info('text message');
            // $logger->info(print_r($object->getData(), true));         
            $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
            $price = 20; 
            $item->setCustomPrice($price);
            $item->setOriginalCustomPrice($price);
            $item->getProduct()->setIsSuperMode(true);
        }

    }