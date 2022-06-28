<?php
/**
 * Copyright © Yasin Cengiz Coskun All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lampenwelt\Integration\Api\Data;

interface OrderIntegrationLogsSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get OrderIntegrationLogs list.
     * @return \Lampenwelt\Integration\Api\Data\OrderIntegrationLogsInterface[]
     */
    public function getItems();

    /**
     * Set order_id list.
     * @param \Lampenwelt\Integration\Api\Data\OrderIntegrationLogsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

