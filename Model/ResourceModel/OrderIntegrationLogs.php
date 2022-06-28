<?php
/**
 * Copyright © Yasin Cengiz Coskun All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lampenwelt\Integration\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class OrderIntegrationLogs extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('lampenwelt_integration_orderintegrationlogs', 'orderintegrationlogs_id');
    }
}

