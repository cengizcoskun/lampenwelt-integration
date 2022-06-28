# Lampenwelt Integration Module
- Order integration

### Installation
- You can install the module using Composer or manually.

- GitHub Repository URL: git@github.com:cengizcoskun/lampenwelt-integration.git


#### Please do not forget to run the commands below.
- php bin/magento module:enable Lampenwelt_Integration
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento cache:flush
 
## Specifications

- Rabbit MQ Queue Feature
	- Publisher Class

 - Console Command
	- IntegrationHistory

 - Controller
	- adminhtml > erp_sync/items/status

 - Cronjob
	- lampenwelt_integration_sendOrderToErp
	
 - Observer
	- sales_order_place_after > Lampenwelt\Integration\Observer\Sales\OrderPlaceAfter


## Attributes

 - Sales - Order Integration Status (order_integration_status)


### The module can be manuel tested with custom php script file using Object Manager.

- $cron = $objectManager->create('\Lampenwelt\Integration\Cron\SendOrderToErp'); 
- $cron->execute();

-----------------------

- $logInterface = $objectManager->create('\Lampenwelt\Integration\Api\Data\OrderQueueInterface');
- $orderPublisher = $objectManager->create('\Lampenwelt\Integration\Model\Queue\Publisher\Log\Order');
- $logInterface->setOrderId(123);
- $logInterface->setCustomerEmail("y.cengiz.coskun@gmail.com");
- $logInterface->setAmountOfItemsInCart(321); 
- $orderPublisher->publish($logInterface);
