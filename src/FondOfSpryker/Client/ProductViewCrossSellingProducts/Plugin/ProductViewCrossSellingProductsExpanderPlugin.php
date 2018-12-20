<?php

namespace FondOfSpryker\Client\ProductViewCrossSellingProducts\Plugin;

use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\ProductStorageExtension\Dependency\Plugin\ProductViewExpanderPluginInterface;

/**
 * @method \FondOfSpryker\Client\ProductViewCrossSellingProducts\ProductViewCrossSellingProductsFactory getFactory()
 */
class ProductViewCrossSellingProductsExpanderPlugin extends AbstractPlugin implements ProductViewExpanderPluginInterface
{
    public const MODEL_KEY = 'model_key';
    public const SIZE_KEY = 'size';

    /**
     * Specification:
     * - Expands and returns the provided ProductView transfer objects.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     * @param array $productData
     * @param string $localeName
     *
     * @return \Generated\Shared\Transfer\ProductViewTransfer
     */
    public function expandProductViewTransfer(ProductViewTransfer $productViewTransfer, array $productData, $localeName)
    {
        $config = $this->getFactory()->createProductViewCrossSellingProductsFactory();
        $modelKey = $productViewTransfer->getAttributes()[self::MODEL_KEY];
        $search = [self::MODEL_KEY => $productViewTransfer->getAttributes()[self::MODEL_KEY]];

        if (in_array($modelKey, $config->getModelKeysForSizeFilter())) {
            $search[self::SIZE_KEY] = $config->getDefaultSize();
        }

        $results = $this->getFactory()
            ->getCatalogClient()
            ->catalogSearch('', $search);

        return $productViewTransfer->setCrossSellingProducts($results);
    }
}
