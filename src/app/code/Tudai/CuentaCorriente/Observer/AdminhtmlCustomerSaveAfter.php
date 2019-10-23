<?php
/**
 * Class AdminhtmlCustomerSaveAfter
 *
 * @author   Facundo Capua <fcapua@summasolutions.net>
 * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link     http://www.summasolutions.net/
 */

namespace Tudai\CuentaCorriente\Observer;

use Magento\Framework\Event\Observer;
use \Magento\Framework\Event\ObserverInterface;

class AdminhtmlCustomerSaveAfter
    implements ObserverInterface
{
    /** @var \Psr\Log\LoggerInterface  */
    protected $logger;

    /** @var \Magento\Backend\Model\Auth\Session  */
    protected $adminSession;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Backend\Model\Auth\Session $adminSession
    )
    {
        $this->logger = $logger;
        $this->adminSession = $adminSession;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getData('customer');

        $customerName = $customer->getFirstname().' '.$customer->getLastname();
        $value = $customer->getCustomAttribute('enable_customer_credit')->getValue();

        $adminUser = $this->adminSession->getUser()->getName();

        $this->logger->info(sprintf("OBSERVER -- %s Guardado con Valor %s por el administrador %s", $customerName, $value, $adminUser));
    }

}