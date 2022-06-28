<?php
/**
 * Copyright © Yasin Cengiz Coskun All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lampenwelt\Integration\Model\ResourceModel\OrderIntegrationLogs;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'orderintegrationlogs_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Lampenwelt\Integration\Model\OrderIntegrationLogs::class,
            \Lampenwelt\Integration\Model\ResourceModel\OrderIntegrationLogs::class
        );
    }
}

