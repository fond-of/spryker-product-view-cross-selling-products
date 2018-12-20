<?php

namespace FondOfSpryker\Client\ProductViewCrossSellingProducts;

use FondOfSpryker\Shared\ProductViewCrossSellingProducts\ProductViewCrossSellingProductsConstants;
use Spryker\Client\Kernel\AbstractBundleConfig;

class ProductViewCrossSellingProductsConfig extends AbstractBundleConfig
{
    /**
     * @return string
     */
    public function getDefaultSize(): string
    {
        return $this->get(
            ProductViewCrossSellingProductsConstants::CROSS_SELLING_PRODUCTS_DEFAULT_SIZE,
            ProductViewCrossSellingProductsConstants::CROSS_SELLING_PRODUCTS_DEFAULT_SIZE_VALUE
        );
    }

    /**
     * @return array
     */
    public function getModelKeysForSizeFilter(): array
    {
        return $this->get(ProductViewCrossSellingProductsConstants::MODEL_KEYS_FOR_SIZE_FILTER, []);
    }
}
