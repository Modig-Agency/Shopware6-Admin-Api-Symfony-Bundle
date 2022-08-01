<?php

namespace Modig\ShopwareAdminApiBundle;

use Modig\ShopwareAdminApiBundle\DependencyInjection\ShopwareAdminApiExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ShopwareAdminApiBundle extends Bundle
{
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new ShopwareAdminApiExtension();
        }

        return $this->extension;
    }
}