<?php

namespace FondOfSpryker\Client\ProductViewCrossSellingProducts;

use FondOfSpryker\Client\ProductViewCrossSellingProducts\Dependency\Client\ProductViewCrossSellingProductsToCatalogClientInterface;
use Spryker\Client\Kernel\AbstractFactory;
use FondOfSpryker\Client\ProductViewCrossSellingProducts\ProductViewCrossSellingProductsConfig;

class ProductViewCrossSellingProductsFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Client\ProductViewCrossSellingProducts\Dependency\Client\ProductViewCrossSellingProductsToCatalogClientInterface
     */
    public function getCatalogClient(): ProductViewCrossSellingProductsToCatalogClientInterface
    {
        return $this->getProvidedDependency(ProductViewCrossSellingProductsDependencyProvider::CLIENT_CATALOG);
    }

    /**
     * @return \FondOfSpryker\Client\ProductViewCrossSellingProducts\ProductViewCrossSellingProductsConfig
     */
    public function createProductViewCrossSellingProductsFactory(): ProductViewCrossSellingProductsConfig
    {
        return $this->getConfig();
    }
}
