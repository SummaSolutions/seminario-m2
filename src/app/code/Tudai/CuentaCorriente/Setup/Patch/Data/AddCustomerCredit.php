<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Tudai\CuentaCorriente\Setup\Patch\Data;

use Magento\Directory\Helper\Data;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Eav\Model\Entity\Attribute\Set as AttributeSet;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;

/**
 * Class InitializeDirectoryData
 * @package Magento\Directory\Setup\Patch
 */
class AddCustomerCredit implements DataPatchInterface
{
    private $moduleDataSetup;
    private $customerSetupFactory;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        CustomerSetupFactory $customerSetupFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->customerSetupFactory = $customerSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function apply()
    {

        $customerSetup = $this->customerSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $customerEntity = $customerSetup->getEavConfig()->getEntityType(Customer::ENTITY);
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();

        /**
         * @var $attributeSet AttributeSet
         */
        $attributeSet = $this->attributeSetFactory->create();
        $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);

        $customerSetup->addAttribute(Customer::ENTITY, 'enable_customer_credit', [
            'type'         => 'int',
            'label'        => 'Enable Customer Credit',
            'input'        => 'boolean',
            'required'     => false,
            'visible'      => true,
            'user_defined' => true,
            'position'     => 210,
            'system'       => 0
        ]);

        $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'enable_customer_credit')
            ->addData([
                'attribute_set_id'   => $attributeSetId,
                'attribute_group_id' => $attributeGroupId,
                'used_in_forms'      => ['adminhtml_customer','customer_account_edit'],//you can use other forms also ['adminhtml_customer_address', 'customer_address_edit', 'customer_register_address']
            ]);

        $attribute->save();

    }

    public function revert()
    {
        $this->moduleDataSetup->getConnection()->startSetup();

        //TODO

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
