<?php

namespace FondOfSpryker\Client\ProductViewCrossSellingProducts;

use Spryker\Client\Kernel\AbstractBundleConfig;
use FondOfSpryker\Shared\ProductViewCrossSellingProducts\ProductViewCrossSellingProductsConstants;

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
    public function getFilterSizeForModelKeys(): array
    {
        return $this->get(
            ProductViewCrossSellingProductsConstants::CROSS_SELLING_PRODUCTS_FILTER_SIZE_FOR,
            ProductViewCrossSellingProductsConstants::CROSS_SELLING_PRODUCTS_FILTER_SIZE_FOR_VALUES
        );
    }
}
