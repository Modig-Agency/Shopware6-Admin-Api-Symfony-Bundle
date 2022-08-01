<?php

namespace Modig\ShopwareAdminApiBundle\Model;

interface ResponseMessageInterface
{
    public function getBody(): string;

    public function setBody(string $body): ResponseMessageInterface;

    public function getDecodedBody(): ?array;

    public function getCode(): string;

    public function setCode(string $code): ResponseMessageInterface;
}