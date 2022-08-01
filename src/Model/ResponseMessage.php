<?php

namespace Modig\ShopwareAdminApiBundle\Model;

class ResponseMessage implements ResponseMessageInterface
{
    private string $body;
    private string $code;

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): ResponseMessageInterface
    {
        $this->body = $body;
        return $this;
    }

    public function getDecodedBody(): ?array
    {
        return json_decode($this->getBody(), true);
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): ResponseMessageInterface
    {
        $this->code = $code;
        return $this;
    }
}