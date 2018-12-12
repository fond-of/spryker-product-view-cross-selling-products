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
    public const MODEL = 'model';
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
        $search = [self::MODEL => $productViewTransfer->getAttributes()[self::MODEL]];

        if ($productViewTransfer->getAttributes()[self::MODEL_KEY] == 'crawling_shoe') {
            $search[self::SIZE_KEY] = 'L';
        }

        $results = $this->getFactory()->getCatalogClient()->catalogSearch('', $search);

        return $productViewTransfer->setCrossSellingProducts($results);
    }
}
