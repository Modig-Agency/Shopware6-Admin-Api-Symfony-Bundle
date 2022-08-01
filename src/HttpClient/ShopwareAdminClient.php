<?php

namespace Modig\ShopwareAdminApiBundle\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Modig\ShopwareAdminApiBundle\Model\RequestMessageInterface;
use Modig\ShopwareAdminApiBundle\Model\ResponseMessage;
use Modig\ShopwareAdminApiBundle\Model\ResponseMessageInterface;

class ShopwareAdminClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function send(RequestMessageInterface $requestMessage): ResponseMessageInterface
    {
        $request = $this->createRequest($requestMessage);
        $response = $this->client->send($request);

        return $this->createResponseData($response);
    }

    private function createRequest(RequestMessageInterface $requestMessage): Request
    {
        return new Request(
            $requestMessage->getMethod(),
            $requestMessage->getUrl(),
            $requestMessage->getHeaders(),
            $requestMessage->getBody()
        );
    }

    private function createResponseData(Response $response): ResponseMessageInterface
    {
        $responseMessage = new ResponseMessage();
        $responseMessage->setBody((string)$response->getBody());
        $responseMessage->setCode($response->getStatusCode());

        return $responseMessage;
    }
}