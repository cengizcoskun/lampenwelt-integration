<?php
/**
 * Copyright © Yasin Cengiz Coskun All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lampenwelt\Integration\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface OrderIntegrationLogsRepositoryInterface
{

    /**
     * Save OrderIntegrationLogs
     * @param \Lampenwelt\Integration\Api\Data\OrderIntegrationLogsInterface $orderIntegrationLogs
     * @return \Lampenwelt\Integration\Api\Data\OrderIntegrationLogsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Lampenwelt\Integration\Api\Data\OrderIntegrationLogsInterface $orderIntegrationLogs
    );

    /**
     * Retrieve OrderIntegrationLogs
     * @param string $orderintegrationlogsId
     * @return \Lampenwelt\Integration\Api\Data\OrderIntegrationLogsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($orderintegrationlogsId);

    /**
     * Retrieve OrderIntegrationLogs matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Lampenwelt\Integration\Api\Data\OrderIntegrationLogsSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete OrderIntegrationLogs
     * @param \Lampenwelt\Integration\Api\Data\OrderIntegrationLogsInterface $orderIntegrationLogs
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Lampenwelt\Integration\Api\Data\OrderIntegrationLogsInterface $orderIntegrationLogs
    );

    /**
     * Delete OrderIntegrationLogs by ID
     * @param string $orderintegrationlogsId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($orderintegrationlogsId);
}

