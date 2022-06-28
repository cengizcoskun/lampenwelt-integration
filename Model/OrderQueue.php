<?php
/**
 * Copyright © Yasin Cengiz Coskun All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lampenwelt\Integration\Model;

use Lampenwelt\Integration\Api\Data\OrderQueueInterface;
use Magento\Framework\Model\AbstractModel;

class OrderQueue extends AbstractModel implements OrderQueueInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Lampenwelt\Integration\Model\ResourceModel\OrderIntegrationLogs::class);
    }

    /**
     * @inheritDoc
     */
    public function getOrderId()
    {
        return $this->getData(self::ORDER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setOrderId($orderId)
    {
        return $this->setData(self::ORDER_ID, $orderId);
    }

    /**
     * @inheritDoc
     */
    public function getCustomerEmail()
    {
        return $this->getData(self::CUSTOMER_EMAIL);
    }

    /**
     * @inheritDoc
     */
    public function setCustomerEmail($customerEmail)
    {
        return $this->setData(self::CUSTOMER_EMAIL, $customerEmail);
    }

    /**
     * @inheritDoc
     */
    public function getAmountOfItemsInCart()
    {
        return $this->getData(self::AMOUNT_OF_ITEMS_IN_CART);
    }

    /**
     * @inheritDoc
     */
    public function setAmountOfItemsInCart($amountOfItemsInCart)
    {
        return $this->setData(self::AMOUNT_OF_ITEMS_IN_CART, $amountOfItemsInCart);
    }
}

