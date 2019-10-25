<?php
namespace Tudai\CuentaCorriente\Plugins\CustomerRepository;

use Psr\Log\LoggerInterface;

class SaveAfter {
    protected $propiedad;

    protected $adminSession;

    public function __construct(
        LoggerInterface $parametro,
        \Magento\Backend\Model\Auth\Session $adminSession
    )
    {
        $this->propiedad = $parametro;
        $this->adminSession = $adminSession;
    }

    public function afterSave(
        $customer, 
        \Magento\Customer\Api\Data\CustomerInterface $result
    ){
        $this->propiedad->info(
            sprintf(
                'El administrador %s modificó el cliente %s %s fue guardado y el valor definido es %s', 
                $this->adminSession->getUser()->getName(),
                $result->getFirstname(), 
                $result->getLastname(),
                $result->getCustomAttribute('enable_customer_credit')->getValue()
            )

        );

        return $result;
    }
}