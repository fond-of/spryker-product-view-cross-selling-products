<?php

namespace FondOfSpryker\Client\ProductViewCrossSellingProducts;

use FondOfSpryker\Shared\ProductViewCrossSellingProducts\ProductViewCrossSellingProductsConstants;
use Spryker\Client\Kernel\AbstractBundleConfig;

class ProductViewCrossSellingProductsConfig extends AbstractBundleConfig
{
    /**
     * @return array
     */
    public function getModelsFilterSize(): array
    {
        return $this->get(ProductViewCrossSellingProductsConstants::CROSS_SELLING_MODELS_FILTER_SIZE, []);
    }

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
        return $this->get(ProductViewCrossSellingProductsConstants::MODEL_KEYS_FOR_SIZE_FILTER, ProductViewCrossSellingProductsConstants::CROSS_SELLING_PRODUCTS_FILTER_SIZE_FOR_VALUES);
    }
}
