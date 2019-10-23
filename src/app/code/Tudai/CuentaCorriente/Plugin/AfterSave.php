<?php

namespace Tudai\CuentaCorriente\Plugin;

class AfterSave
{
    /** @var \Psr\Log\LoggerInterface  */
    protected $logger;

    /** @var \Magento\Backend\Model\Auth\Session  */
    protected $adminSession;

    protected $notifierPoolFactory;

    /**
     * @var \Magento\Framework\Event\ManagerInterface
     */
    protected $eventManager;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Backend\Model\Auth\Session $adminSession,
        \Magento\Framework\Notification\NotifierInterfaceFactory $notifierPoolFactory,
        \Magento\Framework\Event\ManagerInterface $eventManager
    )
    {
        $this->logger = $logger;
        $this->adminSession = $adminSession;
        $this->notifierPoolFactory = $notifierPoolFactory;
        $this->eventManager = $eventManager;
    }

    public function afterSave(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Customer\Api\Data\CustomerInterface $customer
    ) {
        $customerName = $customer->getFirstname().' '.$customer->getLastname();
        $value = $customer->getCustomAttribute('enable_customer_credit')->getValue();

        $adminUser = $this->adminSession->getUser()->getName();

        $this->logger->info(sprintf("PLUGIN AFTER -- %s Guardado con Valor %s por el administrador %s", $customerName, $value, $adminUser));

        return $customer;
    }
}