<?php
namespace Tudai\CuentaCorriente\Observer\Customer;

use \Magento\Framework\Event\ObserverInterface;
use \Magento\Framework\Event\Observer;

class SaveAfter implements ObserverInterface
{
    protected $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    ){
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $this->logger->info(
            sprintf(
                'OBSERVER: El cliente %s %s ha sido guardado',
                $observer->getData('customer')->getFirstname(),
                $observer->getData('customer')->getLastname()
            )
        );
    }
}