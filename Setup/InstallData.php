<?php

namespace Helper\CreateCustomerAttribute\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetupFactory;

class InstallData implements InstallDataInterface
{
    private $customerSetupFactory;

    /**
     * @param \Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory
     */
    public function __construct(
        CustomerSetupFactory $customerSetupFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function install(
      ModuleDataSetupInterface $setup,
      ModuleContextInterface $context
    ) {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $customerSetup->addAttribute(
          \Magento\Customer\Model\Customer::ENTITY,
          'string_attribute', [
            'type' => 'varchar',
            'label' => 'String Attribute',
            'input' => 'text',
            'required' => false,
            'sort_order' => 5,
            'visible' => true,
            'system' => false,
            'position' => 5,
        ]);

        $setAttribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'string_attribute')->addData([
          'used_in_forms' => [
                'adminhtml_customer',
                'adminhtml_checkout',
                'customer_account_create',
                'customer_account_edit'
            ]
        ]);
        $setAttribute->save();
    }
}
