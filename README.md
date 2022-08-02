# Shopware6-Admin-Api-Symfony-Bundle
A Symfony 5 bundle for Shopware 6 Admin API implementation

# Examples
```php
// make a request to get a token for the admin api
$requestMessageFactory = new RequestMessageFactory();
$requestMessage = $requestMessageFactory->createTokenMessage([
    'host' => 'http://example.com',
    'clientId' => 's0pwar3ApiKey',
    'clientSecret' => 'sh0pwar3SecreTKey'
]);

$client = new ShopwareAdminClient();
$responseMessage = $client->send($requestMessage);
```

```php
// make a request to get the list of sales channels domains
$requestMessageFactory = new RequestMessageFactory();
$requestMessage = $requestMessageFactory->createListMessage([
    'host' => 'http://example.com',
    'token' => 'shopwareSeCretT0keN',
    'entity' => 'sales-channel-domain'
]);

$client = new ShopwareAdminClient();
$responseMessage = $client->send($requestMessage);
```
