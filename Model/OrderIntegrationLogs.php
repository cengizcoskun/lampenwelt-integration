<?php
/**
 * Copyright © Yasin Cengiz Coskun All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lampenwelt\Integration\Model;

use Lampenwelt\Integration\Api\Data\OrderIntegrationLogsInterface;
use Magento\Framework\Model\AbstractModel;

class OrderIntegrationLogs extends AbstractModel implements OrderIntegrationLogsInterface
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
    public function getOrderintegrationlogsId()
    {
        return $this->getData(self::ORDERINTEGRATIONLOGS_ID);
    }

    /**
     * @inheritDoc
     */
    public function setOrderintegrationlogsId($orderintegrationlogsId)
    {
        return $this->setData(self::ORDERINTEGRATIONLOGS_ID, $orderintegrationlogsId);
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
    public function getTimestamp()
    {
        return $this->getData(self::TIMESTAMP);
    }

    /**
     * @inheritDoc
     */
    public function setTimestamp($timestamp)
    {
        return $this->setData(self::TIMESTAMP, $timestamp);
    }

    /**
     * @inheritDoc
     */
    public function getErpReturnCode()
    {
        return $this->getData(self::ERP_RETURN_CODE);
    }

    /**
     * @inheritDoc
     */
    public function setErpReturnCode($erpReturnCode)
    {
        return $this->setData(self::ERP_RETURN_CODE, $erpReturnCode);
    }
}

