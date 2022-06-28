<?php
/**
 * Copyright © Yasin Cengiz Coskun All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lampenwelt\Integration\Observer\Sales;

use Lampenwelt\Integration\Api\Data\OrderQueueInterface;
use Lampenwelt\Integration\Model\Queue\Publisher\Log\Order as OrderQueuePublisher;

class OrderPlaceAfter implements \Magento\Framework\Event\ObserverInterface
{

    public OrderQueueInterface $orderQueueInterface;

    public OrderQueuePublisher $orderQueuePublisher;

    public function __construct(
        OrderQueueInterface $orderQueueInterface,
        OrderQueuePublisher $orderQueuePublisher,
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->orderQueueInterface = $orderQueueInterface;
        $this->orderQueuePublisher = $orderQueuePublisher;
        $this->logger = $logger;
    }

    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(
        \Magento\Framework\Event\Observer $observer
    ) {
        $order = $observer->getEvent()->getOrder();

        $incrementId = $order->getIncrementId();
        $customerEmail = $order->getCustomerEmail();

        $orderItems = $order->getAllItems();
        $itemQty = 0;
        foreach ($orderItems as $item) {
            $itemQty += $item->getQtyOrdered();
        }

        $this->orderQueueInterface->setOrderId($incrementId);
        $this->orderQueueInterface->setCustomerEmail($customerEmail);
        $this->orderQueueInterface->setAmountOfItemsInCart($itemQty);

        /**
         * Requirements (1.)
         * On every new order, the Message Queue should receive a new message containing the order ID,
         * the email address of the user who placed the order, and the amount of items in the cart, and
         * the same information should be logged using the default logger
         */

        try {
            $this->orderQueuePublisher->publish($this->orderQueueInterface);

            $log = [
                'orderId' => $incrementId,
                'customerEmail' => $customerEmail,
                'itemQty' => $itemQty
            ];

            $this->logger->info('The message added to queue: ' . json_encode($log));
        } catch (\Exception $e) {
            $this->logger->critical('Error message', ['exception' => $e]);
        }
    }
}

