<?php
/**
 * Copyright © Yasin Cengiz Coskun All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lampenwelt\Integration\Model;

use Lampenwelt\Integration\Api\Data\OrderIntegrationLogsInterface;
use Lampenwelt\Integration\Api\Data\OrderIntegrationLogsInterfaceFactory;
use Lampenwelt\Integration\Api\Data\OrderIntegrationLogsSearchResultsInterfaceFactory;
use Lampenwelt\Integration\Api\OrderIntegrationLogsRepositoryInterface;
use Lampenwelt\Integration\Model\ResourceModel\OrderIntegrationLogs as ResourceOrderIntegrationLogs;
use Lampenwelt\Integration\Model\ResourceModel\OrderIntegrationLogs\CollectionFactory as OrderIntegrationLogsCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class OrderIntegrationLogsRepository implements OrderIntegrationLogsRepositoryInterface
{

    /**
     * @var ResourceOrderIntegrationLogs
     */
    protected $resource;

    /**
     * @var OrderIntegrationLogsInterfaceFactory
     */
    protected $orderIntegrationLogsFactory;

    /**
     * @var OrderIntegrationLogsCollectionFactory
     */
    protected $orderIntegrationLogsCollectionFactory;

    /**
     * @var OrderIntegrationLogs
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceOrderIntegrationLogs $resource
     * @param OrderIntegrationLogsInterfaceFactory $orderIntegrationLogsFactory
     * @param OrderIntegrationLogsCollectionFactory $orderIntegrationLogsCollectionFactory
     * @param OrderIntegrationLogsSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceOrderIntegrationLogs $resource,
        OrderIntegrationLogsInterfaceFactory $orderIntegrationLogsFactory,
        OrderIntegrationLogsCollectionFactory $orderIntegrationLogsCollectionFactory,
        OrderIntegrationLogsSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->orderIntegrationLogsFactory = $orderIntegrationLogsFactory;
        $this->orderIntegrationLogsCollectionFactory = $orderIntegrationLogsCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        OrderIntegrationLogsInterface $orderIntegrationLogs
    ) {
        try {
            $this->resource->save($orderIntegrationLogs);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the orderIntegrationLogs: %1',
                $exception->getMessage()
            ));
        }
        return $orderIntegrationLogs;
    }

    /**
     * @inheritDoc
     */
    public function get($orderIntegrationLogsId)
    {
        $orderIntegrationLogs = $this->orderIntegrationLogsFactory->create();
        $this->resource->load($orderIntegrationLogs, $orderIntegrationLogsId);
        if (!$orderIntegrationLogs->getId()) {
            throw new NoSuchEntityException(__('OrderIntegrationLogs with id "%1" does not exist.', $orderIntegrationLogsId));
        }
        return $orderIntegrationLogs;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->orderIntegrationLogsCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(
        OrderIntegrationLogsInterface $orderIntegrationLogs
    ) {
        try {
            $orderIntegrationLogsModel = $this->orderIntegrationLogsFactory->create();
            $this->resource->load($orderIntegrationLogsModel, $orderIntegrationLogs->getOrderintegrationlogsId());
            $this->resource->delete($orderIntegrationLogsModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the OrderIntegrationLogs: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($orderIntegrationLogsId)
    {
        return $this->delete($this->get($orderIntegrationLogsId));
    }
}

