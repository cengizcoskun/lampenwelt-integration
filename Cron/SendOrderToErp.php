<?php
/**
 * Copyright © Yasin Cengiz Coskun All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lampenwelt\Integration\Cron;

use Magento\Framework\Exception\LocalizedException;
use Matrix\Exception;
use Lampenwelt\Integration\Model\OrderIntegrationLogs;
use Lampenwelt\Integration\Model\OrderIntegrationLogsRepository;
use Magento\Sales\Model\OrderRepository;

class SendOrderToErp
{
    protected $logger;

    protected $orderIntegrationLogs;

    protected $orderIntegrationLogsRepository;

    protected $orderRepository;

    /**
     * Constructor
     *
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        OrderIntegrationLogs $orderIntegrationLogs,
        OrderIntegrationLogsRepository $orderIntegrationLogsRepository,
        OrderRepository $orderRepository
    )
    {
        $this->logger = $logger;
        $this->orderIntegrationLogs = $orderIntegrationLogs;
        $this->orderIntegrationLogsRepository = $orderIntegrationLogsRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Execute the cron
     *
     * @return void
     */
    public function execute()
    {
        /**
         * Requirements (2.)
         * Orders information in the Message Queue should be periodically processed and transmitted to the ERP
         */
        $this->logger->info("Cronjob sendOrderToErp is executed.");

        try {

            // get orders from queue

            // send order to erp (consumer)

            /**
             * Dummy variables
             */
            $orderId = rand(1, 999999);
            $timeStamp = time();
            $erpReturnCode = 200;

            $this->orderIntegrationLogs->setOrderId($orderId);
            $this->orderIntegrationLogs->setTimestamp($timeStamp);
            $this->orderIntegrationLogs->setErpReturnCode($erpReturnCode);

            $this->orderIntegrationLogsRepository->save($this->orderIntegrationLogs);

            $this->changeOrderStatus($orderId, 'processing');
        } catch (Exception $e) {
            $this->logger->critical('Error message - (Exception)', ['exception' => $e]);
        } catch (LocalizedException $exception) {
            $this->logger->critical('Error message - (LocalizedException)', ['exception' => $exception]);
        }
    }

    public function changeOrderStatus($orderId, $orderStatusCode)
    {
        /**
         * Requirements (3.)
         * Orders that are successfully transmitted to the ERP must have their status changed from “new” to “processing”
         */
        try {
            $order = $this->orderRepository->get($orderId);
            $order->setStatus($orderStatusCode);
			$order->save();
        } catch (Exception $e) {
            $this->logger->critical('Error message - (Exception)', ['exception' => $e]);
        }
    }
}

