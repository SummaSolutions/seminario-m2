<?php
namespace Tudai\CuentaCorriente\Plugins\CustomerRepository;

use Psr\Log\LoggerInterface;

class SaveAfter {
    protected $propiedad;

    public function __construct(
        LoggerInterface $parametro
    )
    {
        $this->propiedad = $parametro;
    }

    public function afterSave(
        $customer, 
        \Magento\Customer\Api\Data\CustomerInterface $result
    ){
        $this->propiedad->info(
            sprintf(
                'El cliente %s %s fue guardado y el valor definido es %s', 
                $result->getFirstname(), 
                $result->getLastname(),
                $result->getCustomAttribute('enable_customer_credit')->getValue()
            )

        );

        return $result;
    }
}