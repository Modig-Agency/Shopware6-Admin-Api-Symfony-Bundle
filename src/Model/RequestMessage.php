<?php

namespace Modig\ShopwareAdminApiBundle\Model;

class RequestMessage implements RequestMessageInterface
{
    private ?string $method;
    private ?string $url;
    private ?string $body;
    private array $headers = [];

    /**
     * @return string|null
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * @param string|null $method
     * @return RequestMessage
     */
    public function setMethod(?string $method): RequestMessageInterface
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return RequestMessage
     */
    public function setUrl(?string $url): RequestMessageInterface
    {
        $this->url = $url;
        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return RequestMessage
     */
    public function setBody(string $body): RequestMessageInterface
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     * @return RequestMessage
     */
    public function setHeaders(array $headers): RequestMessageInterface
    {
        $this->headers = $headers;
        return $this;
    }
}