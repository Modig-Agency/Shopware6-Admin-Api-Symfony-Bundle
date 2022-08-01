<?php

namespace Modig\ShopwareAdminApiBundle\Model;

interface RequestMessageInterface
{
    public function getMethod(): ?string;

    public function setMethod(?string $method): RequestMessageInterface;

    public function getUrl(): ?string;

    public function setUrl(?string $url): RequestMessageInterface;

    public function getBody(): ?string;

    public function setBody(string $body): RequestMessageInterface;

    public function getHeaders(): array;

    public function setHeaders(array $headers): RequestMessageInterface;
}