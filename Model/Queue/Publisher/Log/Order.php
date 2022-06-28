<?php

namespace Lampenwelt\Integration\Model\Queue\Publisher\Log;

use Lampenwelt\Integration\Api\Data\OrderQueueInterface;
use Magento\Framework\MessageQueue\PublisherInterface;

class Order
{
    /**
     * TOPIC NAME
     */
    const TOPIC_NAME = 'lampenwelt.integration.order';

    /**
     * @var PublisherInterface
     */
    private PublisherInterface $publisher;

    /**
     *  Constructor.
     * @param PublisherInterface $publisher
     */
    public function __construct(
        PublisherInterface $publisher
    )
    {
        $this->publisher = $publisher;
    }

    /**
     * @param OrderQueueInterface $orderDetails
     */
    public function publish(OrderQueueInterface $orderDetails)
    {
        $this->publisher->publish(self::TOPIC_NAME, $orderDetails);
    }
}
