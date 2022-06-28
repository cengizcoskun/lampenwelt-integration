<?php
/**
 * Copyright © Yasin Cengiz Coskun All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lampenwelt\Integration\Api\Data;

interface OrderQueueInterface
{

    const ORDER_ID = 'order_id';
    const CUSTOMER_EMAIL = 'customer_email';
    const AMOUNT_OF_ITEMS_IN_CART = 'amount_of_items_in_cart';

    /**
     * Get order_id
     * @return string|null
     */
    public function getOrderId();

    /**
     * Set order_id
     * @param string $orderId
     * @return \Lampenwelt\Integration\OrderIntegrationLogs\Api\Data\OrderQueueInterface
     */
    public function setOrderId($orderId);

    /**
     * Get customer_email
     * @return string|null
     */
    public function getCustomerEmail();

    /**
     * Set customer_email
     * @param string $customerEmail
     * @return \Lampenwelt\Integration\OrderIntegrationLogs\Api\Data\OrderQueueInterface
     */
    public function setCustomerEmail($customerEmail);


    /**
     * Get amount_of_items_in_cart
     * @return string|null
     */
    public function getAmountOfItemsInCart();

    /**
     * Set amount_of_items_in_cart
     * @param int $amountOfItemsInCart
     * @return \Lampenwelt\Integration\OrderIntegrationLogs\Api\Data\OrderQueueInterface
     */
    public function setAmountOfItemsInCart($amountOfItemsInCart);
}

