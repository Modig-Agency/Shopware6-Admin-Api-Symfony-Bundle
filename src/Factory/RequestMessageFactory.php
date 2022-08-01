<?php

namespace Modig\ShopwareAdminApiBundle\Factory;

use Modig\ShopwareAdminApiBundle\Model\RequestMessage;
use Modig\ShopwareAdminApiBundle\Model\RequestMessageInterface;
use Psr\Log\LoggerInterface;

class RequestMessageFactory
{
    const ENTITY_MAIL_TEMPLATE = 'mail-template';
    const ENTITY_MAIL_TEMPLATE_TYPE = 'mail-template-type';
    const ENTITY_PRODUCT = 'product';
    const ENTITY_SALES_CHANNEL_DOMAIN = 'sales-channel-domain';
    const ENTITY_SYSTEM_CONFIG = 'system-config';

    public function createTokenMessage(array $data): RequestMessage
    {
        $requestMessage = $this->createRequestMessage();
        $requestMessage->setUrl($data['host'].'/api/oauth/token')
            ->setMethod('POST')
            ->setHeaders(['Content-Type' => 'application/json'])
            ->setBody(json_encode([
                "grant_type" => "client_credentials",
                "client_id" => $data['clientId'],
                "client_secret" => $data['clientSecret']
            ]));

        return $requestMessage;
    }

    public function createMailTemplateMessage(array $data): RequestMessage
    {
        $requestMessage = $this->createRequestMessage();
        $requestMessage->setUrl($data['host'].'/api/mail-template')
            ->setMethod('POST')
            ->setHeaders($this->getHeaders($data['token']))
            ->setBody(json_encode([
                "contentHtml" => $data['contentHtml'],
                "contentPlain" => $data['contentPlain'],
                "createdAt" => $data['createdAt'],
                "id" => $data['id'],
                "mailTemplateTypeId" => $data['mailTemplateTypeId'],
                "senderName" => $data['senderName'],
                "subject" => $data['subject'],
                "description" => $data['description']
            ]));

        return $requestMessage;
    }

    public function createMailTemplateTypeMessage(array $data): RequestMessage
    {
        $requestMessage = $this->createRequestMessage();
        $requestMessage->setUrl($data['host'].'/api/mail-template-type')
            ->setMethod('POST')
            ->setHeaders($this->getHeaders($data['token']))
            ->setBody(json_encode([
                "availableEntities" => $data['availableEntities'],
                "createdAt" => $data['createdAt'],
                "id" => $data['id'],
                "name" => $data['name'],
                "technicalName" => $data['technicalName'],
            ]));

        return $requestMessage;
    }

    public function createMailTemplateSendActionMessage(array $data): RequestMessage
    {
        $requestMessage = $this->createRequestMessage();
        $requestMessage->setUrl($data['host'].'/api/_action/mail-template/send')
            ->setMethod('POST')
            ->setHeaders($this->getHeaders($data['token']))
            ->setBody(json_encode([
                'recipients' => $data['recipients'],
                "contentHtml" => $data['contentHtml'],
                "contentPlain" => $data['contentPlain'],
                "senderName" => $data['senderName'],
                "subject" => $data['subject'],
                "senderEmail" => $data['senderEmail'],
                "salesChannelId" => $data['salesChannelId'],
                "mailTemplateData" => $data['mailTemplateData'],
            ]));

        return $requestMessage;
    }

    public function createListMessage(array $data): RequestMessageInterface
    {
        $requestMessage = $this->createRequestMessage();
        $requestMessage->setUrl($data['host'].'/api/'.$data['entity'])
            ->setMethod('GET')
            ->setHeaders($this->getHeaders($data['token']))
            ->setBody('');

        return $requestMessage;
    }

    public function createSearchMessage(array $data): RequestMessageInterface
    {
        $requestMessage = $this->createRequestMessage();
        $requestMessage->setUrl($data['host'].'/api/search/'.$data['entity'])
            ->setMethod('POST')
            ->setHeaders($this->getHeaders($data['token']))
            ->setBody(json_encode($data['query']));

        return $requestMessage;
    }

    public function createAdminNotificationMessage(array $data): RequestMessageInterface
    {
        $requestMessage = $this->createRequestMessage();
        $requestMessage->setUrl($data['host'].'/api/notification')
            ->setMethod('POST')
            ->setHeaders($this->getHeaders($data['token']))
            ->setBody(json_encode([
                "status" => $data['status'],
                "message" => $data['message'],
                "adminOnly" => $data['adminOnly'],
                "requiredPrivileges" => $data['requiredPrivileges']
            ]));

        return $requestMessage;
    }

    public function createRequestMessage(): RequestMessageInterface
    {
        return new RequestMessage();
    }

    private function getHeaders(string $token): array
    {
        return [
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer $token",
            'Accept' => 'application/json'
        ];
    }
}