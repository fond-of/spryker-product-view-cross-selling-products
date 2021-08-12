<?php

namespace FondOfSpryker\Client\ProductViewCrossSellingProducts;

use FondOfSpryker\Client\ProductViewCrossSellingProducts\Dependency\Client\ProductViewCrossSellingProductsToCatalogClientBridge;
use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class ProductViewCrossSellingProductsDependencyProvider extends AbstractDependencyProvider
{
    public const CLIENT_CATALOG = 'CLIENT_CATALOG';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $this->addCatalogClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addCatalogClient(Container $container): Container
    {
        $container[self::CLIENT_CATALOG] = function (Container $container) {
            return new ProductViewCrossSellingProductsToCatalogClientBridge(
                $container->getLocator()->catalog()->client()
            );
        };

        return $container;
    }
}
