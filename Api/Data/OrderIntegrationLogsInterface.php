<?php
/**
 * Copyright © Yasin Cengiz Coskun All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lampenwelt\Integration\Api\Data;

interface OrderIntegrationLogsInterface
{

    const ORDERINTEGRATIONLOGS_ID = 'orderintegrationlogs_id';
    const ORDER_ID = 'order_id';
    const TIMESTAMP = 'timestamp';
    const ERP_RETURN_CODE = 'erp_return_code';

    /**
     * Get orderintegrationlogs_id
     * @return string|null
     */
    public function getOrderintegrationlogsId();

    /**
     * Set orderintegrationlogs_id
     * @param string $orderIntegrationLogsId
     * @return \Lampenwelt\Integration\OrderIntegrationLogs\Api\Data\OrderIntegrationLogsInterface
     */
    public function setOrderintegrationlogsId($orderIntegrationLogsId);

    /**
     * Get order_id
     * @return string|null
     */
    public function getOrderId();

    /**
     * Set order_id
     * @param string $orderId
     * @return \Lampenwelt\Integration\OrderIntegrationLogs\Api\Data\OrderIntegrationLogsInterface
     */
    public function setOrderId($orderId);
}

