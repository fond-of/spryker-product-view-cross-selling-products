<?php

namespace FondOfSpryker\Client\ProductViewCrossSellingProducts\Plugin;

use Generated\Shared\Search\PageIndexMap;
use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\ProductStorageExtension\Dependency\Plugin\ProductViewExpanderPluginInterface;

/**
 * @method \FondOfSpryker\Client\ProductViewCrossSellingProducts\ProductViewCrossSellingProductsFactory getFactory()
 */
class ProductViewCrossSellingProductsExpanderPlugin extends AbstractPlugin implements ProductViewExpanderPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     * @param array $productData
     * @param string $localeName
     *
     * @return \Generated\Shared\Transfer\ProductViewTransfer
     */
    public function expandProductViewTransfer(ProductViewTransfer $productViewTransfer, array $productData, $localeName): ProductViewTransfer
    {
        $config = $this->getFactory()->getProductViewCrossSellingProductsConfig();

        if (!array_key_exists(PageIndexMap::MODEL_KEY, $productViewTransfer->getAttributes())) {
            return $productViewTransfer;
        }

        $modelKey = $productViewTransfer->getAttributes()[PageIndexMap::MODEL_KEY];
        $searchParameters = [PageIndexMap::MODEL_KEY => $productViewTransfer->getAttributes()[PageIndexMap::MODEL_KEY]];

        if (array_key_exists($modelKey, $config->getModelsFilterSize())) {
            if (array_key_exists(PageIndexMap::SIZE, $config->getModelsFilterSize()[$modelKey])) {
                $searchParameters[PageIndexMap::SIZE] = $config->getModelsFilterSize()[$modelKey][PageIndexMap::SIZE];
            }
        }

        $results = $this->getFactory()
            ->getCatalogClient()
            ->catalogSearch('', $searchParameters);

        return $productViewTransfer->setCrossSellingProducts($results);
    }
}
